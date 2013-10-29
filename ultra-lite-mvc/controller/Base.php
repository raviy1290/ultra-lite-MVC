<?php
 class Base{
 	
 	function __construct(){
 		//require_once(realpath(dirname(__FILE__)). '/'. '../config.php');
 	}
 	
 	public function main($request_arr){
		print_r($request_arr);
		
		//$this->render('../view/Base.php', $data);
 	}
 	
 	public function render($template, $param){
   		ob_start();
   		include($template);//How to pass $param to it? It needs that $row to render blog entry!
   		$ret = ob_get_contents();
   		ob_end_clean();
   		return $ret;
	}
 }