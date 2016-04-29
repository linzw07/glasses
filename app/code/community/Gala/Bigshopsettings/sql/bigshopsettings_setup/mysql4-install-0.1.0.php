<?php

$installer = $this;
$pathFile = Mage::getBaseDir('var').DS.'install_bigshop.txt';
if(file_exists($pathFile)){
    echo 'Installing Gala BigShop theme, please come back in some minutes ...';
    exit;
}
file_put_contents($pathFile,'Installing Gala BigShop theme');
$installer->startSetup();

$helper = Mage::helper('bigshopsettings');
$block = Mage::getModel('cms/block');
$stores = array(0);
$prefixBlock = 'galabigshop_';

$widgetInstance = Mage::getModel('widget/widget_instance');
$package_theme  = 'default/galabigshop';

function galabigshop_install_fix_widget_block_id(&$widget, $block_id) {
	$params = unserialize($widget['widget_parameters']);
	$params['block_id'] = $block_id;
	$widget['widget_parameters'] = serialize($params);
}

####################################################################################################
# ADD THEMEFRAMEWORK LAYOUT
####################################################################################################

$model = Mage::getModel('themeframework/area');
	
$data = array(
	'package_theme'  => 'default/galabigshop',
	'layout'         => '1column',	
	'is_active'      => 1,
	'content_decode' => unserialize(<<<EOB
a:8:{i:0;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:45:"<div class="wrapper_header">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:6:"header";}}i:1;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:47:"<div class="wrapper_menu_hoz">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:9:"em-area05";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:8:"em_area5";}}i:1;s:5:"clear";}}i:2;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:46:"<div class="wrapper_content">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:9:"em-area01";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:8:"em_area1";}}i:1;s:5:"clear";}}i:3;a:6:{s:10:"custom_css";s:16:"wrapper_area0203";s:10:"inner_html";s:105:"<div class="container_24"><div class="inner_slideshow"><div class="grid_24">{{content}}</div></div></div>";s:10:"outer_html";s:46:"<div class="wrapper_content">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:2:{i:0;s:8:"em_area2";i:1;s:8:"em_area3";}}i:4;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:46:"<div class="wrapper_content">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:3:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"em-breadcrumbs";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:11:"breadcrumbs";}}i:1;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:15:"em-main-wrapper";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:4:{i:0;s:15:"global_messages";i:1;s:8:"em_area6";i:2;s:7:"content";i:3;s:8:"em_area7";}}i:2;s:5:"clear";}}i:5;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:82:"<div class="wrapper_top_footer"> <div class="footer_inner">{{content}}</div></div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:9:"em-area04";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:8:"em_area4";}}i:1;s:5:"clear";}}i:6;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:45:"<div class="wrapper_footer">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:9:"em-footer";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"footer";}}i:1;s:5:"clear";}}i:7;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:42:"<div class="wrapper_end">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:15:"before_body_end";}}}
EOB
	)
);
$model->setData($data)->setStores(array(0))->save();

$data = array(
	'package_theme'  => 'default/galabigshop',
	'layout'         => '2columns-left',	
	'is_active'      => 1,
	'content_decode' => unserialize(<<<EOB
a:8:{i:0;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:45:"<div class="wrapper_header">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:6:"header";}}i:1;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:47:"<div class="wrapper_menu_hoz">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:9:"em-area05";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:8:"em_area5";}}i:1;s:5:"clear";}}i:2;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:46:"<div class="wrapper_content">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:9:"em-area01";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:8:"em_area1";}}i:1;s:5:"clear";}}i:3;a:6:{s:10:"custom_css";s:16:"wrapper_area0203";s:10:"inner_html";s:105:"<div class="container_24"><div class="inner_slideshow"><div class="grid_24">{{content}}</div></div></div>";s:10:"outer_html";s:46:"<div class="wrapper_content">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:2:{i:0;s:8:"em_area2";i:1;s:8:"em_area3";}}i:4;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:46:"<div class="wrapper_content">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:5:{i:0;s:5:"clear";i:1;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"em-breadcrumbs";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:11:"breadcrumbs";}}i:2;a:11:{s:6:"column";s:2:"18";s:4:"push";s:1:"6";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:15:"em-main-wrapper";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:4:{i:0;s:15:"global_messages";i:1;s:8:"em_area6";i:2;s:7:"content";i:3;s:8:"em_area7";}}i:3;a:11:{s:6:"column";s:1:"6";s:4:"push";s:0:"";s:4:"pull";s:2:"18";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:22:"em-col-left em-sidebar";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:4:{i:0;s:8:"em_area8";i:1;s:4:"left";i:2;s:8:"em_area9";i:3;s:9:"em_area12";}}i:4;s:5:"clear";}}i:5;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:82:"<div class="wrapper_top_footer"> <div class="footer_inner">{{content}}</div></div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:9:"em-area04";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:8:"em_area4";}}i:1;s:5:"clear";}}i:6;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:45:"<div class="wrapper_footer">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:9:"em-footer";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"footer";}}i:1;s:5:"clear";}}i:7;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:42:"<div class="wrapper_end">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:15:"before_body_end";}}}
EOB
	)
);
$model->setData($data)->setStores(array(0))->save();

