<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bukus')->insert([
            'judul' => 'TENET',
            'penulis' => 'Anzarullah K',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio maxime reiciendis voluptatem recusandae, harum, eum itaque eius reprehenderit amet quasi, cumque aperiam ullam id molestiae?',
            'kategori' => 'Fiksi',
            'tahun_terbit' => '2021',
            'jumlah_ketersediaan' => '20'
        ]);

        DB::table('bukus')->insert([
            'judul' => 'R3Create',
            'penulis' => 'RIdwan',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio maxime reiciendis voluptatem recusandae, harum, eum itaque eius reprehenderit amet quasi, cumque aperiam ullam id molestiae?',
            'kategori' => 'Fiksi',
            'tahun_terbit' => '2021',
            'jumlah_ketersediaan' => '20'
        ]);

        DB::table('bukus')->insert([
            'judul' => 'Metode Fisika',
            'penulis' => 'Komang',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio maxime reiciendis voluptatem recusandae, harum, eum itaque eius reprehenderit amet quasi, cumque aperiam ullam id molestiae?',
            'kategori' => 'Ilmiah',
            'tahun_terbit' => '2021',
            'jumlah_ketersediaan' => '20'
        ]);

        DB::table('bukus')->insert([
            'judul' => 'Human Body',
            'penulis' => 'Evangeline',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio maxime reiciendis voluptatem recusandae, harum, eum itaque eius reprehenderit amet quasi, cumque aperiam ullam id molestiae?',
            'kategori' => 'Ilmiah',
            'tahun_terbit' => '2021',
            'jumlah_ketersediaan' => '20'
        ]);

        DB::table('bukus')->insert([
            'judul' => 'Math is fun',
            'penulis' => 'Edwin',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio maxime reiciendis voluptatem recusandae, harum, eum itaque eius reprehenderit amet quasi, cumque aperiam ullam id molestiae?',
            'kategori' => 'Edukasi',
            'tahun_terbit' => '2021',
            'jumlah_ketersediaan' => '20'
        ]);

        DB::table('bukus')->insert([
            'judul' => 'How to smart in second',
            'penulis' => 'Rehan',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio maxime reiciendis voluptatem recusandae, harum, eum itaque eius reprehenderit amet quasi, cumque aperiam ullam id molestiae?',
            'kategori' => 'Edukasi',
            'tahun_terbit' => '2021',
            'jumlah_ketersediaan' => '20'
        ]);

        DB::table('bukus')->insert([
            'judul' => 'Merdeka 1994',
            'penulis' => 'Bahar',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio maxime reiciendis voluptatem recusandae, harum, eum itaque eius reprehenderit amet quasi, cumque aperiam ullam id molestiae?',
            'kategori' => 'Sejarah',
            'tahun_terbit' => '2021',
            'jumlah_ketersediaan' => '20'
        ]);

        DB::table('bukus')->insert([
            'judul' => 'Demokrasi itu nyata',
            'penulis' => 'Ratna',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio maxime reiciendis voluptatem recusandae, harum, eum itaque eius reprehenderit amet quasi, cumque aperiam ullam id molestiae?',
            'kategori' => 'Sejarah',
            'tahun_terbit' => '2021',
            'jumlah_ketersediaan' => '20'
        ]);

        DB::table('bukus')->insert([
            'judul' => 'PBB in era',
            'penulis' => 'Shinta',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio maxime reiciendis voluptatem recusandae, harum, eum itaque eius reprehenderit amet quasi, cumque aperiam ullam id molestiae?',
            'kategori' => 'Politik',
            'tahun_terbit' => '2021',
            'jumlah_ketersediaan' => '20'
        ]);

        DB::table('bukus')->insert([
            'judul' => 'Word Organitation',
            'penulis' => 'Eka',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio maxime reiciendis voluptatem recusandae, harum, eum itaque eius reprehenderit amet quasi, cumque aperiam ullam id molestiae?',
            'kategori' => 'Politik',
            'tahun_terbit' => '2021',
            'jumlah_ketersediaan' => '20'
        ]);
    }
}
