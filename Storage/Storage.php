<?php

class Storage {
	var $s = array();
	
	function add($value) {
		array_push($this->s, $value);
	}
	
	function print2(){
		foreach ($this->s as $key => $value)
			echo "<br>". $value;
	}
	
}

?>