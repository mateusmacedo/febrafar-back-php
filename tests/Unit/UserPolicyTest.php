<?php

namespace Tests\Unit;

use App\Models\User;
use App\Policies\UserPolicy;
use PHPUnit\Framework\TestCase;

class UserPolicyTest extends TestCase
{

    public function testViewAny(): void
    {
        $user = new User();
        $policy = new UserPolicy();

        $result = $policy->viewAny($user);

        $this->assertTrue($result);
    }

    public function testView(): void
    {
        $user = new User();
        $model = new User();
        $policy = new UserPolicy();

        $result = $policy->view($user, $model);

        $this->assertTrue($result);
    }

    public function testCreate(): void
    {
        $user = new User();
        $policy = new UserPolicy();

        $result = $policy->create($user);

        $this->assertTrue($result);
    }

    public function testUpdate(): void
    {
        $user = new User();
        $model = new User();
        $policy = new UserPolicy();

        $result = $policy->update($user, $model);

        $this->assertTrue($result);
    }

    public function testDelete(): void
    {
        $user = new User();
        $model = new User();
        $policy = new UserPolicy();

        $result = $policy->delete($user, $model);

        $this->assertTrue($result);
    }
}
