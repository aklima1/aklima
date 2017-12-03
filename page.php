<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package stock
 */

get_header(); while ( have_posts() ) : the_post(); 
    if(get_post_meta($post->ID, 'stock_page_options', true)){
        $page_meta = get_post_meta($post->ID, 'stock_page_options', true);
    } else {
        $page_meta = array();
    }

    if(array_key_exists('enable_title',$page_meta)){
        $enable_title = $page_meta['enable_title'];
    } else {
        $enable_title = true;
    }
    if(array_key_exists('custom_title',$page_meta)){
        $custom_title = $page_meta['custom_title'];
    } else {
        $custom_title  = false;
    }
?>
   <?php if($enable_title == true): ?>
    <div <?php if(has_post_thumbnail()) : ?> style="background-image:url(<?php esc_url(the_post_thumbnail_url('large'));?>);"<?php endif; ?> class="stock-breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?php if(!empty($custom_title)){ echo esc_html($custom_title); } else { the_title(); }?></h1>
                    <?php if(function_exists('bcn_display')) bcn_display();?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="stock-internal-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        get_template_part( 'template-parts/content', 'page' );
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; get_footer();
