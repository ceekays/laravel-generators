<?php

namespace Ceekays\Generators\Commands;

class MakeServiceCommand extends AbstractCommand
{
    protected $signature = 'make:service {name}';

    protected $name = 'make:service';

    protected $description = 'Create a new service class';

    protected $type = 'Service';

    protected function getStub()
    {
        return dirname(__DIR__) . '/Stubs/service.stub';
    }

    protected function getPlaceholders()
    {
        return ['DummyService'];
    }

    protected function getSubstitutes($name)
    {
        return [str_replace($this->getNamespace($name) . '\\', '', $name)];
    }

    protected function getBaseDirectoryName()
    {
        return 'Services';
    }

    protected function getErrorMessages()
    {
        return [
            'name' => 'The name of the service.',
        ];
    }
}
