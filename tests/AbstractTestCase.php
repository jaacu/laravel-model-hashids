<?php

/*
 * This file is part of Laravel Model Hashids.
 *
 * (c) Javier Cabello <jaacu.97@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jaacu\Tests\LaravelModelHashids;

use Illuminate\Database\Schema\Blueprint;
use Vinkla\Hashids\HashidsServiceProvider;
use GrahamCampbell\TestBench\AbstractPackageTestCase;
use Jaacu\LaravelModelHashids\LaravelModelHashidsServiceProvider;

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
        $app['router']->get('model/{model}', 'Controller@model')->name('model');
    }
}
