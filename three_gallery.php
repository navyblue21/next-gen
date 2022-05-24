<?php 
function ng_three_gallery_func($atts, $content = null) {
    $atts = shortcode_atts(array(
        'title'         => '',
        'image_1'       => '',
        'image_2'       => '',
        'image_3'       => ''
    ), $atts);

    $title              = $atts['title'];
    $content = wpb_js_remove_wpautop($content, true);
    $image_1			= $atts['image_1'];
    $image_2			= $atts['image_2'];
    $image_3			= $atts['image_3'];

    $img_id_1   = preg_replace( '/[^\d]/', '', $image_1 );
	$img_src_1  = wp_get_attachment_image_src( $img_id_1, 'full' );
    
    $img_id_2   = preg_replace( '/[^\d]/', '', $image_2 );
	$img_src_2  = wp_get_attachment_image_src( $img_id_2, 'full' );
    
    $img_id_3   = preg_replace( '/[^\d]/', '', $image_3 );
	$img_src_3  = wp_get_attachment_image_src( $img_id_3, 'full' );

	ob_start();
    ?>
    <div class="row three-gallery-wrapper">
        <div class="col-md-4">
            <?php if(!empty($title)){ ?>
                <h2 class="three-gallery-title"><?php echo esc_html($title); ?></h2>
            <?php } ?>
            <?php if(!empty($content)) { ?>
                <div class="three-gallery-content"><?php echo wp_kses_post($content); ?></div>
            <?php } ?>
        </div>
        <div class="col-md-4">
            <?php if(!empty($img_src_1)){ ?>
                <img class="three-gallery-img gallery-img-mid" src ="<?php echo esc_url($img_src_1[0]);?>"/>
            <?php } ?>
        </div>
        <div class="col-md-4">
            <?php if(!empty($img_src_2)) { ?>
                <img class="three-gallery-img gallery-img-top" src ="<?php echo esc_url($img_src_2[0]);?>"/>
            <?php } ?>
            <?php if(!empty($img_src_3)) { ?>
                <img class="three-gallery-img gallery-img-bot" src ="<?php echo esc_url($img_src_3[0]);?>"/>
            <?php } ?>
        </div>
    </div>
    <?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output; 
}

if(function_exists('add_shortcode')) { add_shortcode('ng_three_gallery', 'ng_three_gallery_func'); }