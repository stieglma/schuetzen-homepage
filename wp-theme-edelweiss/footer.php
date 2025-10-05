<?php
/**
 * The template for displaying the footer
 *
 * @package Edelweiss_Gaishofen
 */
?>

<footer id="footer" class="st-padding bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="footer-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php echo edelweiss_get_icon('logo-gaishofen'); ?>
                    </a>
                </div>
            </div>
        </div>

        <?php if (has_nav_menu('footer')) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="footer-menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class' => 'footer-nav',
                        'container' => false,
                        'fallback_cb' => 'edelweiss_footer_fallback_menu',
                        'depth' => 1,
                    ));
                    ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</footer>

<?php wp_footer(); ?>

<script type="text/javascript">
(function($) {
    $('body').scrollspy({
        target: '#nav',
        offset: $(window).height() / 2
    });

    $("#nav .main-nav a[href^='#']").on('click', function(e) {
        e.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
            scrollTop: $(this.hash).offset().top
        }, 600);
    });

    $('#nav .nav-collapse').on('click', function() {
        $('#nav').toggleClass('open');
    });

    $(window).on('scroll', function() {
        var wScroll = $(this).scrollTop();

        // Fixed nav
        wScroll > 1 ? $('#nav').addClass('fixed-nav') : $('#nav').removeClass('fixed-nav');

        // Back To Top Appear
        wScroll > 700 ? $('#back-to-top').fadeIn() : $('#back-to-top').fadeOut();
    });


    $('#toggle-imp-button').click(function(){
        $(this).text(function(i,old){
            return old == '<?php _e('Read More', 'edelweiss-gaishofen'); ?>' ?  '<?php _e('Collapse', 'edelweiss-gaishofen'); ?>' : '<?php _e('Read More', 'edelweiss-gaishofen'); ?>';
        });
    });
})(jQuery);
</script>

</body>
</html>