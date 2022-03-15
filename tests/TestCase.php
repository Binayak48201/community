<?php

namespace Tests;

use App\Models\Ability;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function signIn($user = NUll)
    {
        $user = $user ?: User::factory()->create();

        $this->be($user);

        return $this;
    }

    public function authorizedUser($role, $ability)
    {
        $this->signIn();

        $role = Role::forceCreate([
            'name' => $role
        ]);

        $ability = Ability::forceCreate([
            'name' => $ability
        ]);

        $role->allowTo($ability->name);

        auth()->user()->assignRole('Admin');
    }

}
