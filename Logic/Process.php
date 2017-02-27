<?php

class Process {
	
	var $content;
	var $nro;
	var $a;
	var $s;
	
	function __construct($content) {
		$this->content = $content;
		$this->s = new Storage;
	}
	
	
	
	function start() {
		//$lines = explode("\n", $this->content);
		$lines = $this->content;
		
		foreach ($lines as $line_num => $line) {
			
			list($lon) = explode(' ', $line);
			
			if (is_numeric($lon)) {
				unset($this->a);
			} else {
				if ($lon == "UPDATE") { 
					$this->update($line);
				} 
				if ($lon == "QUERY") {
					$this->query($line);
				}
			}
		}
	}
	
	function update($line) {
		list($op, $x, $y, $z, $val) = explode(' ', $line);
		$this->a[$x][$y][$z]= (int)$val;		
	}
	
	function query($line) {
		list($op, $x1, $y1, $z1, $x2, $y2, $z2) = explode(' ', $line);
		$tot = 0;
		$a = (isset($this->a) ? $this->a : null);

		if(!is_null($a)) 
			foreach($a as $key => $value)
				if ($key >= $x1 && $key <= $x2) 
					foreach($value as $key2 => $value2) 
						if ($key2 >= $y1 && $key2 <= $y2) 
							foreach($value2 as $key3 => $value3) 
								if ($key3 >= $z1 && $key3 <= $z2) 
									$tot += $value3;
		$this->s->add($tot);
	}
}

?>