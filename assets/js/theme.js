/**
 * Theme JavaScript functionality
 * Edelweiss Gaishofen Theme
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        // Fix scroll issues on blog pages
        if ($('body').hasClass('blog') || $('body').hasClass('archive') || $('body').hasClass('single')) {
            $('html, body').css({
                'height': 'auto',
                'overflow-y': 'auto',
                'overflow-x': 'hidden'
            });
        }

        // Scrollspy for navigation
        $('body').scrollspy({
            target: '#nav',
            offset: $(window).height() / 2
        });

        // Smooth scrolling for anchor links
        $("#nav .main-nav a[href^='#']").on('click', function(e) {
            e.preventDefault();
            var hash = this.hash;

            if ($(hash).length) {
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 600);
            }
        });

        // Mobile navigation toggle
        $('.nav-collapse').off('click').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var nav = $('#nav');
            var mainNav = $('.main-nav');

            if (nav.hasClass('open')) {
                nav.removeClass('open');
                mainNav.css('transform', 'translateX(100%)');
            } else {
                nav.addClass('open');
                mainNav.css({
                    'transform': 'translateX(0%)',
                    'background': '#1C1D21',
                    'position': 'fixed',
                    'top': '60px',
                    'right': '0',
                    'width': '250px',
                    'height': 'calc(100vh - 60px)',
                    'z-index': '99999',
                    'padding': '0',
                    'margin': '0',
                    'list-style': 'none',
                    'overflow-y': 'auto',
                    'box-shadow': '0 2px 10px rgba(0,0,0,0.3)'
                });

                // Ensure menu links have proper styling
                mainNav.find('a').css({
                    'color': '#FFF',
                    'display': 'block',
                    'padding': '18px 25px',
                    'text-decoration': 'none',
                    'font-size': '14px',
                    'font-weight': '500',
                    'text-transform': 'uppercase',
                    'letter-spacing': '1px',
                    'border-left': '4px solid transparent'
                });

                // Add hover effects
                mainNav.find('a').off('mouseenter mouseleave').on('mouseenter', function() {
                    $(this).css({
                        'background-color': '#6195FF',
                        'border-left-color': '#FFF'
                    });
                }).on('mouseleave', function() {
                    $(this).css({
                        'background-color': 'transparent',
                        'border-left-color': 'transparent'
                    });
                });
            }
        });

        // Fixed navigation on scroll
        $(window).on('scroll', function() {
            var wScroll = $(this).scrollTop();

            // Fixed nav
            if (wScroll > 1) {
                $('#nav').addClass('fixed-nav');
            } else {
                $('#nav').removeClass('fixed-nav');
            }

            // Back To Top Appear
            if (wScroll > 700) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });


        // Toggle button functionality for collapsible content
        $('#toggle-imp-button').click(function() {
            var button = $(this);
            var strings = edelweiss_ajax_object.strings;

            button.text(function(i, old) {
                return old == strings.read_more ? strings.collapse : strings.read_more;
            });
        });

        // Counter animation on scroll
        function animateCounters() {
            $('.counter').each(function() {
                var $this = $(this);
                var countTo = $this.text();

                // Only animate if it contains numbers
                if (/\d/.test(countTo)) {
                    var numOnly = countTo.replace(/[^\d]/g, '');
                    if (numOnly) {
                        $({ countNum: 0 }).animate({
                            countNum: parseInt(numOnly)
                        }, {
                            duration: 2000,
                            easing: 'swing',
                            step: function() {
                                var prefix = countTo.replace(/\d/g, '').substring(0, countTo.search(/\d/));
                                $this.text(prefix + Math.floor(this.countNum));
                            },
                            complete: function() {
                                $this.text(countTo);
                            }
                        });
                    }
                }
            });
        }

        // Animate counters when they come into view
        $(window).on('scroll', function() {
            var $numbers = $('#numbers');

            // Check if numbers element exists
            if ($numbers.length && $numbers.offset()) {
                var countersTop = $numbers.offset().top;
                var countersBottom = countersTop + $numbers.outerHeight();
                var scrollTop = $(this).scrollTop();
                var windowHeight = $(this).height();

                if (scrollTop + windowHeight > countersTop && scrollTop < countersBottom) {
                    if (!$numbers.hasClass('animated')) {
                        $numbers.addClass('animated');
                        animateCounters();
                    }
                }
            }
        });

        // Search form enhancement
        $('.search-form input[type="search"]').on('focus', function() {
            $(this).closest('.search-form').addClass('focused');
        }).on('blur', function() {
            $(this).closest('.search-form').removeClass('focused');
        });

        // Image lazy loading fallback
        $('img[data-src]').each(function() {
            var $img = $(this);
            $img.attr('src', $img.data('src'));
        });

        // Form validation enhancement
        $('form').on('submit', function() {
            var isValid = true;
            $(this).find('input[required], textarea[required]').each(function() {
                if (!$(this).val()) {
                    $(this).addClass('error');
                    isValid = false;
                } else {
                    $(this).removeClass('error');
                }
            });
            return isValid;
        });

        // Accessibility improvements
        $('.main-nav a').on('keydown', function(e) {
            if (e.which === 13) { // Enter key
                $(this).click();
            }
        });

        // Print styles helper
        window.addEventListener('beforeprint', function() {
            $('body').addClass('printing');
        });

        window.addEventListener('afterprint', function() {
            $('body').removeClass('printing');
        });
    });

    // Resize handler
    $(window).on('resize', function() {
        // Close mobile menu on resize
        if ($(window).width() > 991) {
            $('#nav').removeClass('open');
        }
    });

})(jQuery);