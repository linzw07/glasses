<?php
 
class Gala_Bigshopsettings_Model_Config_Absolute
{
	public function toOptionArray()
    {
		return array(
			array('label' => "Masonry", 'value' => "masonry"),
			array('label' => "Fit Rows", 'value' => "fitRows")
		);
    }
 
}
