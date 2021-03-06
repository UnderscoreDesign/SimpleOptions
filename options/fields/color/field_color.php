<?php
class Simple_Options_color extends Simple_Options{	
	
	/**
	 * Field Constructor.
	 *
	 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
	 *
	 * @since Simple_Options 1.0.0
	*/
	function __construct($field = array(), $value ='', $parent){
		
		parent::__construct($parent->sections, $parent->args, $parent->extra_tabs);
		$this->field = $field;
		$this->value = $value;
		//$this->render();
		
	}//function
	
	
	
	/**
	 * Field Render Function.
	 *
	 * Takes the vars and outputs the HTML for the field in the settings
	 *
	 * @since Simple_Options 1.0.0
	*/
	function render(){
		
		$class = (isset($this->field['class']))?$this->field['class']:'';

		echo '<input name="' . $this->args['opt_name'] . '" id="' . $this->field['id'] . '" class="sof-color ' . $class . '"  type="text" value="' . $this->value . '"  data-default-color="' . $this->field['std'] . '" />';
		
		echo (isset($this->field['desc']) && !empty($this->field['desc']))?' <span class="description">'.$this->field['desc'].'</span>':'';
		
		echo '</div>';
		
	}//function
	
	
	/**
	 * Enqueue Function.
	 *
	 * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
	 *
	 * @since Simple_Options 1.0.0
	*/
	function enqueue(){
		
		wp_enqueue_script(
			'simple-options-field-color-js', 
			SOF_OPTIONS_URL.'fields/color/field_color.js', 
			array('jquery', 'wp-color-picker'),
			time(),
			true
		);

		wp_enqueue_style(
			'simple-options-field-color-js', 
			SOF_OPTIONS_URL.'fields/color/field_color.css', 
			time(),
			true
		);		
		
	}//function
	
}//class
?>