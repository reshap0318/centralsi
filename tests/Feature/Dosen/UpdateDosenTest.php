<?php

namespace Tests\Feature\Dosen;

use App\Dosen;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateDosenTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->dosen = create(Dosen::class);
    }

    /** @test */
    public function authorized_user_can_update_dosen()
    {
        $this->signInWithPermission('manage_lecturers');

        $attributes = make(Dosen::class)->toArray();
        $attributes['email'] = $this->faker->email;

        $this->get(route('admin.dosen.edit', [$this->dosen->id]))
            ->assertStatus(200);

        $response = $this->patch(
            route('admin.dosen.update', [$this->dosen->id]),  $attributes)
            ->assertRedirect();

        $this->assertDatabaseHas('users', ['email' => $attributes['email']]);
        $this->assertDatabaseHas('dosen', ['nip' => $attributes['nip']]);

        $this->get($response->headers->get('Location'))
            ->assertSee($attributes['email'])
            ->assertSee($attributes['nama']);
    }

    /** @test */
    public function authorized_user_cannot_update_incomplete_data()
    {
        $this->signInWithPermission('manage_lecturers');

        $attributes = make(Dosen::class)->toArray();
        $attributes['nik'] = null;
        $attributes['email'] = null;
        $attributes['nama'] = null;
        $attributes['nidn'] = null;

        $this->get(route('admin.dosen.edit', [$this->dosen->id]))
            ->assertStatus(200);

        $this->patch(route('admin.dosen.update', [$this->dosen->id]), $attributes)
            ->assertSessionHasErrors(['email', 'nik', 'nama', 'nidn']);

        $attributes['email'] = 'my email address';
        $this->patch(route('admin.dosen.update', [$this->dosen->id]), $attributes)
            ->assertSessionHasErrors(['email', 'nik', 'nama', 'nidn']);
    }

    /** @test */
    public function unregistered_user_cannot_update_student()
    {
        $this->get(route('admin.dosen.edit', [$this->dosen->id]))
            ->assertRedirect(route('login'));

        $this->patch(route('admin.dosen.update', [$this->dosen->id]), [])
            ->assertRedirect(route('login'));
    }

}
