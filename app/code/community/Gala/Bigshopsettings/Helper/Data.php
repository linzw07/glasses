<?php
/**
 * @methods:
 * - get[Section]_[ConfigName]($defaultValue = '')
 */
class Gala_Bigshopsettings_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function __call($name, $args) {
		if (method_exists($this, $name))
			call_user_func_array(array($this, $name), $args);
			
		elseif (preg_match('/^get([^_][a-zA-Z0-9_]+)$/', $name, $m)) {
			$segs = explode('_', $m[1]);
			foreach ($segs as $i => $seg)
				$segs[$i] = strtolower(preg_replace('/([^A-Z])([A-Z])/', '$1_$2', $seg));

			$value = Mage::getStoreConfig('bigshop/'.implode('/', $segs));
			if (!$value) $value = @$args[0];
			return $value;
		}
		
		else 
			call_user_func_array(array($this, $name), $args);
	}
	
	/**
	 * @return array
	 */
	public function getAllCssConfig() {            
        $h_bg_image = Mage::getStoreConfig('bigshop/header/head_bg_file') ? 
			'url(' . Mage::getBaseUrl('media') . 'background/' . Mage::getStoreConfig('bigshop/header/head_bg_file') . ')'
			: (Mage::getStoreConfig('bigshop/header/head_bg_image') ? 'url(../images/stripes/'.Mage::getStoreConfig('bigshop/header/head_bg_image').')' : '');
		
        $bd_bg_image = Mage::getStoreConfig('bigshop/body/bd_bg_file') ? 
			'url(' . Mage::getBaseUrl('media') . 'background/' . Mage::getStoreConfig('bigshop/body/bd_bg_file') . ')'
			: (Mage::getStoreConfig('bigshop/body/bd_bg_image') ? 'url(../images/stripes/'.Mage::getStoreConfig('bigshop/body/bd_bg_image').')' : '');
            
        $f_bg_image = Mage::getStoreConfig('bigshop/footer/foot_bg_file') ? 
			'url(' . Mage::getBaseUrl('media') . 'background/' . Mage::getStoreConfig('bigshop/footer/foot_bg_file') . ')'
			: (Mage::getStoreConfig('bigshop/footer/foot_bg_image') ? 'url(../images/stripes/'.Mage::getStoreConfig('bigshop/footer/foot_bg_image').')' : '');
        
        $page_bg_image = Mage::getStoreConfig('bigshop/general/page_bg_file') ? 
			'url(' . Mage::getBaseUrl('media') . 'background/' . Mage::getStoreConfig('bigshop/general/page_bg_file') . ')'
			: (Mage::getStoreConfig('bigshop/general/page_bg_image') ? 'url(../images/stripes/'.Mage::getStoreConfig('bigshop/general/page_bg_image').')' : '');
            
		// menu font and dropdown menu font
			if(Mage::getStoreConfig('bigshop/menu/tm_font') == "")	$tm_font	=	Mage::getStoreConfig('bigshop/typography/h5_font');
			else	$tm_font	=	Mage::getStoreConfig('bigshop/menu/tm_font');
			
			if(Mage::getStoreConfig('bigshop/menu/dm_font') == "")	$dm_font	=	Mage::getStoreConfig('bigshop/typography/general_font');
			else	$dm_font	=	Mage::getStoreConfig('bigshop/menu/dm_font');

		return array(
            'general_font' => Mage::getStoreConfig('bigshop/typography/general_font'),
            'google_fonts_weights' => Mage::getStoreConfig('bigshop/typography/google_fonts_weights'),
			'h1_font' => Mage::getStoreConfig('bigshop/typography/h1_font'),
			'h2_font' => Mage::getStoreConfig('bigshop/typography/h2_font'),
			'h3_font' => Mage::getStoreConfig('bigshop/typography/h3_font'),
			'h4_font' => Mage::getStoreConfig('bigshop/typography/h4_font'),
			'h5_font' => Mage::getStoreConfig('bigshop/typography/h5_font'),
            'h6_font' => Mage::getStoreConfig('bigshop/typography/h6_font'),
            'additional_css_file' => Mage::getStoreConfig('bigshop/typography/additional_css_file'),
            'custom_css' => Mage::getStoreConfig('bigshop/typography/custom_css'),
            'page_bg_color' => Mage::getStoreConfig('bigshop/general/page_bg_color'),
            'page_bg_image' => $page_bg_image,
            'page_bg_position' => Mage::getStoreConfig('bigshop/general/page_bg_position'),
			'page_bg_repeat' => Mage::getStoreConfig('bigshop/general/page_bg_repeat'),            
            'head_text_color' => Mage::getStoreConfig('bigshop/header/head_text_color'),
			'head_text2_color' => Mage::getStoreConfig('bigshop/header/head_text2_color'),
			'head_text3_color' => Mage::getStoreConfig('bigshop/header/head_text3_color'),
			'head_text4_color' => Mage::getStoreConfig('bigshop/header/head_text4_color'),
			'head_bg_color' => Mage::getStoreConfig('bigshop/header/head_bg_color'),
            'head_bg2_color' => Mage::getStoreConfig('bigshop/header/head_bg2_color'),
            'head_bg3_color' => Mage::getStoreConfig('bigshop/header/head_bg3_color'),
            'head_bg_image' => $h_bg_image,
            'head_bg_position' => Mage::getStoreConfig('bigshop/header/head_bg_position'),
			'head_bg_repeat' => Mage::getStoreConfig('bigshop/header/head_bg_repeat'),
			'head_line_color' => Mage::getStoreConfig('bigshop/header/head_line_color'),
            'tm_bg_color' => Mage::getStoreConfig('bigshop/menu/tm_bg_color'),
            'tm_hover_bg_color' => Mage::getStoreConfig('bigshop/menu/tm_hover_bg_color'),
			'tm_text_color' => Mage::getStoreConfig('bigshop/menu/tm_text_color'),
			'tm_hover_text_color' => Mage::getStoreConfig('bigshop/menu/tm_hover_text_color'),
            'tm_line_color' => Mage::getStoreConfig('bigshop/menu/tm_line_color'),
			'tm_font' => $tm_font,
			'dm_bg_color' => Mage::getStoreConfig('bigshop/menu/dm_bg_color'),
            'dm_text_color' => Mage::getStoreConfig('bigshop/menu/dm_text_color'),
            'dm_hover_text_color' => Mage::getStoreConfig('bigshop/menu/dm_hover_text_color'),
            'dm_text2_color' => Mage::getStoreConfig('bigshop/menu/dm_text2_color'),            
            'dm_font' => $dm_font,
            'bd_bg_color' => Mage::getStoreConfig('bigshop/body/bd_bg_color'),
            'bd_bg2_color' => Mage::getStoreConfig('bigshop/body/bd_bg2_color'),
            'bd_bg3_color' => Mage::getStoreConfig('bigshop/body/bd_bg3_color'),
			'bd_bg4_color' => Mage::getStoreConfig('bigshop/body/bd_bg4_color'),
			'bd_bg5_color' => Mage::getStoreConfig('bigshop/body/bd_bg5_color'),
			'bd_bg6_color' => Mage::getStoreConfig('bigshop/body/bd_bg6_color'),
			'bd_bg7_color' => Mage::getStoreConfig('bigshop/body/bd_bg7_color'),
			'bd_bg_image' => $bd_bg_image,
            'bd_bg_position' => Mage::getStoreConfig('bigshop/body/bd_bg_position'),
			'bd_bg_repeat' => Mage::getStoreConfig('bigshop/body/bd_bg_repeat'),
			'bd_text_color' => Mage::getStoreConfig('bigshop/body/bd_text_color'),
			'bd_text2_color' => Mage::getStoreConfig('bigshop/body/bd_text2_color'),
			'bd_text3_color' => Mage::getStoreConfig('bigshop/body/bd_text3_color'),
            'bd_text4_color' => Mage::getStoreConfig('bigshop/body/bd_text4_color'),
			'bd_line_color' => Mage::getStoreConfig('bigshop/body/bd_line_color'),
            'bd_line2_color' => Mage::getStoreConfig('bigshop/body/bd_line2_color'),
			'bd_box_shadow' => Mage::getStoreConfig('bigshop/body/bd_box_shadow'),
			'bd_box2_shadow' => Mage::getStoreConfig('bigshop/body/bd_box2_shadow'),
			'bd_rounded_corner' => Mage::getStoreConfig('bigshop/body/bd_rounded_corner'),
			'bd_rounded2_corner' => Mage::getStoreConfig('bigshop/body/bd_rounded2_corner'),
            'foot_bg_color' => Mage::getStoreConfig('bigshop/footer/foot_bg_color'),            
            'foot_bg2_color' => Mage::getStoreConfig('bigshop/footer/foot_bg2_color'),            
            'foot_bg_image' => $f_bg_image,
            'foot_bg_position' => Mage::getStoreConfig('bigshop/footer/foot_bg_position'),
			'foot_bg_repeat' => Mage::getStoreConfig('bigshop/footer/foot_bg_repeat'),
			'foot_text_color' => Mage::getStoreConfig('bigshop/footer/foot_text_color'),
			'foot_text2_color' => Mage::getStoreConfig('bigshop/footer/foot_text2_color'),
            'foot_text3_color' => Mage::getStoreConfig('bigshop/footer/foot_text3_color'),
            'foot_line_color' => Mage::getStoreConfig('bigshop/footer/foot_line_color'),
            'foot_line2_color' => Mage::getStoreConfig('bigshop/footer/foot_line2_color'),
            'btn1_bg_color' => Mage::getStoreConfig('bigshop/button/btn1_bg_color'),
			'btn1_text_color' => Mage::getStoreConfig('bigshop/button/btn1_text_color'),
			'btn1_line_color' => Mage::getStoreConfig('bigshop/button/btn1_line_color'),
			'btn1_font' => Mage::getStoreConfig('bigshop/button/btn1_font'),
            'btn2_bg_color' => Mage::getStoreConfig('bigshop/button/btn2_bg_color'),
			'btn2_text_color' => Mage::getStoreConfig('bigshop/button/btn2_text_color'),
			'btn2_line_color' => Mage::getStoreConfig('bigshop/button/btn2_line_color'),
			'btn2_font' => Mage::getStoreConfig('bigshop/button/btn2_font'),            
            'btn3_bg_color' => Mage::getStoreConfig('bigshop/button/btn3_bg_color'),
			'btn3_text_color' => Mage::getStoreConfig('bigshop/button/btn3_text_color'),
			'btn3_line_color' => Mage::getStoreConfig('bigshop/button/btn3_line_color'),
			'btn3_font' => Mage::getStoreConfig('bigshop/button/btn3_font'),
            'btn4_bg_color' => Mage::getStoreConfig('bigshop/button/btn4_bg_color'),
			'btn4_text_color' => Mage::getStoreConfig('bigshop/button/btn4_text_color'),
			'btn4_line_color' => Mage::getStoreConfig('bigshop/button/btn4_line_color'),
			'btn4_font' => Mage::getStoreConfig('bigshop/button/btn4_font'),
		);
	} 
	
	public function getImageBackgroundColor() {
		$color = Mage::getStoreConfig('bigshop/general/image_bgcolor');
		if (!$color) $color = '#ffffff';
		$color = str_replace('#', '', $color);
		if (strlen ($color )==6){
			return array(
				hexdec(substr($color, 0, 2)),
				hexdec(substr($color, 2, 2)),
				hexdec(substr($color, 4, 2))
		);
		}else{
			$color = str_replace('rgba(', '', $color);	
			$color = str_replace(')', '', $color);	
			$arr = explode(",", $color);
			return array(intval($arr[0]),intval($arr[1]),intval($arr[2]));
		}
	}
	
    public function getCategoriesCustom($parent,$curId){
				
		try{
			$children = $parent->getChildrenCategories();
						
		}
		catch(Exception $e){
			return '';
		}
		return $children;
	}
	
	public function insertStaticBlock($dataBlock) {
		// insert a block to db if not exists
		$block = Mage::getModel('cms/block')->getCollection()->addFieldToFilter('identifier', $dataBlock['identifier'])->getFirstItem();
		if (!$block->getId())
			$block->setData($dataBlock)->save();
		return $block;
	}
	
	public function insertPage($dataPage) {
		$page = Mage::getModel('cms/page')->getCollection()->addFieldToFilter('identifier', $dataPage['identifier'])->getFirstItem();
		if (!$page->getId())
			$page->setData($dataPage)->save();
		return $page;
	}
    
    // For search by category
    public function getCategoriesCustomSearch($parent,$curId){
		$result = '';
		if($parent->getLevel() == 1){
            $result = "<option value='0'>".$this->getCatNameCustom($parent)."</option>";
		}			
		else{
			$result = "<option value='".$parent->getId()."' ";
			
			if($curId){
				if($curId	==	$parent->getId()) $result .= " selected='selected'";
			}
			$result .= ">".$this->getCatNameCustom($parent)."</option>";			
		}
		
		try{
			$children = $parent->getChildrenCategories();
			
			if(count($children) > 0){
				foreach($children as $cat){
					$result .= $this->getCategoriesCustomSearch($cat,$curId);
				}
			}
		}
		catch(Exception $e){
			return '';
		}
        //var_dump($result);
		return $result;
	}
	
	public function getCatNameCustom($category){
		$level = $category->getLevel();
		$html = '';
		for($i = 0;$i < $level;$i++){
			$html .= '&mdash;&ndash;';
		}
		if($level == 1)	return $html.' '.$this->__("All Categories");
		else return $html.' '.$category->getName();
	}
	
	public function checkMobilePhp() {
		require_once(Mage::getBaseDir('lib') . DS . 'em/Mobile_Detect.php');
		$detect = new Mobile_Detect();
        $checkmobile = $detect->isMobile();
        $checktablet = $detect->isTablet();
        if($checkmobile){
            if($checktablet){
                return 'false';
            }else{
                return 'true';
            }
            
        }else{
            return 'false';
        }
	}
    
    public function checkMobile() {
		require_once(Mage::getBaseDir('lib') . DS . 'em/Mobile_Detect.php');
		$detect = new Mobile_Detect();
        $checkmobile = $detect->isMobile();
        if($checkmobile){
            return 'true';            
        }else{
            return 'false';
        }
	}

    public function checkTabletPhp() {
		require_once(Mage::getBaseDir('lib') . DS . 'em/Mobile_Detect.php');
		$detect = new Mobile_Detect();
        $checktablet = $detect->isTablet();
        if($checktablet){
            return 'true';
        }else{
            return 'false';
        }
	}

    public function getActionReview(){
		$url = Mage::helper('core/url')->getCurrentUrl();
		$url_check = 'wishlist/index/configure';
		if(stripos($url,$url_check)){
			$id = Mage::registry('current_product')->getId();
			return Mage::getUrl('review/product/post/', array('id' => $id,'_secure' => true));
		} else {
			$url_check2 = 'checkout/cart/configure';
			if(stripos($url,$url_check2)){
				$id = Mage::getSingleton('catalog/session')->getLastViewedProductId();
				return Mage::getUrl('review/product/post/', array('id' => $id,'_secure' => true));
			}else{
				$productId = Mage::app()->getRequest()->getParam('id', false);
				return Mage::getUrl('review/product/post', array('id' => $productId,'_secure' => true));
			}
		}
	}
}
