<?php namespace Loom\Extensions;

use Loom\Extensions\BladeCompiler;
use Loom\Extensions\Environment;
use Illuminate\View\Engines\CompilerEngine;

class LoomViewServiceProvider extends \Illuminate\View\ViewServiceProvider {

    public function registerBladeEngine($resolver)
    {
        $app = $this->app;

        $resolver->register('blade', function() use ($app)
        {
            $cache = $app['path.storage'].'/views';

            // The Compiler engine requires an instance of the CompilerInterface, which in
            // this case will be the Blade compiler, so we'll first create the compiler
            // instance to pass into the engine so it can compile the views properly.
            $compiler = new BladeCompiler($app['files'], $cache);

            return new CompilerEngine($compiler, $app['files']);
        });
    }

    public function registerEnvironment()
    {
        $this->app->bindShared('view', function($app)
        {
            // Next we need to grab the engine resolver instance that will be used by the
            // environment. The resolver will be used by an environment to get each of
            // the various engine implementations such as plain PHP or Blade engine.
            $resolver = $app['view.engine.resolver'];

            $finder = $app['view.finder'];

            $env = new Environment($resolver, $finder, $app['events']);

            // We will also set the container instance on this view environment since the
            // view composers may be classes registered in the container, which allows
            // for great testable, flexible composers for the application developer.
            $env->setContainer($app);

            $env->share('app', $app);

            return $env;
        });
    }
}