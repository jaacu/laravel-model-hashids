<?php

namespace Jaacu\Tests\LaravelModelHashids;

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use Vinkla\Hashids\HashidsServiceProvider;
use Jaacu\LaravelModelHashids\LaravelModelHashidsServiceProvider;
use Jaacu\Tests\LaravelModelHashids\Model;
use Illuminate\Database\Schema\Blueprint;

abstract class AbstractTestCase extends AbstractPackageTestCase
{
    /**
     * @var \Jaacu\Tests\LaravelModelHashids\Model
     */
    protected $testModel;

    /**
     * Get the required service providers.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return string[]
     */
    protected function getRequiredServiceProviders($app)
    {
        return [
            HashidsServiceProvider::class,
        ];
    }
    /**
     * Get the service provider class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return string
     */
    protected function getServiceProviderClass($app)
    {
        return LaravelModelHashidsServiceProvider::class;
    }

    protected function setUp():void
    {
        parent::setUp();

        $this->setUpDatabase($this->app);

        $this->setUpRoute($this->app);

        $model = Model::first();
        $this->testModel = $model;
    }

    protected function setUpDatabase($app)
    {
        $app['db']->connection()->getSchemaBuilder()->create('models', function (Blueprint $table) {
            $table->increments('id');
            $table->hashid();
        });

        Model::create();

    }

    protected function setUpRoute($app)
    {
        $app['router']->get('model/{model}','Controller@model')->name('model');
    }
}