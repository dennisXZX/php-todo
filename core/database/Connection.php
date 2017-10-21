<?php

class Connection {

    /**
     * @summary connect to database
     * @param $config - an associate array
     * @return PDO object
     */
	public static function make($config) {
		try {
			return new PDO(
			    $config['connection'].';dbname='.$config['name'],
				$config['username'],
				$config['password'],
				$config['options']
			);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}