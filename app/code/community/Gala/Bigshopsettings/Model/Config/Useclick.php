<?php
 
class Gala_Bigshopsettings_Model_Config_Useclick
{
	public function toOptionArray()
    {
		return array(
			array('label' => "Use Scroll", 'value' => "scroll"),
			array('label' => "Use Click", 'value' => "click"),
		);
    }
 
}
