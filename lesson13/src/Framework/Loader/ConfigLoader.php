<?php

namespace App\Framework\Loader;

class ConfigLoader
{
	public function __construct(string $configPath)
	{
		return $this->load($configPath);
	}

	private function load (string $configPath)
	{
		if (!file_exists($configPath)){
			throw new \Exception("Config file not found ");
		}
		$config= parse_ini_file($configPath, true);
	}

}