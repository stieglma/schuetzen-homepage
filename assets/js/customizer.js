/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function($) {
    // Site title and description.
    wp.customize('blogname', function(value) {
        value.bind(function(to) {
            $('.site-title a').text(to);
        });
    });
    wp.customize('blogdescription', function(value) {
        value.bind(function(to) {
            $('.site-description').text(to);
        });
    });

    // Hero section
    wp.customize('edelweiss_hero_button_1_text', function(value) {
        value.bind(function(to) {
            $('.home-content .white-btn').text(to);
        });
    });

    wp.customize('edelweiss_hero_button_2_text', function(value) {
        value.bind(function(to) {
            $('.home-content .main-btn').text(to);
        });
    });

    // About section
    wp.customize('edelweiss_about_title', function(value) {
        value.bind(function(to) {
            $('#about .section-header .title').text(to);
        });
    });

    // Training section
    wp.customize('edelweiss_training_title', function(value) {
        value.bind(function(to) {
            $('#training .section-header .title').text(to);
        });
    });

    wp.customize('edelweiss_training_times_title', function(value) {
        value.bind(function(to) {
            $('#training .text-container h3').text(to);
        });
    });

    // Teams section
    wp.customize('edelweiss_teams_title', function(value) {
        value.bind(function(to) {
            $('#impressions .section-header .title').text(to);
        });
    });

    // Contact section
    wp.customize('edelweiss_contact_title', function(value) {
        value.bind(function(to) {
            $('#contact .section-header .title').text(to);
        });
    });

    // Background images
    wp.customize('edelweiss_hero_bg_image', function(value) {
        value.bind(function(to) {
            $('#home .bg-img').css('background-image', 'url(' + to + ')');
        });
    });

    wp.customize('edelweiss_stats_bg_image', function(value) {
        value.bind(function(to) {
            $('#numbers .bg-img').css('background-image', 'url(' + to + ')');
        });
    });

    // Statistics
    var stats = ['active_shooters', 'pistol_teams', 'rifle_teams', 'rifle_supported_teams', 'youth_teams'];
    $.each(stats, function(index, stat) {
        wp.customize('edelweiss_stat_' + stat, function(value) {
            value.bind(function(to) {
                $('#numbers .number').eq(index).find('.counter').text(to);
            });
        });
    });

    // Contact persons
    for (var i = 1; i <= 3; i++) {
        (function(index) {
            wp.customize('edelweiss_contact_' + index + '_title', function(value) {
                value.bind(function(to) {
                    $('#contact .text-container').eq(index - 1).find('h3').text(to);
                });
            });

            wp.customize('edelweiss_contact_' + index + '_name', function(value) {
                value.bind(function(to) {
                    $('#contact .text-container').eq(index - 1).find('p').first().text(to);
                });
            });
        })(i);
    }

})(jQuery);