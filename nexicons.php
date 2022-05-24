<?php 
function nex_icons_func($atts) {
    $atts = shortcode_atts(array(
        'icon_type' => 'icon',
		'icon_text' => '',
        'type' => 'remixicon',
        'icon_remixicon' => 'ri-24-hours-fill',
        'custom_color' => '',
        'icon_link' => '#',
        'el_class' => '',
    ), $atts);
    $icon_type	= $atts['icon_type'];
    $icon_text	= $atts['icon_text'];
	$type = $atts['type'];
	$icon_remixicon = $atts['icon_remixicon'];
	$custom_color = $atts['custom_color'];
	$icon_link = $atts['icon_link'];
    $el_class = $atts['el_class'];
    
    vc_icon_element_fonts_enqueue( $type );
    $iconClass = isset( ${'icon_' . $type} ) ? ${'icon_' . $type} : 'ri-24-hours-fill';
    $style_inline = 'style="';
    if(!empty($custom_color)) $style_inline.='color:' . esc_html( $custom_color ) . ' !important;';
    $style_inline .= '"';
	ob_start();
	?>
    <?php if($icon_type === 'icon') {
        echo "icon"; 
        ?>       
        <a class="nex-icon <?php echo esc_attr($el_class); ?>" href="<?php echo esc_url($icon_link); ?>">
            <span class="nex-element-icon <?php echo esc_html( $iconClass ) ?>" <?php echo wp_kses_post($style_inline); ?>></span>
            <span class="ml-1 nex-element-text"><?php echo esc_html($icon_text); ?></span>
        </a>
    <?php }else{ 
        echo "icon_popup here";   
        ?>      
        <!-- href="<?php echo esc_url($icon_link); ?>" -->
        <div class="popup-nex-icon">
            <a class="nex-icon icon-popup <?php echo esc_attr($el_class); ?>" data-id="<?php echo esc_attr(get_the_ID());?>">
                <span class="nex-element-icon <?php echo esc_html( $iconClass ) ?>" <?php echo wp_kses_post($style_inline); ?>></span>
                <span class="ml-1 nex-element-text"><?php echo esc_html($icon_text); ?></span>
            </a>
        </div>
    <?php }
    ?>
    <script>
        jQuery(document).ready(function($) {
            var _button_read = $('.popup-nex-icon');
            _button_read.on('click', 'a', function(e) {
                e.preventDefault();
                var icon_id = $(this).data('id');
                var _this = $(this);
                $.ajax({
                    type: "POST",
                    url: '<?php echo esc_html(admin_url("admin-ajax.php"));?>',
                    data: { action: 'render_parent', id: icon_id },
                    success: function(data) {
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
	<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output; 
    
}

if(function_exists('add_shortcode')) { add_shortcode('nex_icons', 'nex_icons_func'); }
