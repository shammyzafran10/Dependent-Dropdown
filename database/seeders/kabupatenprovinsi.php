<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kabupaten;
use App\Models\Provinsi;

class kabupatenprovinsi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Aceh
        $provinsi = provinsi::create(['nama' => 'Aceh']);

        $kabupaten = kabupaten::create(['id_provinsi' => $provinsi->id, 'nama' => 'Kabupaten Aceh Barat']);
        $kabupaten = kabupaten::create(['id_provinsi' => $provinsi->id, 'nama' => 'Kabupaten Aceh Barat Daya']);
        $kabupaten = kabupaten::create(['id_provinsi' => $provinsi->id, 'nama' => 'Kabupaten Aceh Besar']);
        $kabupaten = kabupaten::create(['id_provinsi' => $provinsi->id, 'nama' => 'Kabupaten Aceh Jaya']);


        //Riau
        $provinsi = provinsi::create(['nama' => 'Riau']);

        $kabupaten = kabupaten::create(['id_provinsi' => $provinsi->id, 'nama' => 'Kabupaten Bengkalis']);
        $kabupaten = kabupaten::create(['id_provinsi' => $provinsi->id, 'nama' => 'Kabupaten Indragiri Hilir']);
        $kabupaten = kabupaten::create(['id_provinsi' => $provinsi->id, 'nama' => 'Kabupaten Siak']);
        $kabupaten = kabupaten::create(['id_provinsi' => $provinsi->id, 'nama' => 'Kabupaten Kampar']);


        //Jambi
        $provinsi = provinsi::create(['nama' => 'Jambi']);

        $kabupaten = kabupaten::create(['id_provinsi' => $provinsi->id, 'nama' => 'Kabupaten Batanghari']);
        $kabupaten = kabupaten::create(['id_provinsi' => $provinsi->id, 'nama' => 'Kabupaten Bungo']);
        $kabupaten = kabupaten::create(['id_provinsi' => $provinsi->id, 'nama' => 'Kabupaten Kerinci']);
        $kabupaten = kabupaten::create(['id_provinsi' => $provinsi->id, 'nama' => 'Kabupaten Merangin']);
    }
}