$data = array(
	'package_theme'  => 'default/galabigshop',
	'layout'         => '2columns-right',	
	'is_active'      => 1,
	'content_decode' => unserialize(<<<EOB
a:8:{i:0;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:45:"<div class="wrapper_header">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:6:"header";}}i:1;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:47:"<div class="wrapper_menu_hoz">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:9:"em-area05";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:8:"em_area5";}}i:1;s:5:"clear";}}i:2;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:46:"<div class="wrapper_content">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:9:"em-area01";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:8:"em_area1";}}i:1;s:5:"clear";}}i:3;a:6:{s:10:"custom_css";s:16:"wrapper_area0203";s:10:"inner_html";s:105:"<div class="container_24"><div class="inner_slideshow"><div class="grid_24">{{content}}</div></div></div>";s:10:"outer_html";s:46:"<div class="wrapper_content">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:2:{i:0;s:8:"em_area2";i:1;s:8:"em_area3";}}i:4;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:46:"<div class="wrapper_content">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:5:{i:0;s:5:"clear";i:1;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"em-breadcrumbs";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:11:"breadcrumbs";}}i:2;a:11:{s:6:"column";s:2:"18";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:15:"em-main-wrapper";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:4:{i:0;s:15:"global_messages";i:1;s:8:"em_area6";i:2;s:7:"content";i:3;s:8:"em_area7";}}i:3;a:11:{s:6:"column";s:1:"6";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:23:"em-col-right em-sidebar";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:4:{i:0;s:9:"em_area10";i:1;s:5:"right";i:2;s:9:"em_area11";i:3;s:9:"em_area13";}}i:4;s:5:"clear";}}i:5;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:82:"<div class="wrapper_top_footer"> <div class="footer_inner">{{content}}</div></div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:9:"em-area04";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:8:"em_area4";}}i:1;s:5:"clear";}}i:6;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:45:"<div class="wrapper_footer">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:9:"em-footer";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"footer";}}i:1;s:5:"clear";}}i:7;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:42:"<div class="wrapper_end">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:15:"before_body_end";}}}
EOB
	)
);
$model->setData($data)->setStores(array(0))->save();

$data = array(
	'package_theme'  => 'default/galabigshop',
	'layout'         => '3columns',	
	'is_active'      => 1,
	'content_decode' => unserialize(<<<EOB
a:8:{i:0;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:45:"<div class="wrapper_header">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:6:"header";}}i:1;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:47:"<div class="wrapper_menu_hoz">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:9:"em-area05";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:8:"em_area5";}}i:1;s:5:"clear";}}i:2;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:46:"<div class="wrapper_content">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:9:"em-area01";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:8:"em_area1";}}i:1;s:5:"clear";}}i:3;a:6:{s:10:"custom_css";s:16:"wrapper_area0203";s:10:"inner_html";s:105:"<div class="container_24"><div class="inner_slideshow"><div class="grid_24">{{content}}</div></div></div>";s:10:"outer_html";s:46:"<div class="wrapper_content">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:2:{i:0;s:8:"em_area2";i:1;s:8:"em_area3";}}i:4;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:46:"<div class="wrapper_content">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:6:{i:0;s:5:"clear";i:1;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:14:"em-breadcrumbs";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:11:"breadcrumbs";}}i:2;a:11:{s:6:"column";s:2:"12";s:4:"push";s:1:"6";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:15:"em-main-wrapper";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:4:{i:0;s:15:"global_messages";i:1;s:8:"em_area6";i:2;s:7:"content";i:3;s:8:"em_area7";}}i:3;a:11:{s:6:"column";s:1:"6";s:4:"push";s:0:"";s:4:"pull";s:2:"12";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:22:"em-col-left em-sidebar";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:4:{i:0;s:8:"em_area8";i:1;s:4:"left";i:2;s:8:"em_area9";i:3;s:9:"em_area12";}}i:4;a:11:{s:6:"column";s:1:"6";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:23:"em-col-right em-sidebar";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:4:{i:0;s:9:"em_area10";i:1;s:5:"right";i:2;s:9:"em_area11";i:3;s:9:"em_area13";}}i:5;s:5:"clear";}}i:5;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:82:"<div class="wrapper_top_footer"> <div class="footer_inner">{{content}}</div></div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:9:"em-area04";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:8:"em_area4";}}i:1;s:5:"clear";}}i:6;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:45:"<div class="wrapper_footer">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:12:"container_24";s:5:"items";a:2:{i:0;a:11:{s:6:"column";s:2:"24";s:4:"push";s:0:"";s:4:"pull";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";s:5:"first";b:0;s:4:"last";b:0;s:10:"custom_css";s:9:"em-footer";s:10:"inner_html";s:0:"";s:13:"display_empty";b:0;s:5:"items";a:1:{i:0;s:6:"footer";}}i:1;s:5:"clear";}}i:7;a:6:{s:10:"custom_css";s:0:"";s:10:"inner_html";s:0:"";s:10:"outer_html";s:42:"<div class="wrapper_end">{{content}}</div>";s:13:"display_empty";b:0;s:4:"type";s:14:"container_free";s:5:"items";a:1:{i:0;s:15:"before_body_end";}}}
EOB
	)
);
$model->setData($data)->setStores(array(0))->save();

