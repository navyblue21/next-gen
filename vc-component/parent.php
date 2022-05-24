<?php add_action('init', 'ng_parent_integrateWithVC');
function ng_parent_integrateWithVC() {
	vc_map(
		array(
			'name'        => esc_html__( 'Parent with popup','nextgen'),
			'base'        => 'ng_parent',
			'class' 	  => 'ng_parent',
			'category'    => esc_html__( 'NextGen', 'nextgen'),
			'icon' 		  => 'tb-icon-for-vc',
			'params'      => array(
                array (
					"type" => "tb_taxonomy",
					"taxonomy" => "parent_cat",
					"heading" => __ ( "Categories", 'nextgen' ),
					"param_name" => "category",
					"description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'nextgen' )
				),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Button name", 'nextgen'),
					"param_name" => "button_name",
					"value" => "Read more",
					"description" => __("Please, enter button name in this element.", 'nextgen')
				), 
				array(
					'type' => 'textfield',
					'class' => '',
					'heading' => __('Post Count', 'nextgen'),
					'param_name' => 'posts_per_page',
					'value' => '',
					'description' => __('Please, enter number of post per page for parent. Show all: -1.','nextgen')
				),
                array(
                    'type' => 'checkbox',
                    'heading' => __('Full container item leader', 'nextgen'),
                    'param_name' => 'full_container',
                    'value' => array(
                        __('Yes, please', 'nextgen') => 1
                    ),
                    'description' => __('Select to display the item full container', 'nextgen')
                ),
				array(
					'type' => 'dropdown',
					'heading' => __('Order by', 'nextgen'),
					'param_name' => 'orderby',
					'value' => array(
						'None' => 'none',
						'Title' => 'title',
						'Date' => 'date',
						'ID' => 'ID'
					),
					'description' => __('Order by ("none", "title", "date", "ID").', 'nextgen')
				),
				array(
					'type' => 'dropdown',
					'heading' => __('Order','nextgen'),
					'param_name' => 'order',
					'value' => Array(
						'None' => 'none',
						'ASC' => 'ASC',
						'DESC' => 'DESC'
					),
					'description' => __('Order ("None", "Asc", "Desc").','nextgen')
				),
				array(
					'type' => 'textfield',
					'class' => '',
					'heading' => __('Extra Class','nextgen'),
					'param_name' => 'el_class',
					'value' => '',
					'description' => __ ('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','nextgen')
				),
			)
		)
	);
}