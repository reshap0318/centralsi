<?php

namespace Tests\Feature\Mahasiswa;

use App\Mahasiswa;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateMahasiswaTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();
        $this->mahasiswa = create(Mahasiswa::class);
    }

    /** @test */
    public function authorized_user_can_update_mahasiswa()
    {
        $this->signInWithPermission('manage_students');

        $attributes = make(Mahasiswa::class)->toArray();
        $attributes['email'] = $this->faker->email;

        $this->get(route('admin.mahasiswa.edit', [$this->mahasiswa->id]))
            ->assertStatus(200);

        $response = $this->patch(
            route('admin.mahasiswa.update', [$this->mahasiswa->id]),
            $attributes)
            ->assertRedirect();

        $this->assertDatabaseHas('users', ['email' => $attributes['email']]);
        $this->assertDatabaseHas('mahasiswa', ['nim' => $attributes['nim']]);

        $this->get($response->headers->get('Location'))
            ->assertSee($attributes['email'])
            ->assertSee($attributes['nama']);
    }

    /** @test */
    public function authorized_user_cannot_update_incomplete_data()
    {
        $this->signInWithPermission('manage_students');

        $attributes = make(Mahasiswa::class)->toArray();
        $attributes['nim'] = null;
        $attributes['email'] = null;
        $attributes['nama'] = null;
        $attributes['angkatan'] = null;

        $this->get(route('admin.mahasiswa.edit', [$this->mahasiswa->id]))
            ->assertStatus(200);

        $this->patch(route('admin.mahasiswa.update', [$this->mahasiswa->id]), $attributes)
            ->assertSessionHasErrors(['email', 'nim', 'nama', 'angkatan']);

        $attributes['email'] = 'my email address';
        $this->patch(route('admin.mahasiswa.update', [$this->mahasiswa->id]), $attributes)
            ->assertSessionHasErrors(['email', 'nim', 'nama', 'angkatan']);
    }

    /** @test */
    public function unregistered_user_cannot_update_student()
    {
        $this->get(route('admin.mahasiswa.edit', [$this->mahasiswa->id]))
            ->assertRedirect(route('login'));

        $this->patch(route('admin.mahasiswa.update', [$this->mahasiswa->id]), [])
            ->assertRedirect(route('login'));
    }
}
