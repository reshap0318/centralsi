<?php

use Illuminate\Database\Seeder;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //KonsentrasiTa
        factory(\App\RefKonsentrasiTa::class)->create(['keterangan' => 'GIS']);
        factory(\App\RefKonsentrasiTa::class)->create(['keterangan' => 'EA']);
        factory(\App\RefKonsentrasiTa::class)->create(['keterangan' => 'BI']);

        //Ruangan
        factory(\App\Ruangan::class)->create(['nama' => 'R. Rapat Jurusan']);
        factory(\App\Ruangan::class)->create(['nama' => 'Labor Daskom']);
        factory(\App\Ruangan::class)->create(['nama' => 'R. Rapat Fakultas']);

        //KpInstansi
        factory(\App\KpInstansi::class, 7)->create();

        //RefJabatanOrganisasi
        factory(\App\RefJabatanOrganisasi::class, 7)->create();

        //RefJenjangPendidikan
        factory(\App\RefJenjangPendidikan::class)->create(['tingkat' => 'TK']);
        factory(\App\RefJenjangPendidikan::class)->create(['tingkat' => 'SD']);
        factory(\App\RefJenjangPendidikan::class)->create(['tingkat' => 'SMP']);
        factory(\App\RefJenjangPendidikan::class)->create(['tingkat' => 'SMA']);
        factory(\App\RefJenjangPendidikan::class)->create(['tingkat' => 'D1']);
        factory(\App\RefJenjangPendidikan::class)->create(['tingkat' => 'D3']);
        factory(\App\RefJenjangPendidikan::class)->create(['tingkat' => 'D4']);
        factory(\App\RefJenjangPendidikan::class)->create(['tingkat' => 'S1']);
        factory(\App\RefJenjangPendidikan::class)->create(['tingkat' => 'S2']);
        factory(\App\RefJenjangPendidikan::class)->create(['tingkat' => 'S3']);

        //RefSkemaPenelitian
        factory(\App\RefSkemaPenelitian::class)->create(['nama' => 'Penelitian Mandiri']);
        factory(\App\RefSkemaPenelitian::class)->create(['nama' => 'Penelitian Dosen Muda']);
        factory(\App\RefSkemaPenelitian::class)->create(['nama' => 'Penelitian Dasar']);
        factory(\App\RefSkemaPenelitian::class)->create(['nama' => 'Penelitian Terapan']);
        factory(\App\RefSkemaPenelitian::class)->create(['nama' => 'Penelitian Unggulan PT']);

        //RefSkemaPengabdian
        factory(\App\RefSkemaPengabdian::class)->create(['nama' => 'Pengabdian Prodi']);
        factory(\App\RefSkemaPengabdian::class)->create(['nama' => 'Pengabdian Kompetitif']);

        //RefSumberDana
        factory(\App\RefSumberDana::class)->create(['nama' => 'Mandiri']);
        factory(\App\RefSumberDana::class)->create(['nama' => 'BOPTN']);
        factory(\App\RefSumberDana::class)->create(['nama' => 'Dikti']);
        factory(\App\RefSumberDana::class)->create(['nama' => 'PT. SP']);
    }
}
