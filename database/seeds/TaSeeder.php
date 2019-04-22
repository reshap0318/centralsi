<?php

use Illuminate\Database\Seeder;

class TaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i <= 2; $i++){
            $ta = factory(\App\TugasAkhir::class)->create();
            factory(\App\TaPembimbing::class)->create(['tugas_akhir_id' => $ta->id ]);
        }

        factory(\App\TaSempro::class, 2)->create();
        for($i=1; $i <= 3; $i++){
            $semhas = factory(\App\TaSemhas::class)->create();
            factory(\App\TaPengujiSemhas::class, 2)->create(['ta_semhas_id' => $semhas->id]);
            factory(\App\TaPesertaSemhas::class, 10)->create(['ta_semhas_id' => $semhas->id]);
        }

        $sidang = factory(\App\TaSidang::class)->create();
        factory(\App\TaPengujiSidang::class, 2)->create(['ta_sidang_id' => $sidang->id]);
    }
}
