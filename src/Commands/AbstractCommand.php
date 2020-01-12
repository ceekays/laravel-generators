<?php


namespace Ceekays\Generators\Commands;


use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;

abstract class AbstractCommand extends GeneratorCommand
{
    abstract  protected function getTemplatePlaceholders();

    abstract protected function getPlaceholderReplacements($name);

    abstract protected function getBaseDirectoryName();

    abstract protected function getErrorMessages();

    protected function replaceClass($stub, $name)
    {
        return str_replace(
            $this->getTemplatePlaceholders(),
            $this->getPlaceholderReplacements($name),
            parent::replaceClass($stub, $name)
        );
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace .'\\'. $this->getBaseDirectoryName();
    }

    protected function getArguments()
    {
        return [['name', InputArgument::REQUIRED, $this->getErrorMessages()['name']],];
    }

    protected function getNameInput()
    {
        $name = trim($this->argument('name'));

        if (strtolower(substr($name, strlen($this->type))) != strtolower($this->type)) $name .= $this->type;

        return $name;
    }

    protected function getPath($name)
    {
        return app_path() . '/' . $this->getQualifiedFilePath($name) . '.php';
    }

    private function getQualifiedFilePath($name)
    {
        return str_replace('\\', '/', Str::replaceFirst($this->rootNamespace(), '', $name));
    }

}
