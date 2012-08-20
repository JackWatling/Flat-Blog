<?php

class Configuration{

	private static $config = array();

	public static function update( $config ){
		foreach ($config as $k => &$v) {
			foreach (self::$config as $kk => &$vv) {
				if ( $k === $kk ){
					$v = $vv;
					break;
				}
			}
		}
		return $config;
	}

}