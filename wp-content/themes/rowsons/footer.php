<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */
?>
<section id="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <ul class="contacts">
                    <li><a href="mailto:showroom@rowsonkitchens.co.nz">showroom@rowsonkitchens.co.nz</a></li>
                    <li>phone: <a href="tel:067696886">(06) 769 6886</a></li>
                    <li><a href="https://www.facebook.com/www.rowsonkitchenandjoinery.co.nz/" class="fa fa-facebook-square" target="_blank"></a></li>
                    <li><a href="https://www.instagram.com/annika_rowson/" class="fa fa-instagram" target="_blank"></a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer-menu',
                        'fallback_cb' => '',
                        'menu_id' => 'footer-menu',
                        'walker' => new wp_bootstrap_navwalker()
                    )
                );
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <ul class="copyright">
                    <li>&copy; Copyright by Rowson Kitchens. All rights reserved. Website by <a href="http://www.designgarage.co.nz/" target="_blank">Design Garage</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php wp_footer(); ?>
</body>
</html>