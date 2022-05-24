<?php function nex_about_us_func($atts) {
    $atts = shortcode_atts(array(
		'type_statistics' => 'image',
		'show_icon' => 0,
        'type' => 'remixicon',
        'icon_fontawesome' => '',
        'color' => '',
        'custom_color' => '',
		'about_title_one' => '',
		'about_number_one' => '',
		'about_title_two' => '',
		'about_number_two' => '',
		'about_title_three' => '',
		'about_number_three' => '',
		'about_title_four' => '',
		'about_number_four' => '',
        'title' => '',
		'show_button' => 0,
		'button_name' => '',
        'button_link' => '#',
        'position_image' => 0,
        'image' => '',
        'image_size' => '830x470',
        'el_class' => ''
    ), $atts);

    $show_icon			= $atts['show_icon'];
	$type				= $atts['type'];
	$iconClass	        = $atts['icon_fontawesome'];
	$about_title_one	= $atts['about_title_one'];
    $about_number_one	= $atts['about_number_one'];
	$about_title_two	= $atts['about_title_two'];
	$about_number_two	= $atts['about_number_two'];
	$about_title_three	= $atts['about_title_three'];
	$about_number_three	= $atts['about_number_three'];
	$about_title_four	= $atts['about_title_four'];
	$about_number_four	= $atts['about_number_four'];
	$title				= $atts['title'];
	$show_button		= $atts['show_button'];
	$button_name		= $atts['button_name'];
	$button_link		= $atts['button_link'];
	$position_image		= $atts['position_image'];
	$image				= $atts['image'];
	$image_size			= $atts['image_size'];
    $el_class			= $atts['el_class'];
	$type_statistics		= $atts['type_statistics'];

	vc_icon_element_fonts_enqueue( $type );

    $class = array($el_class);
	$img_id = preg_replace( '/[^\d]/', '', $image );
	$img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'thumb_size' => $image_size, 'class' => 'bodytext-image rounder-8' ) );
	ob_start();
	?>
	<?php if ($type_statistics == 'image') {?>
		<?php if($position_image === 0):?>
			<div class="nex-about-us align-image-left <?php echo esc_html(implode(' ', $class));?>">
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="nex-about-us-image">
							<?php echo wp_kses_post($img['thumbnail']); ?>
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="nex-about-us-default">
							<?php if(!empty($title)){?>
								<h4 class="nex-about-us-title text-primary-color"><?php echo esc_html($title);?></h4>
							<?php }?>
							<div class="col-xs-12 col-md-6">
								<div class="next-about-us-icon">
									<?php if($show_icon === '1'){?>
										<div class="nex-about-us-icon">
											<span class="primary-color <?php echo esc_html($iconClass) ?>"></span>
										</div>
									<?php }?>
									<?php if(!empty($about_title_one) || !empty($about_number_one)){?>
										<div class="nex-about-content">
											<?php if(!empty($about_title_one)){?>
												<h5 class="nex-about-top-title"><?php echo esc_html($about_title_one);?></h5>
											<?php }?>
											<?php if(!empty($about_number_one)){?>
												<h2 class="nex-about-number"><?php echo esc_html($about_number_one);?></h2>
											<?php }?>
										</div>
									<?php }?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="next-about-us-icon">
									<?php if($show_icon === '1'){?>
										<div class="nex-about-us-icon">
											<span class="primary-color nex-element-icon <?php echo esc_html( $iconClass ) ?>" ></span>
										</div>
									<?php }?>
									<?php if(!empty($about_title_two) || !empty($about_number_two)){?>
										<div class="nex-about-content">
											<?php if(!empty($about_title_two)){?>
												<h5 class="nex-about-top-title"><?php echo esc_html($about_title_two);?></h5>
											<?php }?>
											<?php if(!empty($about_number_two)){?>
												<h2 class="nex-about-number"><?php echo esc_html($about_number_two);?></h2>
											<?php }?>
										</div>
									<?php }?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="next-about-us-icon">
									<?php if($show_icon === '1'){?>
										<div class="nex-about-us-icon">
											<span class="primary-color nex-element-icon <?php echo esc_html( $iconClass ) ?>" ></span>
										</div>
									<?php }?>
									<?php if(!empty($about_title_three) || !empty($about_number_three)){?>
										<div class="nex-about-content">
											<?php if(!empty($about_title_three)){?>
												<h5 class="nex-about-top-title"><?php echo esc_html($about_title_three);?></h5>
											<?php }?>
											<?php if(!empty($about_number_three)){?>
												<h2 class="nex-about-number"><?php echo esc_html($about_number_three);?></h2>
											<?php }?>
										</div>
									<?php }?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="next-about-us-icon">
									<?php if($show_icon === '1'){?>
										<div class="nex-about-us-icon">
											<span class="primary-color nex-element-icon <?php echo esc_html( $iconClass ) ?>"></span>
										</div>
									<?php }?>
									<?php if(!empty($about_title_four) || !empty($about_number_four)){?>
										<div class="nex-about-content">
											<?php if(!empty($about_title_four)){?>
												<h5 class="nex-about-top-title"><?php echo esc_html($about_title_four);?></h5>
											<?php }?>
											<?php if(!empty($about_number_four)){?>
												<h2 class="nex-about-number"><?php echo esc_html($about_number_four);?></h2>
											<?php }?>
										</div>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
					<?php if($show_button === '1'):?>
						<a class="nex-about-us-button text-primary-color border-primary-color rounder-3" href="<?php echo esc_url($button_link);?>"><?php echo esc_html($button_name);?></a>
					<?php endif;?>
				</div>
			</div>
		<?php else:?>
			<div class="nex-about-us align-image-right <?php echo esc_html(implode(' ', $class)); ?>">
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<?php if(!empty($title)){?>
							<h4 class="nex-about-us-title text-primary-color"><?php echo esc_html($title);?></h4>
						<?php }?>
                        <div class="nex-about-us-default">
                            <div class="col-xs-12 col-md-6">
                                <div class="next-about-us-icon">
                                    <?php if($show_icon === '1'){?>
                                        <div class="nex-about-us-icon">
                                            <span class="primary-color nex-element-icon <?php echo esc_html( $iconClass ) ?>" ></span>
                                        </div>
                                    <?php }?>
                                    <?php if(!empty($about_title_one) || !empty($about_number_one)){?>
                                        <div class="nex-about-content">
                                            <?php if(!empty($about_title_one)){?>
                                                <h5 class="nex-about-top-title"><?php echo esc_html($about_title_one);?></h5>
                                            <?php }?>
                                            <?php if(!empty($about_number_one)){?>
                                                <h2 class="nex-about-number"><?php echo esc_html($about_number_one);?></h2>
                                            <?php }?>
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="next-about-us-icon">
                                    <?php if($show_icon === '1'){?>
                                        <div class="nex-about-us-icon">
                                            <span class="primary-color nex-element-icon <?php echo esc_html( $iconClass ) ?>" ></span>
                                        </div>
                                    <?php }?>
                                    <?php if(!empty($about_title_two) || !empty($about_number_two)){?>
                                        <div class="nex-about-content">
                                            <?php if(!empty($about_title_two)){?>
                                                <h5 class="nex-about-top-title"><?php echo esc_html($about_title_two);?></h5>
                                            <?php }?>
                                            <?php if(!empty($about_number_two)){?>
                                                <h2 class="nex-about-number"><?php echo esc_html($about_number_two);?></h2>
                                            <?php }?>
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="next-about-us-icon">
                                    <?php if($show_icon === '1'){?>
                                        <div class="nex-about-us-icon">
                                            <span class="primary-color nex-element-icon <?php echo esc_html( $iconClass ) ?>" ></span>
                                        </div>
                                    <?php }?>
                                    <?php if(!empty($about_title_three) || !empty($about_number_three)){?>
                                        <div class="nex-about-content">
                                            <?php if(!empty($about_title_three)){?>
                                                <h5 class="nex-about-top-title"><?php echo esc_html($about_title_three);?></h5>
                                            <?php }?>
                                            <?php if(!empty($about_number_three)){?>
                                                <h2 class="nex-about-number"><?php echo esc_html($about_number_three);?></h2>
                                            <?php }?>
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="next-about-us-icon">
                                    <?php if($show_icon === '1'){?>
                                        <div class="nex-about-us-icon">
                                            <span class="primary-color nex-element-icon <?php echo esc_html( $iconClass ) ?>" ></span>
                                        </div>
                                    <?php }?>
                                    <?php if(!empty($about_title_four) || !empty($about_number_four)){?>
                                        <div class="nex-about-content">
                                            <?php if(!empty($about_title_four)){?>
                                                <h5 class="nex-about-top-title"><?php echo esc_html($about_title_four);?></h5>
                                            <?php }?>
                                            <?php if(!empty($about_number_four)){?>
                                                <h2 class="nex-about-number"><?php echo esc_html($about_number_four);?></h2>
                                            <?php }?>
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="nex-about-us-image">
							<?php echo wp_kses_post($img['thumbnail']); ?>
						</div>
					</div>
					<?php if($show_button === '1'):?>
						<a class="nex-about-us-button text-primary-color border-primary-color rounder-3" href="<?php echo esc_url($button_link);?>"><?php echo esc_html($button_name);?></a>
					<?php endif;?>
				</div>
			</div>
		<?php endif;?>
	<?php } else {?> 
		<?php 
			echo "no-image"; ?>	
			<div class="nex-about-us bg-nex-about-us-no-img align-image-left <?php echo esc_html(implode(' ', $class));?>">
				<div class="row">
					<!-- No image  -->
					<div class="col-xs-12 col-md-12">
						<div class="nex-about-us-default">
							<?php if(!empty($title)){?>
								<h4 class="nex-about-us-title text-primary-color"><?php echo esc_html($title);?></h4>
							<?php }?>
							<div class="col-xs-3 col-md-3">
								<div class="next-about-us-icon">
									<?php if($show_icon === '1'){?>
										<div class="nex-about-us-icon">
											<span class="primary-color <?php echo esc_html($iconClass) ?>"></span>
										</div>
									<?php }?>
									<?php if(!empty($about_title_one) || !empty($about_number_one)){?>
										<div class="nex-about-content">
											<?php if(!empty($about_title_one)){?>
												<h5 class="nex-about-top-title"><?php echo esc_html($about_title_one);?></h5>
											<?php }?>
											<?php if(!empty($about_number_one)){?>
												<h2 class="nex-about-number"><?php echo esc_html($about_number_one);?></h2>
											<?php }?>
										</div>
									<?php }?>
								</div>
							</div>
							<div class="col-xs-3 col-md-3">
								<div class="next-about-us-icon">
									<?php if($show_icon === '1'){?>
										<div class="nex-about-us-icon">
											<span class="primary-color nex-element-icon <?php echo esc_html( $iconClass ) ?>" ></span>
										</div>
									<?php }?>
									<?php if(!empty($about_title_two) || !empty($about_number_two)){?>
										<div class="nex-about-content">
											<?php if(!empty($about_title_two)){?>
												<h5 class="nex-about-top-title"><?php echo esc_html($about_title_two);?></h5>
											<?php }?>
											<?php if(!empty($about_number_two)){?>
												<h2 class="nex-about-number"><?php echo esc_html($about_number_two);?></h2>
											<?php }?>
										</div>
									<?php }?>
								</div>
							</div>
							<div class="col-xs-3 col-md-3">
								<div class="next-about-us-icon">
									<?php if($show_icon === '1'){?>
										<div class="nex-about-us-icon">
											<span class="primary-color nex-element-icon <?php echo esc_html( $iconClass ) ?>" ></span>
										</div>
									<?php }?>
									<?php if(!empty($about_title_three) || !empty($about_number_three)){?>
										<div class="nex-about-content">
											<?php if(!empty($about_title_three)){?>
												<h5 class="nex-about-top-title"><?php echo esc_html($about_title_three);?></h5>
											<?php }?>
											<?php if(!empty($about_number_three)){?>
												<h2 class="nex-about-number"><?php echo esc_html($about_number_three);?></h2>
											<?php }?>
										</div>
									<?php }?>
								</div>
							</div>
							<div class="col-xs-3 col-md-3">
								<div class="next-about-us-icon">
									<?php if($show_icon === '1'){?>
										<div class="nex-about-us-icon">
											<span class="primary-color nex-element-icon <?php echo esc_html( $iconClass ) ?>"></span>
										</div>
									<?php }?>
									<?php if(!empty($about_title_four) || !empty($about_number_four)){?>
										<div class="nex-about-content">
											<?php if(!empty($about_title_four)){?>
												<h5 class="nex-about-top-title"><?php echo esc_html($about_title_four);?></h5>
											<?php }?>
											<?php if(!empty($about_number_four)){?>
												<h2 class="nex-about-number"><?php echo esc_html($about_number_four);?></h2>
											<?php }?>
										</div>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
					<?php if($show_button === '1'):?>
						<a class="nex-about-us-button text-primary-color border-primary-color rounder-3" href="<?php echo esc_url($button_link);?>"><?php echo esc_html($button_name);?></a>
					<?php endif;?>
				</div>
			</div>
	<?php }?>
	<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output; 
}

if(function_exists('add_shortcode')) { add_shortcode('nex_about_us', 'nex_about_us_func'); }
