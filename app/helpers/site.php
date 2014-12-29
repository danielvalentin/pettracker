<?php 

/**
 * Various site functions.
 */

abstract class site {
	
	public static function notes()
	{
		$notes = notes::fetch();
		if(!is_array($notes)) $notes = array();
		return json_encode($notes);
	}
	
}
