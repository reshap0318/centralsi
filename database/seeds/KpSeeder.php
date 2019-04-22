<?php

use Illuminate\Database\Seeder;

class KpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\KpProposal::class, 1)->create();
        for($i=1; $i <= 3; $i++) {
            $kpMahasiswa = factory(\App\KpMahasiswa::class)->create();
            factory(\App\KpPeserta::class, 10)->create(['kp_mahasiswa_id' => $kpMahasiswa->id]);
        }
    }
}
