<?php

namespace Tests\Feature\Dosen;

use App\Dosen;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KelolaDosenTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();
        $this->dosen = create(Dosen::class);
    }

    /** @test */
    public function authorized_user_can_browse_dosen_list()
    {
        $this->signInWithPermission('manage_lecturers');

        $this->get(route('admin.dosen.index'))
            ->assertSee($this->dosen->nama);

        $this->get(route('admin.dosen.show', [$this->dosen->id]))
            ->assertStatus(200)
            ->assertSee($this->dosen->nama);
    }

    /** @test */
    public function authorized_user_can_delete_dosen()
    {
        $this->signInWithPermission('manage_lecturers');

        $dosen = factory(Dosen::class)->create();

        $this->assertDatabaseHas('dosen', [
            'id' => $dosen->id,
            'nama' => $dosen->nama,
            'nip' => $dosen->nip
        ]);

        $this->delete(route('admin.dosen.destroy', [$dosen->id]))
            ->assertRedirect();

        $this->assertDatabaseMissing('dosen', [
            'nama' => $dosen->nama,
            'nip' => $dosen->nip
        ]);
    }
}
