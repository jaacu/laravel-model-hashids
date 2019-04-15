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

use ReflectionClass;

class UsesHashidsTest extends AbstractTestCase
{
    public function test_hash_id_is_not_null()
    {
        $this->assertNotNull($this->testModel->hash_id);
    }

    public function test_get_id_method_works()
    {
        $this->assertNotNull($this->testModel->getId());

        $this->assertInternalType('string', $this->testModel->getId());

        $this->assertStringStartsWith(strtolower(str_limit(config('app.name'), 5, '')), $this->testModel->getId());

        $this->assertEquals($this->testModel->getId(), $this->testModel->hash_id);
    }

    public function test_model_routing_works()
    {
        $this->assertContains($this->testModel->getId(), route('model', $this->testModel));

        $this->assertEquals($this->testModel->getRouteKey(), $this->testModel->getId());
    }

    public function test_model_name_reflection()
    {
        $this->assertContains(strtolower($this->testModel->getHashShortName()), strtolower((new ReflectionClass($this->testModel))->getShortName()));
    }
}
