<?php

namespace App\Framework;

use App\Framework\Loader\ConfigLoader;

class Application
{
	/**
	 * @var array
	 */
	private $config;

	/**
	 * @var string
	 */
	private $configPath;

	public function __construct(array $paths)
	{
		$this->configPath = $paths['config'];
		$this->boot();
	}


	public function run()
	{
		var_dump($this);
	}

	private function boot()
	{
		$this->config = new ConfigLoader($this->configPath);
	}
}