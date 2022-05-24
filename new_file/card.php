<?php function next_card_func($atts) {
    $atts = shortcode_atts(array(
		'type' => 'type1',
        'title' => '',
        'image' => '',
        'image_size' => '320x320',
		'button_name' => '',
		'button_link' => '',
		'new_tab' => '',
        'el_class' => ''
    ), $atts);

	$type			= $atts['type'];
	$title			= $atts['title'];
	$image		= $atts['image'];
	$image_size	= $atts['image_size'];
	$button_name	= $atts['button_name'];
	$button_link	= $atts['button_link'];
	$new_tab	= $atts['new_tab'];
	$el_class		= $atts['el_class'];

	$class = array( $type, $el_class);
	$newtab = !empty($new_tab) ? '_blank' : '_self';
    $img_id = preg_replace( '/[^\d]/', '', $image );
	$img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'thumb_size' => $image_size, 'class' => 'card-image rounder-4' ) );
	ob_start();
	?>	
		<?php if((!empty($type)) && ($type !='media_coverage')){?>
		<div class="nex-card <?php echo esc_html(implode(' ', $class)); ?>">
			<?php if(!empty($image)) { ?>
				<div class="nex-card-image">
                    <?php echo wp_kses_post($img['thumbnail']); ?>
                </div>
			<?php } ?>
			<?php if($type === 'type2' || $type === 'type4'){ echo '<div class="wrap-card-inner">';}?>
			<?php if(!empty($title)){ ?>
				<h4 class="mb-0 text-white nex-card-title"><a href="<?php echo esc_url($button_link);?>" target="<?php echo esc_attr($newtab); ?>" ><?php echo esc_html($title);?></a></h4>
			<?php } ?>
			<?php if(!empty($button_name)) : ?>
				<a class="nex-card-button nex-button-primary" href="<?php echo esc_url($button_link);?>" target="<?php echo esc_attr($newtab); ?>" ><?php echo esc_html($button_name);?></a>
			<?php  endif; ?>
			<?php if($type === 'type2' || $type === 'type4'){ echo '</div>';}?>
		</div>
		<?php }else {?> 
			<div class="media-converage">
				<div class="row ">
					<div class="media-converage-left">
						<div class="media-converage-wrapper">
							<?php if(!empty($image)) { ?>
							<div class="nex-card-image col-md-6">
								<?php echo wp_kses_post($img['thumbnail']); ?>
							</div>
							<?php } ?>
							<?php if(!empty($title)){ ?>
								<div class="col-md-6">
									<h4 class="mb-0 text-white nex-card-title"><a href="<?php echo esc_url($button_link);?>" target="<?php echo esc_attr($newtab); ?>" ><?php echo esc_html($title);?></a></h4>
								</div>
							<?php } ?>	
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output; 
}

if(function_exists('add_shortcode')) { add_shortcode('nex_card', 'next_card_func'); }
