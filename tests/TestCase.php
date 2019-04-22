<?php

namespace Tests;

use App\Dosen;
use App\Mahasiswa;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp():void
    {
        parent::setUp();
        $this->app->make(PermissionRegistrar::class)->registerPermissions();
    }

    public function signIn($user = null)
    {
        if($user == null) {
            $mahasiswa = create(Mahasiswa::class);
            $user = $mahasiswa->user;
        }
        $this->actingAs($user);
        return $user;
    }

    public function signInAsMahasiswa()
    {
        $mahasiswa = create(Mahasiswa::class);
        $this->signIn($mahasiswa->user);
    }

    public function signInAsDosen()
    {
        $dosen = create(Dosen::class);
        $this->signIn($dosen);
    }

    public function signInWithPermission($permission)
    {
        $user = $this->signIn();
        $permission = Permission::create(['name' => $permission]);
        $user->givePermissionTo($permission);
        return $user;
    }
}
