<?php

namespace Ceekays\Generators\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand as Command;

class ModelMakeCommand extends Command
{
    protected function getDefaultNamespace($rootNamespace)
    {
        return "{$rootNamespace}\Models";
    }

    protected function getStub()
    {
        if ($this->option('pivot')) {
            return dirname(__DIR__) . '/Stubs/pivot.model.stub';
        }

        return dirname(__DIR__) . '/Stubs/model.stub';

    }
}
