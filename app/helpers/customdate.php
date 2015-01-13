<?php

abstract class customdate {

	public static function format($stamp)
	{
		$time = strtotime($stamp);
		return date('Y-m-d', $time);
	}

}

