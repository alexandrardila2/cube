<?php

class Storage {
	var $s = array();
	
	function add($value) {
		array_push($this->s, $value);
	}
	
}

?>