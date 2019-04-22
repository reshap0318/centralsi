<?php

namespace Tests\Feature;

use App\Mahasiswa;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KelolaMahasiswaTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();
        $this->mahasiswa = create(Mahasiswa::class);
    }

    /** @test */
    public function authorized_user_can_browse_student_list()
    {
        $this->signInWithPermission('manage_students');

        $this->get(route('admin.mahasiswa.index'))
            ->assertSee($this->mahasiswa->nama);

        $this->get(route('admin.mahasiswa.show', [$this->mahasiswa->id]))
            ->assertStatus(200)
            ->assertSee($this->mahasiswa->nama);
    }

    /** @test */
    public function authorized_user_can_delete_student()
    {
        $this->signInWithPermission('manage_students');

        $mahasiswa = factory(Mahasiswa::class)->create();

        $this->assertDatabaseHas('mahasiswa', [
            'id' => $mahasiswa->id,
            'nama' => $mahasiswa->nama,
            'nim' => $mahasiswa->nim
        ]);

        $this->delete(route('admin.mahasiswa.destroy', [$mahasiswa->id]))
            ->assertRedirect();

        $this->assertDatabaseMissing('mahasiswa', [
            'nama' => $mahasiswa->nama,
            'nim' => $mahasiswa->nim
        ]);
    }
}
