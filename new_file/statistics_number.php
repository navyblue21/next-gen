<?php 
function ng_statistics_number_func($atts) {
    $atts = shortcode_atts(array(
        'type' => 'title',
        'title' => '',
        'number1' => '',
        'text1' => '',
        'number2' => '',
        'text2' => '',
        'number3' => '',
        'text3' => '',
        'el_class' => ''
    ), $atts);

    $type = $atts['type'];
    $title = $atts['title'];
    $number1 = $atts['number1'];
    $text1 = $atts['text1'];
    $number2 = $atts['number2'];
    $text2 = $atts['text2'];
    $number3 = $atts['number3'];
    $text3 = $atts['text3'];
    $el_class = $atts['el_class'];

    $class = array($el_class);	
	ob_start();
    // var_dump($type);
    if($type === 'title'){?>
        <div class="ng-statistic-numbers-title <?php echo esc_html(implode(' ', $class)); ?>">
			<div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <h2 class="ng-statistic-number-title nex-title"><?php echo esc_html($title) ?></h2>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                      <ul class="ng-statistic-number-list">
                            <li class="ng-statistic-number-list-item">
                                <h4 class="ng-statistic-number"><?php echo esc_html($number1); ?></h4>
                                <p class="ng-statistic-text"><?php echo esc_html($text1); ?></p>
                            </li>
                            <li class="ng-statistic-number-list-item">
                                <h4 class="ng-statistic-number"><?php echo esc_html($number2); ?></h4>
                                <p class="ng-statistic-text"><?php echo esc_html($text2); ?></p>
                            </li>
                            <li class="ng-statistic-number-list-item">
                                <h4 class="ng-statistic-number"><?php echo esc_html($number3); ?></h4>
                                <p class="ng-statistic-text"><?php echo esc_html($text3); ?></p>
                            </li>
                      </ul>
                </div>
            </div>
		</div>
    <?php }else{
        echo "no title";?>
        <div class="ng-statistic-numbers <?php echo esc_html(implode(' ', $class)); ?>">
			<div class="row">                
                <ul class="ng-statistic-number-list">
                    <li>
                        <h4 class="ng-statistic-number"><?php echo esc_html($number1); ?></h4>
                        <p class="ng-statistic-text"><?php echo esc_html($text1); ?></h4>
                    </li>
                    <li>
                        <h4 class="ng-statistic-number"><?php echo esc_html($number2); ?></h4>
                        <p class="ng-statistic-text"><?php echo esc_html($text2); ?></p>
                    </li>
                    <li>
                        <h4 class="ng-statistic-number"><?php echo esc_html($number3); ?></h4>
                        <p class="ng-statistic-text"><?php echo esc_html($text3); ?></p>
                    </li>
                </ul>
            </div>
		</div>
    <?php }
	?>
		
	<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output; 
}

if(function_exists('add_shortcode')) { add_shortcode('ng_statistics_number', 'ng_statistics_number_func'); }
