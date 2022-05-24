<?php
if ( ! function_exists('ng_event_fn')){
	function ng_event_fn($atts) {
        $atts = shortcode_atts(array(
			'post_type' => 'event',
			'posts_per_page' => 10,
			'category' => '',
			'orderby' => 'none',
			'order' => 'none',
			'el_class' => ''
		), $atts);

        $post_type = $atts['post_type'];
        $posts_per_page= $atts['posts_per_page'];
        $category= $atts['category'];
        $orderby = $atts['orderby'];
        $order = $atts['order'];
        $el_class = $atts['el_class'];
        
		$class = array();
		$class[] = 'ng-events';
		$class[] = $el_class;
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
                    'taxonomy' => 'event_cat',
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
                <?php 
                $i = 0;
                while($wp_query->have_posts()){
					$wp_query->the_post(); 
                    $event_day = get_post_meta(get_the_ID(),'event_day',true);
                    $event_start = get_post_meta(get_the_ID(),'event_start',true);
                    $event_agenda = get_post_meta(get_the_ID(),'event_agenda',true);
                    $event_end = get_post_meta(get_the_ID(),'event_end',true);
                    $event_reserve_link = get_post_meta(get_the_ID(),'event_reserve_link',true);
                    ?>
                    <!-- event first -->
                    <div class="row wrapper-event">
                        <div class="col-md-2 col-sm-6">
                            <div class="event-date-time">
                                <div class="event-month">
                                    <?php 
                                        if(!empty( $event_day )){
                                            echo esc_html(gmdate('F', strtotime($event_day)));
                                        }
                                    ?>
                                </div>
                                <div class="event-day">
                                    <?php 
                                        if(!empty( $event_day )){
                                            echo esc_html(gmdate('d', strtotime($event_day)));
                                        }
                                    ?>
                                </div>
                                <div class="event-full-day">
                                    <?php 
                                        if(!empty( $event_day )){
                                            echo esc_html(gmdate('l', strtotime($event_day)));
                                        }
                                    ?>
                                </div>
                                <div class="event-time">
                                    
                                    <?php 
                                        $event_time = '';
                                        if(!empty( $event_start )){
                                            $event_time = '<span class="d-inline-block">' . $event_start . '</span>';
                                        }if(!empty( $event_end )){
                                            $event_time .= '<span class="d-inline-block">  - ' . $event_end . '</span>';
                                        }
                                        echo wp_kses_post($event_time);
                                    ?>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="event-content">
                                <h2 class="event-title"><?php the_title();?></h2>
                                <?php the_content(); ?>
                                <div class="event-acitons">
                                    <a class="event-button nex-button nex-button-primary" href="<?php echo esc_url($event_reserve_link);?>"><?php echo esc_html__('Reserve now', 'nextgen')?></a>
                                    <a class="event-button nex-button button-view-full" href="<?php the_permalink(); ?>"><?php echo esc_html__('More details', 'nextgen')?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 event-img">
                            <?php if (has_post_thumbnail()) {
                                $image = wpb_getImageBySize(array('attach_id' => get_post_thumbnail_id(get_the_ID()), 'thumb_size' => '384x384'));
                                $image = $image['thumbnail'];
                                echo wp_kses_post($image);
                            } ?>   
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <div class="event-agenda">
                                <div class="event-agenda-title">
                                  <?php echo esc_html__('Agenda', 'nextgen')?>
                                </div>
                                <div class="event-agenda-content">
                                    <?php echo wp_kses_post(nl2br($event_agenda));?>
                                 </div>
                                <!-- <a class="event-button nex-button button-view-full" href="<?php the_permalink(); ?>"><?php echo esc_html__('View full', 'nextgen')?></a> -->
                            </div>             
                        </div>
                    </div>
                    <!-- event second -->
                    <div class="row wrapper-event">
                        <div class="col-md-2 col-sm-6">
                            <div class="event-date-time">
                                <div class="event-day">
                                    <?php 
                                        if(!empty( $event_day )){
                                            echo esc_html(gmdate('d', strtotime($event_day)));
                                        }
                                    ?>
                                </div>
                                <div class="event-full-day">
                                    <?php 
                                        if(!empty( $event_day )){
                                            echo esc_html(gmdate('l', strtotime($event_day)));
                                        }
                                    ?>
                                </div>
                                <div class="event-time">
                                    
                                    <?php 
                                        $event_time = '';
                                        if(!empty( $event_start )){
                                            $event_time = '<span class="d-inline-block">' . $event_start . '</span>';
                                        }if(!empty( $event_end )){
                                            $event_time .= '<span class="d-inline-block">  - ' . $event_end . '</span>';
                                        }
                                        echo wp_kses_post($event_time);
                                    ?>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="event-content">
                                <h2 class="event-title"><?php the_title();?></h2>
                                <?php the_content(); ?>
                                <div class="event-acitons">
                                    <a class="event-button nex-button nex-button-primary" href="<?php echo esc_url($event_reserve_link);?>"><?php echo esc_html__('Reserve now', 'nextgen')?></a>
                                    <a class="event-button nex-button button-view-full" href="<?php the_permalink(); ?>"><?php echo esc_html__('More details', 'nextgen')?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <div class="event-agenda">
                                <div class="event-agenda-title">
                                  <?php echo esc_html__('Agenda', 'nextgen')?>
                                </div>
                                <div class="event-agenda-content">
                                    <?php echo wp_kses_post(nl2br($event_agenda));?>
                                 </div>
                                <!-- <a class="event-button nex-button button-view-full" href="<?php the_permalink(); ?>"><?php echo esc_html__('View full', 'nextgen')?></a> -->
                            </div>             
                        </div>
                        <div class="col-md-4 col-sm-6 event-img">
                            <?php if (has_post_thumbnail()) {
                                $image = wpb_getImageBySize(array('attach_id' => get_post_thumbnail_id(get_the_ID()), 'thumb_size' => '384x384'));
                                $image = $image['thumbnail'];
                                echo wp_kses_post($image);
                            } ?>   
                        </div>
                    </div>
                    <hr class="line-slice">
                    <!-- event third -->
                    <div class="row wrapper-event">
                        <div class="col-md-2 col-sm-6">
                            <div class="event-date-time">
                                <div class="event-month">
                                    <?php 
                                        if(!empty( $event_day )){
                                            echo esc_html(gmdate('F', strtotime($event_day)));
                                        }
                                    ?>
                                </div>
                                <div class="event-day">
                                    <?php 
                                        if(!empty( $event_day )){
                                            echo esc_html(gmdate('d', strtotime($event_day)));
                                        }
                                    ?>
                                </div>
                                <div class="event-full-day">
                                    <?php 
                                        if(!empty( $event_day )){
                                            echo esc_html(gmdate('l', strtotime($event_day)));
                                        }
                                    ?>
                                </div>
                                <div class="event-time">
                                    
                                    <?php 
                                        $event_time = '';
                                        if(!empty( $event_start )){
                                            $event_time = '<span class="d-inline-block">' . $event_start . '</span>';
                                        }if(!empty( $event_end )){
                                            $event_time .= '<span class="d-inline-block">  - ' . $event_end . '</span>';
                                        }
                                        echo wp_kses_post($event_time);
                                    ?>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="event-content">
                                <h2 class="event-title"><?php the_title();?></h2>
                                <?php the_content(); ?>
                                <div class="event-acitons">
                                    <a class="event-button nex-button nex-button-primary" href="<?php echo esc_url($event_reserve_link);?>"><?php echo esc_html__('Reserve now', 'nextgen')?></a>
                                    <a class="event-button nex-button button-view-full" href="<?php the_permalink(); ?>"><?php echo esc_html__('More details', 'nextgen')?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 event-img">
                            <?php if (has_post_thumbnail()) {
                                $image = wpb_getImageBySize(array('attach_id' => get_post_thumbnail_id(get_the_ID()), 'thumb_size' => '384x384'));
                                $image = $image['thumbnail'];
                                echo wp_kses_post($image);
                            } ?>   
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <div class="event-agenda">
                                <div class="event-agenda-title">
                                  <?php echo esc_html__('Agenda', 'nextgen')?>
                                </div>
                                <div class="event-agenda-content">
                                    <?php echo wp_kses_post(nl2br($event_agenda));?>
                                 </div>
                                <!-- <a class="event-button nex-button button-view-full" href="<?php the_permalink(); ?>"><?php echo esc_html__('View full', 'nextgen')?></a> -->
                            </div>             
                        </div>
                    </div>
                <?php } ?>
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
						data: { action: 'render_single_teacher', id: teacher_id },
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
if(function_exists('add_shortcode')) { add_shortcode('ng_events', 'ng_event_fn'); }
