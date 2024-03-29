<?php

namespace Digitalion\LaravelMakes\Commands;

use Digitalion\LaravelMakes\Traits\MakeCommandTrait;
use Illuminate\Console\GeneratorCommand;

class MakeEnumCommand extends GeneratorCommand
{
    use MakeCommandTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:enum';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Enum';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new enum class';


    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        $php_versions = explode('.', phpversion());
        $stub_suffix = (intval($php_versions[0]) >= 8 && intval($php_versions[1]) >= 1) ? '_8x' : '';

        $filename = strtolower($this->type);
        $stub = app_path("stubs/$filename$stub_suffix.stub");
        if (!file_exists($stub)) {
            $stub = __DIR__ . "/../../stubs/$filename$stub_suffix.stub";
        }
        if (!file_exists($stub)) {
            $stub = __DIR__ . "/../../stubs/$filename.stub";
        }

        return $stub;
    }
}
