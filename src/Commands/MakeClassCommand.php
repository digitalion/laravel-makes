<?php

namespace Digitalion\LaravelMakes\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeClassCommand extends GeneratorCommand
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $name = 'make:class';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'Class';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new generic class';


	/**
	 * Get the stub file for the generator.
	 *
	 * @return string
	 */
	protected function getStub()
	{
		$filename = strtolower($this->type);
		$stub = app_path("stubs/$filename.stub");
		if (!file_exists($stub)) {
			$stub = __DIR__ . "/../../stubs/$filename.stub";
		}
		return $stub;
	}

	/**
	 * Get the default namespace for the class.
	 *
	 * @param  string  $rootNamespace
	 * @return string
	 */
	protected function getDefaultNamespace($rootNamespace)
	{
		return $rootNamespace . '\Classes';
	}
}
