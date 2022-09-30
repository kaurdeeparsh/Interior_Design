<?php 
	$interior_designs_custom_css ='';

	/*------ Slider show/hide -------*/
	if(get_theme_mod('interior_designs_slider_arrows') == false){
		$interior_designs_custom_css .=' .contact-outer-box{';
			$interior_designs_custom_css .=' margin: 20px 0 0;';
		$interior_designs_custom_css .='}';
	}