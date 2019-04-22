<?php

namespace Tests\Feature\Dosen;

use App\Dosen;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateDosenTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();
        $this->dosen = create(Dosen::class);
    }

    /** @test */
    public function authorized_user_can_create_lecturer()
    {
        $this->withoutExceptionHandling();

        $this->signInWithPermission('manage_lecturers');

        $attributes = make(Dosen::class)->toArray();
        $attributes['email'] = $this->faker->email;

        $this->get(route('admin.dosen.create'))
            ->assertStatus(200);

        $response = $this->post('admin/dosen', $attributes)
            ->assertRedirect();

        $this->assertDatabaseHas('users', ['email' => $attributes['email']]);
        $this->assertDatabaseHas('dosen', ['nip' => $attributes['nip']]);

        $this->get($response->headers->get('Location'))
            ->assertSee($attributes['email'])
            ->assertSee($attributes['nama']);
    }

    /** @test */
    public function admin_cannot_create_incomplete_data_leturer()
    {
        $this->signInWithPermission('manage_lecturers');

        $attributes = make(Dosen::class)->toArray();
        $attributes['nik'] = null;
        $attributes['email'] = null;
        $attributes['nama'] = null;
        $attributes['nidn'] = null;

        $this->get(route('admin.dosen.create'))
            ->assertStatus(200);

        $this->post('admin/dosen', $attributes)
            ->assertSessionHasErrors(['email', 'nidn', 'nama', 'nik']);

        $attributes['email'] = 'my email address';
        $this->post('admin/dosen', $attributes)
            ->assertSessionHasErrors(['email', 'nik', 'nama', 'nidn']);
    }

    /** @test */
    public function unauthorized_user_cannot_create_student()
    {
        $this->get(route('admin.dosen.create'))
            ->assertRedirect(route('login'));

        $this->post(route('admin.dosen.store'), [])
            ->assertRedirect(route('login'));
    }
}
