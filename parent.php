<?php
if ( ! function_exists('ng_parent_fn')){
	function ng_parent_fn($atts) {
        $atts = shortcode_atts(array(
			'post_type' => 'parent',
			'full_container' => 0,
			'posts_per_page' => 10,
			'category' => '',
			'orderby' => 'none',
			'order' => 'none',
			'el_class' => ''
		), $atts);

        $post_type = $atts['post_type'];
        $full_container = !empty($atts['full_container']) ? 'full_container' : '';
        $posts_per_page= $atts['posts_per_page'];
        $category= $atts['category'];
        $orderby = $atts['orderby'];
        $order = $atts['order'];
        $el_class = $atts['el_class'];
        
		$class = array();
		$class[] = 'ng-teachers-leaders girds_teacher';
		$class[] = $el_class;
		$class[] = $full_container;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
			'posts_per_page' => $posts_per_page,
			'paged' => $paged,
			'orderby' => $orderby,
			'order' => $order,
			'post_type' => $post_type,
			'post_status' => 'publish'
		);
        if (isset($category) && $category !== '') {
			$cats = explode(',', $category);
			$category = array();
			foreach ((array) $cats as $cat) :
			$category[] = trim($cat);
			endforeach;
			$args['tax_query'] = array(
					array(
						'taxonomy' => 'parent_cat',
						'field' => 'id',
						'terms' => $category
					)
			);
		}
		$wp_query = new WP_Query($args);

        
		
		ob_start();
		if ( $wp_query->have_posts() ) {
		?>
		<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
            <div class="row">
                <?php 
                $i = 1;
                while($wp_query->have_posts())
				{
					$wp_query->the_post();
					$col_1 = 'col-md-4';
    				$col_2 = 'col-md-8';
					if($i%2 === 0){
						$col_1 = 'col-md-8 resize-ma';
						$col_2 = 'col-md-4 resize-mb';
					}
					if(!function_exists('testimonial_image')){
						function testimonial_image(){
							ob_start(); 
							if (has_post_thumbnail()) {
									$image = wpb_getImageBySize(array('attach_id' => get_post_thumbnail_id(get_the_ID()), 'thumb_size' => '280x280'));
									$image = $image['thumbnail'];
									echo wp_kses_post($image);
								} ?>
								<div class="button_teachers btn_hide"><a href="<?php the_permalink(); ?>"><?php echo esc_html_e('Read more', 'nextgen'); ?></a></div>
							<?php 
							$output = ob_get_contents();
							ob_end_clean();
							return $output;
						}
					}
					if(!function_exists('testimonial_content')){
						function testimonial_content(){
							ob_start(); ?>
										<h2 class="title"><?php the_title(); ?></h2>
										<span class="nex-border background-primary-color-two"></span>
										<div class="ng-teacher-decs">
											<?php the_excerpt();?>
										</div>
										<div class="button_teachers"><a href="<?php the_permalink(); ?>" data-id="<?php echo esc_attr(get_the_ID());?>"><?php echo esc_html_e('Read more', 'nextgen'); ?><span class="fas fa-spinner"></span></a></div>
									<?php 
									$output = ob_get_contents();
									ob_end_clean();
									return $output;
								}
							}
						?>
                    
                    <div class="col-md-12 col-md-push-2 col-sm-12">
                        <div class="ng-teacher-slider-item big-item">
                            <div class="ng-teacher-thumbnails-big">
								<div class="<?php echo esc_attr($col_1)?> col-sm-6 col-xs-12">
									<?php echo ( esc_attr($i) %2 !== 0) ? testimonial_image() : testimonial_content(); ?>
								</div>
								<div class="<?php echo esc_attr($col_2)?> col-sm-6 col-xs-12">
									<?php echo ( esc_attr($i) %2 !== 0) ? testimonial_content() : testimonial_image(); ?>
								</div> 
                            </div>
                        </div>
                    </div>
                <?php $i++;}?>
            </div>
        </div>
		<?php
		}else {
			echo 'Post not found!';
		} ?>
        <script>
			jQuery(document).ready(function($) {
				var _button_read = $('.button_teachers');
		    	_button_read.on('click', 'a', function(e) {
					e.preventDefault();
					var teacher_id = $(this).data('id');
                    var _this = $(this);
					_this.addClass('ng-loading');
					$.ajax({
						type: "POST",
						url: '<?php echo esc_html(admin_url("admin-ajax.php"));?>',
						data: { action: 'render_parent', id: teacher_id },
						success: function(data) {
							_this.removeClass('ng-loading');
							if(data){
                                $('.ng-light-box-content').empty().append(data);
								$('.ng-light-box').fadeIn("slow");
								var _button_close = $('body').find('.button-close');
								if (_button_close.length > 0) {
									_button_close.on('click', function(e) {
										$('.ng-light-box').fadeOut("slow");
									});
								}
                            }

						}
					})
				})
			});
		</script> 
		<?php wp_reset_postdata();
		return ob_get_clean();
	}
}
if(function_exists('add_shortcode')) { add_shortcode('ng_parent', 'ng_parent_fn'); }
