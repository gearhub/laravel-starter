<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\TestMakeCommand;

class UnitTestMakeCommand extends TestMakeCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:unit-test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new unit test.';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/unit-test.stub';
    }
}
