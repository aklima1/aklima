<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package stock
 */
$social_links = cs_get_option('social_links');
$body_end_scripts = cs_get_option('body_end_scripts');
$footer_copyright_text = cs_get_option('footer_copyright_text');
$footer_copyright_text_allowed_tags = array(
	'a' => array(
		'href' => array(),
		'title' => array(),
	),
	'img' => array(
		'alt' => array(),
		'src' => array(),
	),
	'br' => array(),
	'em' => array(),
	'strong' => array(),
);
?>
	<footer id="colophon" class="site-footer">
		<div class="container">
			<?php if(is_active_sidebar('stock_footer')): ?>
			<div class="row">
				<?php dynamic_sidebar('stock_footer'); ?>
			</div>
			<?php endif;?>
			<div class="row">
                <div class="col-md-12">
                    <div class="stock-footer-bottom">
                        <div class="row">
                            <div class="col-md-4">
                                <?php if(!empty($footer_copyright_text)) { echo wp_kses($footer_copyright_text, footer_copyright_text_allowed_tags); } else {esc_html_e('Copyright © 2017 FairDealLab - All Rights Reserved','stock-rrf');} ?>
                            </div>
                            <div class="col-md-4">
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'menu-2',
                                        'menu_id'        => 'main-footer',
                                    ) );
                                ?>
                            </div>
                            <div class="col-md-4">
                            <?php if(!empty($social_links)) : ?>
                                <div class="social-icons">
                                <?php foreach($social_links as $link) : ?>
                                    <a href="<?php echo esc_url($link['link']); ?>" target="_blank"><i class="<?php echo esc_attr($link['icon']); ?>"></i></a>
                                <?php endforeach; ?>
                                </div>
                               <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