####################################################################################################
# ADD MEGAMENU PRO
####################################################################################################

$installer->run("

CREATE TABLE IF NOT EXISTS {$this->getTable('megamenupro')} (
  `megamenupro_id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(150) NOT NULL default '',
  `identifier` varchar(255) NOT NULL default '',
  `description` text NOT NULL default '',
  `type` smallint(6) NOT NULL default '0',
  `content` longtext NOT NULL default '',
  `css_class` varchar(255) NULL,
  `status` smallint(6) NOT NULL default '0',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`megamenupro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

# create menu of theme Gala Mrhandsome Horizontal
$model = Mage::getModel('bigshopsettings/megamenupro');
$model->setData(array(
	'name' => "GalaBigShop Vertical Menu",
	'type' => "1",
	'content' => <<<EOB
a:72:{i:0;a:8:{s:4:"type";s:4:"link";s:5:"label";s:7:"Fashion";s:8:"sublabel";s:0:"";s:3:"url";s:37:"{{store direct_url=''}}furniture.html";s:6:"target";s:0:"";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"0";}i:1;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:7:"fix-top";s:13:"container_css";s:0:"";s:5:"depth";s:1:"1";}i:2;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:6:"grid_8";s:13:"container_css";s:0:"";s:5:"depth";s:1:"2";}i:3;a:5:{s:4:"type";s:4:"text";s:4:"text";s:36:"PHAgY2xhc3M9Img0Ij5GYXNoaW9uPC9wPg==";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:4;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:6:"grid_8";s:13:"container_css";s:0:"";s:5:"depth";s:1:"2";}i:5;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:12:"grid_4 alpha";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:6;a:5:{s:4:"type";s:4:"text";s:4:"text";s:140:"PGg1PkxvcmVtIElwc3VtPC9oNT4KPGRpdj57e3dpZGdldCB0eXBlPSJtZWdhbWVudXByby9jYXRhbG9nbmF2aWdhdGlvbiIgY2F0ZWdvcnlfaWQ9ImNhdGVnb3J5LzEyIn19PC9kaXY+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:7;a:5:{s:4:"type";s:4:"text";s:4:"text";s:160:"PGg1IGNsYXNzPSJici10b3AiPkxvcmVtIElwc3VtPC9oNT4KPGRpdj57e3dpZGdldCB0eXBlPSJtZWdhbWVudXByby9jYXRhbG9nbmF2aWdhdGlvbiIgY2F0ZWdvcnlfaWQ9ImNhdGVnb3J5LzE1In19PC9kaXY+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:8;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:12:"grid_4 omega";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:9;a:5:{s:4:"type";s:4:"text";s:4:"text";s:144:"PGg1PkxvcmVtIElwc3VtPC9oNT4KPGRpdj57e3dpZGdldCB0eXBlPSJtZWdhbWVudXByby9jYXRhbG9nbmF2aWdhdGlvbiIgY2F0ZWdvcnlfaWQ9ImNhdGVnb3J5LzEwIn19PC9kaXY+Cg==";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:10;a:5:{s:4:"type";s:4:"text";s:4:"text";s:160:"PGg1IGNsYXNzPSJici10b3AiPkxvcmVtIElwc3VtPC9oNT4KPGRpdj57e3dpZGdldCB0eXBlPSJtZWdhbWVudXByby9jYXRhbG9nbmF2aWdhdGlvbiIgY2F0ZWdvcnlfaWQ9ImNhdGVnb3J5LzE1In19PC9kaXY+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:11;a:8:{s:4:"type";s:4:"link";s:5:"label";s:18:"Park & Accessories";s:8:"sublabel";s:0:"";s:3:"url";s:39:"{{store direct_url=''}}electronics.html";s:6:"target";s:0:"";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"0";}i:12;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:7:"fix-top";s:13:"container_css";s:0:"";s:5:"depth";s:1:"1";}i:13;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:7:"grid_18";s:13:"container_css";s:0:"";s:5:"depth";s:1:"2";}i:14;a:5:{s:4:"type";s:4:"text";s:4:"text";s:160:"PHAgY2xhc3M9Img0Ij5QYXJrICYgQWNjZXNzb3JpZXM8L3A+CjxwIGNsYXNzPSJjb2wtdGl0bGUiPi8vIFRoaXMgaXMgYW4gZXhhbXBsZSBvZiBhIGxhcmdlIGNvbnRhaW5lciB3aXRoIDYgY29sbHVtbnM8L3A+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:15;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:7:"grid_18";s:13:"container_css";s:0:"";s:5:"depth";s:1:"2";}i:16;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:12:"grid_3 alpha";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:17;a:5:{s:4:"type";s:4:"text";s:4:"text";s:140:"PGg1PkxvcmVtIElwc3VtPC9oNT4KPGRpdj57e3dpZGdldCB0eXBlPSJtZWdhbWVudXByby9jYXRhbG9nbmF2aWdhdGlvbiIgY2F0ZWdvcnlfaWQ9ImNhdGVnb3J5LzEyIn19PC9kaXY+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:18;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:6:"grid_3";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:19;a:5:{s:4:"type";s:4:"text";s:4:"text";s:140:"PGg1PkxvcmVtIElwc3VtPC9oNT4KPGRpdj57e3dpZGdldCB0eXBlPSJtZWdhbWVudXByby9jYXRhbG9nbmF2aWdhdGlvbiIgY2F0ZWdvcnlfaWQ9ImNhdGVnb3J5LzEyIn19PC9kaXY+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:20;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:6:"grid_3";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:21;a:5:{s:4:"type";s:4:"text";s:4:"text";s:140:"PGg1PkxvcmVtIElwc3VtPC9oNT4KPGRpdj57e3dpZGdldCB0eXBlPSJtZWdhbWVudXByby9jYXRhbG9nbmF2aWdhdGlvbiIgY2F0ZWdvcnlfaWQ9ImNhdGVnb3J5LzEyIn19PC9kaXY+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:22;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:6:"grid_3";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:23;a:5:{s:4:"type";s:4:"text";s:4:"text";s:140:"PGg1PkxvcmVtIElwc3VtPC9oNT4KPGRpdj57e3dpZGdldCB0eXBlPSJtZWdhbWVudXByby9jYXRhbG9nbmF2aWdhdGlvbiIgY2F0ZWdvcnlfaWQ9ImNhdGVnb3J5LzEyIn19PC9kaXY+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:24;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:6:"grid_3";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:25;a:5:{s:4:"type";s:4:"text";s:4:"text";s:140:"PGg1PkxvcmVtIElwc3VtPC9oNT4KPGRpdj57e3dpZGdldCB0eXBlPSJtZWdhbWVudXByby9jYXRhbG9nbmF2aWdhdGlvbiIgY2F0ZWdvcnlfaWQ9ImNhdGVnb3J5LzEyIn19PC9kaXY+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:26;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:12:"grid_3 omega";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:27;a:5:{s:4:"type";s:4:"text";s:4:"text";s:140:"PGg1PkxvcmVtIElwc3VtPC9oNT4KPGRpdj57e3dpZGdldCB0eXBlPSJtZWdhbWVudXByby9jYXRhbG9nbmF2aWdhdGlvbiIgY2F0ZWdvcnlfaWQ9ImNhdGVnb3J5LzEyIn19PC9kaXY+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:28;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:7:"grid_18";s:13:"container_css";s:0:"";s:5:"depth";s:1:"2";}i:29;a:5:{s:4:"type";s:4:"text";s:4:"text";s:88:"PHAgY2xhc3M9ImNvbC10aXRsZSI+Ly8gSGVyZSBpcyBzb21lIGNvbnRlbnRzIHdpdGggc2lkZSBpbWFnZTwvcD4=";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:30;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:7:"grid_18";s:13:"container_css";s:0:"";s:5:"depth";s:1:"2";}i:31;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:12:"grid_6 alpha";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:32;a:5:{s:4:"type";s:4:"text";s:4:"text";s:140:"PHA+PGEgY2xhc3M9ImltZyIgaHJlZj0iIyI+PGltZyBjbGFzcz0iZmx1aWQiIHNyYz0ie3ttZWRpYSB1cmw9Ind5c2l3eWcvbWVudTQuanBnIn19IiBhbHQ9IiIgLz48L2E+PC9wPg==";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:33;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:13:"grid_12 omega";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:34;a:5:{s:4:"type";s:4:"text";s:4:"text";s:812:"PHA+U2VkIHV0IHBlcnNwaWNpYXRpcyB1bmRlIG9tbmlzIGlzdGUgbmF0dXMgZXJyb3Igc2l0IHZvbHVwdGF0ZW0gc2FuZG9sb3JlbXF1ZS4gTGF1ZGFudGl1bSwgdG90YW0gcmVtIGFwZXJpYW0sIGVhcXVlIGlwc2EgcXVhZSBhYiBpbGxvIGludmVudG9yZSB2ZXJpdGF0aXMgZXQgcXVhc2kgYXJjaGl0ZWN0byBiZWF0YWUgdml0YWUgZGljdGEgc3VudCBleHBsaWNhYm8uIDwvcD4KPHA+TmVtbyBlbmltIGlwc2FtIHZvbHVwdGF0ZW0gcXVpYSB2b2x1cHRhcyBzaXQgYXNwZXJuYXR1ciBhdXQgb2RpdCBhdXQgZnVnaXQsIHNlZCBxdWlhLiBTZWQgdXQgcGVyc3BpY2lhdGlzIHVuZGUgb21uaXMgaXN0ZSBuYXR1cyBlcnJvciBzaXQgb2x1cHRhdGVtIHNhbmRvbG9yZW1xdWUuIExhdWRhbnRpdW0sIHRvdGFtIHJlbSBhcGVyaWFtLCBlYXF1ZSBpcHNhIHF1YWUgYWIgaWxsbyBpbnZlbnRvcmUgdmVyaXRhdGlzIGV0IHF1YXNpIGFyY2hpdGVjdG8gYmVhdGFlIHZpdGFlIGRpY3RhIHN1bnQgZXhwbGljYWJvLiA8L3A+CjxwPk5lbW8gZW5pbSBpcHNhbSB2b2x1cHRhdGVtIHF1aWEgdm9sdXB0YXMgc2l0IGFzcGVybmF0dXIgYXV0IG9kaXQgYXV0IGZ1Z2l0LCBzZWQgcXVpYS48L3A+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:35;a:8:{s:4:"type";s:4:"link";s:5:"label";s:11:"Electronics";s:8:"sublabel";s:0:"";s:3:"url";s:35:"{{store direct_url=''}}apparel.html";s:6:"target";s:0:"";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"0";}i:36;a:5:{s:4:"type";s:4:"text";s:4:"text";s:112:"PGRpdj57e3dpZGdldCB0eXBlPSJtZWdhbWVudXByby9jYXRhbG9nbmF2aWdhdGlvbiIgY2F0ZWdvcnlfaWQ9ImNhdGVnb3J5LzMifX08L2Rpdj4=";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"1";}i:37;a:8:{s:4:"type";s:4:"link";s:5:"label";s:18:"Collectibles & Art";s:8:"sublabel";s:0:"";s:3:"url";s:37:"{{store direct_url=''}}furniture.html";s:6:"target";s:0:"";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"0";}i:38;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:7:"fix-top";s:13:"container_css";s:0:"";s:5:"depth";s:1:"1";}i:39;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:7:"grid_18";s:13:"container_css";s:0:"";s:5:"depth";s:1:"2";}i:40;a:5:{s:4:"type";s:4:"text";s:4:"text";s:48:"PHAgY2xhc3M9Img0Ij5Db2xsZWN0aWJsZXMgJiBBcnQ8L3A+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:41;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:7:"grid_18";s:13:"container_css";s:0:"";s:5:"depth";s:1:"2";}i:42;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:12:"grid_6 alpha";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:43;a:5:{s:4:"type";s:4:"text";s:4:"text";s:444:"PHA+PGEgY2xhc3M9ImltZyIgaHJlZj0iIyI+PGltZyBjbGFzcz0iZmx1aWQiIHNyYz0ie3ttZWRpYSB1cmw9Ind5c2l3eWcvbWVudTMuanBnIn19IiBhbHQ9IiIgLz48L2E+PC9wPgo8cD5MYXVkYW50aXVtLCB0b3RhbSByZW0gYXBlcmlhbSwgZWFxdWUgaXBzYSBxdWFlIGFiIGlsbG8gaW52ZW50b3JlIHZlcml0YXRpcyBldCBxdWFzaSBhcmNoaXRlY3RvIGJlYXRhZSB2aXRhZSBkaWN0YSBzdW50IGV4cGxpY2Fiby48L3A+CjxwPk5lbW8gZW5pbSBpcHNhbSB2b2x1cHRhdGVtIHF1aWEgdm9sdXB0YXMgc2l0IGFzcGVybmF0dXIgYXV0IG9kaXQgYXV0IGZ1Z2l0LCBzZWQgcXVpYS48L3A+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:44;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:6:"grid_3";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:45;a:5:{s:4:"type";s:4:"text";s:4:"text";s:140:"PGg1PkxvcmVtIElwc3VtPC9oNT4KPGRpdj57e3dpZGdldCB0eXBlPSJtZWdhbWVudXByby9jYXRhbG9nbmF2aWdhdGlvbiIgY2F0ZWdvcnlfaWQ9ImNhdGVnb3J5LzE1In19PC9kaXY+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:46;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:6:"grid_3";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:47;a:5:{s:4:"type";s:4:"text";s:4:"text";s:140:"PGg1PkxvcmVtIElwc3VtPC9oNT4KPGRpdj57e3dpZGdldCB0eXBlPSJtZWdhbWVudXByby9jYXRhbG9nbmF2aWdhdGlvbiIgY2F0ZWdvcnlfaWQ9ImNhdGVnb3J5LzE1In19PC9kaXY+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:48;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:12:"grid_6 omega";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:49;a:5:{s:4:"type";s:4:"text";s:4:"text";s:372:"PGEgY2xhc3M9ImltZyIgaHJlZj0iaHR0cDovL3d3dy55b3V0dWJlLmNvbS9lbWJlZC9GRXFYV3dQRnVzSSIgb25jbGljaz0idGFyZ2V0PSdfYmxhbmsnIj4KPGltZyBjbGFzcz0iZmx1aWQiIHNyYz0ie3tza2luIHVybD0naW1hZ2VzL21lZGlhL2RlbW8vbWVudV92aWRlby5wbmcnfX0iIGFsdD0iIiAvPgo8L2E+CjxwPk5lbW8gZW5pbSBpcHNhbSB2b2x1cHRhdGVtIHF1aWEgdm9sdXB0YXMgc2l0IGFzcGVybmF0dXIgYXV0IGRvbG9yZW0Kb2RpdCBhdXQgZnVnaXQsIHNlZCBxdWlhLjwvcD4=";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:50;a:8:{s:4:"type";s:4:"link";s:5:"label";s:13:"Home & Garden";s:8:"sublabel";s:0:"";s:3:"url";s:39:"{{store direct_url=''}}electronics.html";s:6:"target";s:0:"";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"0";}i:51;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:7:"fix-top";s:13:"container_css";s:0:"";s:5:"depth";s:1:"1";}i:52;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:7:"grid_18";s:13:"container_css";s:0:"";s:5:"depth";s:1:"2";}i:53;a:5:{s:4:"type";s:4:"text";s:4:"text";s:44:"PHAgY2xhc3M9Img0Ij5Ib21lICYgR2FyZGVuPC9wPg==";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:54;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:7:"grid_18";s:13:"container_css";s:0:"";s:5:"depth";s:1:"2";}i:55;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:12:"grid_6 alpha";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:56;a:5:{s:4:"type";s:4:"text";s:4:"text";s:444:"PHA+PGEgY2xhc3M9ImltZyIgaHJlZj0iIyI+PGltZyBjbGFzcz0iZmx1aWQiIHNyYz0ie3ttZWRpYSB1cmw9Ind5c2l3eWcvbWVudTMuanBnIn19IiBhbHQ9IiIgLz48L2E+PC9wPgo8cD5MYXVkYW50aXVtLCB0b3RhbSByZW0gYXBlcmlhbSwgZWFxdWUgaXBzYSBxdWFlIGFiIGlsbG8gaW52ZW50b3JlIHZlcml0YXRpcyBldCBxdWFzaSBhcmNoaXRlY3RvIGJlYXRhZSB2aXRhZSBkaWN0YSBzdW50IGV4cGxpY2Fiby48L3A+CjxwPk5lbW8gZW5pbSBpcHNhbSB2b2x1cHRhdGVtIHF1aWEgdm9sdXB0YXMgc2l0IGFzcGVybmF0dXIgYXV0IG9kaXQgYXV0IGZ1Z2l0LCBzZWQgcXVpYS48L3A+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:57;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:6:"grid_3";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:58;a:5:{s:4:"type";s:4:"text";s:4:"text";s:140:"PGg1PkxvcmVtIElwc3VtPC9oNT4KPGRpdj57e3dpZGdldCB0eXBlPSJtZWdhbWVudXByby9jYXRhbG9nbmF2aWdhdGlvbiIgY2F0ZWdvcnlfaWQ9ImNhdGVnb3J5LzE1In19PC9kaXY+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:59;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:6:"grid_3";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:60;a:5:{s:4:"type";s:4:"text";s:4:"text";s:140:"PGg1PkxvcmVtIElwc3VtPC9oNT4KPGRpdj57e3dpZGdldCB0eXBlPSJtZWdhbWVudXByby9jYXRhbG9nbmF2aWdhdGlvbiIgY2F0ZWdvcnlfaWQ9ImNhdGVnb3J5LzE1In19PC9kaXY+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:61;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:6:"grid_3";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:62;a:5:{s:4:"type";s:4:"text";s:4:"text";s:140:"PGg1PkxvcmVtIElwc3VtPC9oNT4KPGRpdj57e3dpZGdldCB0eXBlPSJtZWdhbWVudXByby9jYXRhbG9nbmF2aWdhdGlvbiIgY2F0ZWdvcnlfaWQ9ImNhdGVnb3J5LzE1In19PC9kaXY+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:63;a:7:{s:4:"type";s:4:"vbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:12:"grid_3 omega";s:13:"container_css";s:0:"";s:5:"depth";s:1:"3";}i:64;a:5:{s:4:"type";s:4:"text";s:4:"text";s:552:"PGRpdiBjbGFzcz0ibm9fcXVpY2tzaG9wIj57e3dpZGdldCB0eXBlPSJuZXdwcm9kdWN0cy9saXN0IiBuZXdfY2F0ZWdvcnk9IjMiIGxpbWl0X2NvdW50PSIxIiBvcmRlcl9ieT0ibmFtZSBhc2MiIGZyb250ZW5kX3RpdGxlPSJOZXcgQXJyaXZhbCIgdGh1bWJuYWlsX3dpZHRoPSIxNjAiIHRodW1ibmFpbF9oZWlnaHQ9IjE2MCIgc2hvd19wcm9kdWN0X25hbWU9InRydWUiIHNob3dfdGh1bWJuYWlsPSJ0cnVlIiBzaG93X2Rlc2NyaXB0aW9uPSJmYWxzZSIgc2hvd19wcmljZT0idHJ1ZSIgc2hvd19yZXZpZXdzPSJ0cnVlIiBzaG93X2FkZHRvY2FydD0iZmFsc2UiIHNob3dfYWRkdG89ImZhbHNlIiBzaG93X2xhYmVsPSJ0cnVlIiBjaG9vc2VfdGVtcGxhdGU9ImVtX25ld19wcm9kdWN0cy9uZXdfZ3JpZC5waHRtbCJ9fTwvZGl2Pg==";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"4";}i:65;a:8:{s:4:"type";s:4:"link";s:5:"label";s:16:"Women's Clothing";s:8:"sublabel";s:0:"";s:3:"url";s:35:"{{store direct_url=''}}apparel.html";s:6:"target";s:0:"";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"0";}i:66;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:7:"grid_18";s:13:"container_css";s:0:"";s:5:"depth";s:1:"1";}i:67;a:5:{s:4:"type";s:4:"text";s:4:"text";s:760:"PHAgY2xhc3M9Img0Ij5Xb21lbidzIENsb3RoaW5nPC9wPgo8cCBjbGFzcz0ibGlzdC1pbWciPjxhIGhyZWY9IiMiPjxpbWcgc3JjPSJ7e21lZGlhIHVybD0id3lzaXd5Zy9pX2xvZ28ucG5nIn19IiBhbHQ9IiIgLz48L2E+PGEgaHJlZj0iIyI+PGltZyBzcmM9Int7bWVkaWEgdXJsPSJ3eXNpd3lnL2lfbG9nby5wbmcifX0iIGFsdD0iIiAvPjwvYT48YSBocmVmPSIjIj48aW1nIHNyYz0ie3ttZWRpYSB1cmw9Ind5c2l3eWcvaV9sb2dvLnBuZyJ9fSIgYWx0PSIiIC8+PC9hPjxhIGhyZWY9IiMiPjxpbWcgc3JjPSJ7e21lZGlhIHVybD0id3lzaXd5Zy9pX2xvZ28ucG5nIn19IiBhbHQ9IiIgLz48L2E+PGEgaHJlZj0iIyI+PGltZyBzcmM9Int7bWVkaWEgdXJsPSJ3eXNpd3lnL2lfbG9nby5wbmcifX0iIGFsdD0iIiAvPjwvYT48YSBocmVmPSIjIj48aW1nIHNyYz0ie3ttZWRpYSB1cmw9Ind5c2l3eWcvaV9sb2dvLnBuZyJ9fSIgYWx0PSIiIC8+PC9hPjxhIGNsYXNzPSJsYXN0IiBocmVmPSIjIj48aW1nIHNyYz0ie3ttZWRpYSB1cmw9Ind5c2l3eWcvaV9sb2dvLnBuZyJ9fSIgYWx0PSIiIC8+PC9hPjwvcD4=";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"2";}i:68;a:8:{s:4:"type";s:4:"link";s:5:"label";s:4:"Blog";s:8:"sublabel";s:0:"";s:3:"url";s:27:"{{store direct_url=''}}blog";s:6:"target";s:0:"";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"0";}i:69;a:8:{s:4:"type";s:4:"link";s:5:"label";s:11:"Daily Deals";s:8:"sublabel";s:0:"";s:3:"url";s:35:"{{store direct_url=''}}apparel.html";s:6:"target";s:0:"";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"0";}i:70;a:7:{s:4:"type";s:4:"hbox";s:5:"width";s:0:"";s:6:"height";s:0:"";s:7:"spacing";s:0:"";s:9:"css_class";s:6:"grid_4";s:13:"container_css";s:0:"";s:5:"depth";s:1:"1";}i:71;a:5:{s:4:"type";s:4:"text";s:4:"text";s:152:"PHAgY2xhc3M9Img0Ij5EYWlseSBEZWFsczwvcD4KPGRpdj57e3dpZGdldCB0eXBlPSJtZWdhbWVudXByby9jYXRhbG9nbmF2aWdhdGlvbiIgY2F0ZWdvcnlfaWQ9ImNhdGVnb3J5LzE1In19PC9kaXY+";s:9:"css_class";s:0:"";s:13:"container_css";s:0:"";s:5:"depth";s:1:"2";}}
EOB
	,
	'status' => "1"
))->setCreatedTime(now())->setUpdateTime(now())->save();
$menu_id = $model->getId();

/* Block Menu */
$dataBlock = array(
	'title' => 'GalaBigShop Area02 Main Menu',
	'identifier' => $prefixBlock.'area02_main_menu',
	'stores' => $stores,
	'is_active' => 1,
	'content'	=> <<<EOB
<div class="menu-title">Top Categories</div>
<div class="menu-content">{{widget type="megamenupro/megamenupro" menu="$menu_id"}}</div>
EOB
);
$block = $helper->insertStaticBlock($dataBlock);
$block_id['area02_main_menu'] = $block->getId();

// Widget Menu */
// 1.GalaBigShop Area02 Main Menu
$widget = array(
	'type' => 'cmswidget/widget_block',
	'title' => 'GalaBigShop Area02 Main Menu',
	'store_ids' => $stores,
	'sort_order' => 0,
	'widget_parameters'	=> <<<EOB
a:5:{s:8:"block_id";s:1:"7";s:12:"custom_class";s:4:"menu";s:25:"custom_html_wrapper_class";s:0:"";s:22:"custom_html_wrapper_id";s:0:"";s:11:"block_title";s:0:"";}
EOB
	,
	'page_groups'=>	unserialize(<<<EOB
a:1:{i:0;a:2:{s:10:"page_group";s:5:"pages";s:5:"pages";a:6:{s:7:"page_id";s:1:"2";s:5:"group";s:5:"pages";s:5:"block";s:8:"em_area2";s:9:"for_value";s:3:"all";s:13:"layout_handle";s:15:"cms_index_index";s:8:"template";s:0:"";}}}
EOB
	)
);
galabigshop_install_fix_widget_block_id($widget, $block_id['area02_main_menu']);
$widgetInstance->setData($widget)->setType('cmswidget/widget_block')->setPackageTheme($package_theme)->save();

####################################################################################################
# ADD EM Slideshow2
####################################################################################################

/**
 * Create table 'slideshow2/slider'
 */

if(!$installer->tableExists($installer->getTable('slideshow2/slider'))){
$table = $installer->getConnection()
    ->newTable($installer->getTable('slideshow2/slider'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Slideshow ID')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
        ), 'Slideshow name')
	->addColumn('identifier', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        ), 'Identifier')
	->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'description')
	->addColumn('images', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'images')
	->addColumn('slider_type', Varien_Db_Ddl_Table::TYPE_VARCHAR, 20, array(
        ), 'Slideshow type')
	->addColumn('slider_params', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'Slideshow params')
	->addColumn('delay', Varien_Db_Ddl_Table::TYPE_VARCHAR, 10, array(
        ), 'Slideshow delay')
	->addColumn('touch', Varien_Db_Ddl_Table::TYPE_VARCHAR, 30, array(
        ), 'Slideshow touch')
	->addColumn('stop_hover', Varien_Db_Ddl_Table::TYPE_VARCHAR, 30, array(
        ), 'Slideshow stop hover')
	->addColumn('shuffle_mode', Varien_Db_Ddl_Table::TYPE_VARCHAR, 30, array(
        ), 'Slideshow shuffle mode')
	->addColumn('stop_slider', Varien_Db_Ddl_Table::TYPE_VARCHAR, 30, array(
        ), 'Slideshow stop slider')
	->addColumn('stop_after_loop', Varien_Db_Ddl_Table::TYPE_VARCHAR, 30, array(
        ), 'Slideshow stop after loop')
	->addColumn('stop_at_slide', Varien_Db_Ddl_Table::TYPE_VARCHAR, 30, array(
        ), 'Slideshow stop at slide')
	->addColumn('position', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'position')
	->addColumn('appearance', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'appearance')
	->addColumn('navigation', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'navigation')
	->addColumn('thumbnail', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'thumbnail')
	->addColumn('visibility', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'visibility')
	->addColumn('trouble', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'trouble')
    ->addColumn('creation_time', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        ), 'Slideshow Creation Time')
    ->addColumn('update_time', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        ), 'Slideshow Modification Time')
    ->addColumn('status', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'nullable'  => false,
        'default'   => '0',
        ), 'Is Slideshow Active')
    ->setComment('EM Slideshow2 Slider Table');
$installer->getConnection()->createTable($table);
}

$helperSample = Mage::helper('bigshopsettings/sample');
$helperSample->importSampleData();
$installer->endSetup();
unlink($pathFile);