<?php  
function arrayLeftJoin($left,$right){
	foreach ($left as $lkey => $lvalue) {
		foreach ($right as $rkey => $rvalue) {
			if($lkey==$rkey){
				unset($left[$lkey]);
			}
		}
	}
	return $left;
}
?>