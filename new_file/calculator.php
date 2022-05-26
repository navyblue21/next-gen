<?php function nex_calculator_func($atts)
{
    $grade = array(
        1 => array(
            'name' => __('Early years 1 and 2', 'nextgen'),
            'price' => '26000',
        ),
        2 => array(
            'name' => __('Early years 3', 'nextgen'),
            'price' => '27000',
        ),
        3 => array(
            'name' => __('Early years 4', 'nextgen'),
            'price' => '28000',
        ),
        4 => array(
            'name' => __('Kindergarten', 'nextgen'),
            'price' => '29000',
        ),
        5 => array(
            'name' => __('Year 1', 'nextgen'),
            'price' => '30000',
        ),
        6 => array(
            'name' => __('Year 2', 'nextgen'),
            'price' => '30500',
        ),
        7 => array(
            'name' => __('Year 3', 'nextgen'),
            'price' => '30500',
        ),
        8 => array(
            'name' => __('Year 4', 'nextgen'),
            'price' => '30500',
        ),
        9 => array(
            'name' => __('Year 5', 'nextgen'),
            'price' => '30500',
        ),
        10 => array(
            'name' => __('Year 6', 'nextgen'),
            'price' => '32100',
        ),
        11 => array(
            'name' => __('Year 7', 'nextgen'),
            'price' => '32100',
        ),
        12 => array(
            'name' => __('Year 8', 'nextgen'),
            'price' => '32100',
        ),
        13 => array(
            'name' => __('Year 9', 'nextgen'),
            'price' => '32100',
        ),
        14 => array(
            'name' => __('Year 10', 'nextgen'),
            'price' => '32100',
        ),
        15 => array(
            'name' => __('Year 11', 'nextgen'),
            'price' => '32100',
        ),
        16 => array(
            'name' => __('Year 12', 'nextgen'),
            'price' => '32100',
        ),
    );
    $default_atts = array(
        'currency' => '$',
        'el_class' => '',
        'type'     => 'type_1'
    );
    for($i=1; $i<=16; $i++){
        $default_atts['grade_name_' . $i] = $grade[$i]['name'];
        $default_atts['grade_price_' . $i] = $grade[$i]['price'];
    }
    $atts = shortcode_atts($default_atts, $atts);
    $el_class = $atts['el_class'];
    $type = $atts['type'];
    var_dump ($type);
    ob_start(); ?>
    <?php if($type ==='type_1'){?>
		<div class="nex-calculator <?php echo esc_html($el_class); ?>">
			<div class="row">
		    	<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="inner-calculator an">
						<div class="wrap-inner-a">
							<p class="nex-calculator-box-title"><?php esc_html_e('Date of birth', 'nextgen'); ?></p>
							<div class="nex-calculator-box-content">
								<div class="nex-calculator-box-input">
									<p><?php esc_html_e('Year', 'nextgen'); ?></p>
									<select name="nex-calculator-year" class="nex-calculator-input nex-calculator-year">
										<?php $current_year = gmdate('Y');
                                            $current_month = gmdate('m');
                                            for ($i = ($current_year - 2); $i > ($current_year - 19); $i--) {
                                                $y_selected = ($i === ($current_year - 2)) ? 'selected' : '';
                                                echo '<option value='. (esc_attr($current_year) - esc_attr($i) - 1) .' '. esc_attr($y_selected) .'> '. esc_html($i) .'</option>';
                                            } ?>
									</select>
								</div>
								<div class="nex-calculator-box-input">
									<p><?php esc_html_e('Month', 'nextgen'); ?></p>
									<select name="nex-calculator-month" class="nex-calculator-input nex-calculator-month">
										<?php
                                            for ($i = 1; $i <=12; $i++) {
                                                $m_selected = ($i === $current_month) ? 'selected' : '';
                                                echo '<option value='. esc_attr($i) .' '. esc_attr($m_selected) .'> '. esc_html($i) .'</option>';
                                            } ?>
									</select>
								</div>
							</div>
						</div>
					</div>
                </div>
		    	<div class="col-md-3 col-sm-5 col-xs-12">
					<div class="inner-calculator bn">
                        <div class="list-grade">
                            <p class="nex-calculator-box-title"><?php esc_html_e('Grade', 'nextgen'); ?></p>
                            <div class="nex-calculator-box-content">
                                <div class="arrow-right">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                </div>
                                <ul class="nex-calculator-age" >
                                    <?php 
                                        for($i=1; $i<=16; $i++){?>
                                            <li data-grade="<?php echo esc_html($i);?>" class="age-<?php echo esc_html($i);?>"><?php echo esc_html($atts['grade_name_' . $i]);?></li>
                                        <?php }
                                    ?>
                                </ul>
                                <div class="arrow-left">
                                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        
					</div>
                </div>
		    	<div class="col-md-4 col-sm-7 col-xs-12">
					<div class="inner-calculator cn">
						<div class="wrap-inner-c">
							<p class="nex-calculator-box-title"><?php esc_html_e('Annual Course Fee', 'nextgen'); ?></p>
							<div class="nex-calculator-box-content">
								<div class="nex-calculator-fee"><span><?php echo esc_html($atts['currency']);?></span><p><?php echo esc_html($atts['grade_price_1']);?></p></div>
							</div>
						</div>
					</div>
                </div>
            </div>
		</div>
        <?php }else{?> 
            <div class="nex-calculator <?php echo esc_html($el_class); ?>">
			<div class="row">
		    	<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="inner-calculator an">
						<div class="wrap-inner-a">
							<p class="nex-calculator-box-title"><?php esc_html_e('Date of birth', 'nextgen'); ?></p>
							<div class="nex-calculator-box-content">
								<div class="nex-calculator-box-input">
									<p><?php esc_html_e('Year', 'nextgen'); ?></p>
									<select name="nex-calculator-year" class="nex-calculator-input nex-calculator-year">
										<?php $current_year = gmdate('Y');
                                            $current_month = gmdate('m');
                                            for ($i = ($current_year - 2); $i > ($current_year - 19); $i--) {
                                                $y_selected = ($i === ($current_year - 2)) ? 'selected' : '';
                                                echo '<option value='. (esc_attr($current_year) - esc_attr($i) - 1) .' '. esc_attr($y_selected) .'> '. esc_html($i) .'</option>';
                                            } ?>
									</select>
								</div>
								<div class="nex-calculator-box-input">
									<p><?php esc_html_e('Month', 'nextgen'); ?></p>
									<select name="nex-calculator-month" class="nex-calculator-input nex-calculator-month">
										<?php
                                            for ($i = 1; $i <=12; $i++) {
                                                $m_selected = ($i === $current_month) ? 'selected' : '';
                                                echo '<option value='. esc_attr($i) .' '. esc_attr($m_selected) .'> '. esc_html($i) .'</option>';
                                            } ?>
									</select>
								</div>
							</div>
                            <button type="button" class="btn-calculate mt-2">CALCULATE</button>
						</div>

					</div>
                </div>
		    	<div class="col-md-3 col-sm-5 col-xs-12">
					<div class="inner-calculator bn">
                        <div class="list-grade">
                            <p class="nex-calculator-box-title"><?php esc_html_e('Grade', 'nextgen'); ?></p>
                            <div class="nex-calculator-box-content">
                                <div class="arrow-right">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                </div>
                                <ul class="nex-calculator-age" >
                                    <?php 
                                        for($i=1; $i<=16; $i++){?>
                                            <li data-grade="<?php echo esc_html($i);?>" class="age-<?php echo esc_html($i);?>"><?php echo esc_html($atts['grade_name_' . $i]);?></li>
                                        <?php }
                                    ?>
                                </ul>
                                <div class="arrow-left">
                                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        
						
					</div>
                </div>
		    	<div id="display-fee" class="col-md-4 col-sm-7 col-xs-12 wrapper-fee hide-fee">
					<div class="inner-calculator cn">
						<div class="wrap-inner-c">
							<p class="nex-calculator-box-title"><?php esc_html_e('Annual Course Fee', 'nextgen'); ?></p>
							<div class="nex-calculator-box-content">
								<div class="nex-calculator-fee"><span><?php echo esc_html($atts['currency']);?></span><p><?php echo esc_html($atts['grade_price_1']);?></p></div>
							</div>
						</div>
					</div>
                </div>
            </div>
		</div>
            
        <?php } ?>
        <?php
            $list_fee = array(); 
            for($i=1; $i<=16; $i++){
                $list_fee[$i] = $atts['grade_price_' . $i];
            }
            $list_fee[17] = $list_fee[16];
        ?>
            
        <script>
            jQuery(document).ready(function($) {
                var current_year = <?php echo wp_json_encode($current_year); ?>,
                current_month = <?php echo wp_json_encode($current_month); ?>,
                list_fee = <?php echo wp_json_encode($list_fee); ?>,
                progressing = false;
                function nex_calculator_fee(){
                    if(progressing) return;
                    // Dang xu ly
                    progressing = true;
                    var nex_year = $('.nex-calculator-year');
                    var nex_month = $('.nex-calculator-month').val();
                    var grade = nex_year.val();
                    grade = nex_month > 8 ? parseInt(grade) - 1 : grade;  
                    grade = grade < 1 ? 1 : (grade > 17 ? 17 : grade);
                    var current_age =  $('.nex-calculator-age').find('.age-' + grade);
                    if(current_age.length > 0) {
                        $('.nex-calculator-age').find('li').removeClass('selected-age');
                        current_age.addClass('selected-age');
                        $('.nex-calculator-age').animate({ scrollTop: (grade - 1)*38 }, 600);
                    }
                    $('.nex-calculator-fee').find('p').empty().html(wrapChars(list_fee[nex_year.val()]));
                    // Xy ly xong
                    progressing = false;
                }
                function wrapChars(str, tmpl) {
                    return str.replace(/\w/g, tmpl || "<span>$&</span>");
                }
                function nex_calculator_fee_by_grade(grade){
                    if(progressing) return;
                    // Dang xu ly
                    progressing = true;
                    grade = grade < 1 ? 1 : (grade > 17 ? 17 : grade);
                    $('.nex-calculator-age').find('li').removeClass('selected-age');
                    $('.nex-calculator-age').find('li.age-'+grade).addClass('selected-age');
                    $('.nex-calculator-year').val(grade).trigger('change');
                    $('.nex-calculator-month').val(1).trigger('change');
                    $('.nex-calculator-fee').find('p').empty().html(wrapChars(list_fee[grade]));
                    // Xy ly xong
                    progressing = false;
                }
                nex_calculator_fee();
                $('.nex-calculator-input').on('change', function(){
                    nex_calculator_fee();
                });
                $('.nex-calculator-age').on('click', 'li', function(){
                    var grade = $(this).data('grade');
                    nex_calculator_fee_by_grade(parseInt(grade));
                });
                
                $('.btn-calculate').on('click', function(){
                    
                    $(".wrapper-fee").removeClass("hide-fee");
                })
                


            });
        </script>     
	<?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}

if (function_exists('add_shortcode')) {
    add_shortcode('nex_calculator', 'nex_calculator_func');
}
