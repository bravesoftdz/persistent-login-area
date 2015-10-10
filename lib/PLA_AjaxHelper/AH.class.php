<?php 
namespace PLA_AjaxHelper;

class AH {
	
	function jdie($s){
		die(json_encode($s));
    }
}
