<?php

namespace Ceekays\Generators;

use Ceekays\Generators\Commands\MakeReportCommand;
use Ceekays\Generators\Commands\MakeServiceCommand;
use Ceekays\Generators\Commands\ModelMakeCommand;
use Illuminate\Support\ServiceProvider;

class GeneratorsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->extend('command.model.make', function ($app) {
            return new ModelMakeCommand(app('files'));
        });

        foreach ($this->getCommands() as $register_key => $command) {
            $this->app->singleton($register_key, function ($app) use ($command) {
                return $app[$command];
            });

            $this->commands($register_key);
        }
    }

    private function getCommands()
    {
        return [
            'command.ceekays.report' => MakeReportCommand::class,
            'command.ceekays.service' => MakeServiceCommand::class,
        ];
    }
}
