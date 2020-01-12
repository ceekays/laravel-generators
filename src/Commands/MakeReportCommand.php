<?php

namespace Ceekays\Generators\Commands;

class MakeReportCommand extends AbstractCommand
{

    protected $signature = 'make:report
                            {name}
                            {--t|table= : Specify a default table name for the report}
                            ';

    protected $name = 'make:report';

    protected $description = 'Create a new report class';

    protected $type = 'Report';

    protected function getStub()
    {
        return dirname(__DIR__) . '/Stubs/report.stub';
    }

    protected function replaceClass($stub, $name)
    {
        if (!file_exists($this->getPath('Reports/AbstractReport'))) {
            $this->files->put(
                $this->getPath('Reports/AbstractReport'),
                $this->files->get(dirname(__DIR__) . '/Stubs/abstract.report.stub')
            );
        }

        return parent::replaceClass($stub, $name);
    }

    protected function getTemplatePlaceholders()
    {
        return ['DummyReport', 'table-name'];
    }

    protected function getPlaceholderReplacements($name)
    {
        return [
            str_replace($this->getNamespace($name) . '\\', '', $name),
            $this->option('table') ?? 'table'
        ];
    }

    protected function getBaseDirectoryName()
    {
        return 'Reports';
    }

    protected function getErrorMessages()
    {
        return [
            'name' => 'The name of the report.',
        ];
    }
}
