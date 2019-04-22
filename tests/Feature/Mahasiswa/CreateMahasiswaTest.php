<?php

namespace Tests\Feature\Mahasiswa;

use App\Mahasiswa;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateMahasiswaTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();
        $this->mahasiswa = create(Mahasiswa::class);
    }

    /** @test */
    public function authorized_user_can_create_student()
    {
        $this->signInWithPermission('manage_students');

        $attributes = make(Mahasiswa::class)->toArray();
        $attributes['email'] = $this->faker->email;

        $this->get(route('admin.mahasiswa.create'))
            ->assertStatus(200);

        $response = $this->post('admin/mahasiswa', $attributes)
            ->assertRedirect();

        $this->assertDatabaseHas('users', ['email' => $attributes['email']]);
        $this->assertDatabaseHas('mahasiswa', ['nim' => $attributes['nim']]);

        $this->get($response->headers->get('Location'))
            ->assertSee($attributes['email'])
            ->assertSee($attributes['nama']);
    }

    /** @test */
    public function admin_cannot_create_incomplete_data_student()
    {
        $this->signInWithPermission('manage_students');

        $attributes = make(Mahasiswa::class)->toArray();
        $attributes['nim'] = null;
        $attributes['email'] = null;
        $attributes['nama'] = null;
        $attributes['angkatan'] = null;

        $this->get(route('admin.mahasiswa.create'))
            ->assertStatus(200);

        $this->post('admin/mahasiswa', $attributes)
            ->assertSessionHasErrors(['email', 'nim', 'nama', 'angkatan']);

        $attributes['email'] = 'my email address';
        $this->post('admin/mahasiswa', $attributes)
            ->assertSessionHasErrors(['email', 'nim', 'nama', 'angkatan']);
    }

    /** @test */
    public function unauthorized_user_cannot_create_student()
    {
        $this->get(route('admin.mahasiswa.create'))
            ->assertRedirect(route('login'));

        $this->post(route('admin.mahasiswa.store'), [])
            ->assertRedirect(route('login'));
    }
}

