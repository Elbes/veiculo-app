<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //INSERÇÃO NA TABELA CORES
        DB::table('Cores')->insert([
            'nom_cor'      => 'Branco',
            'dhs_cadastro' => Carbon::now()
        ]);
        DB::table('Cores')->insert([
            'nom_cor'      => 'Preto',
            'dhs_cadastro' => Carbon::now()
        ]);
        DB::table('Cores')->insert([
            'nom_cor'      => 'Vermelho',
            'dhs_cadastro' => Carbon::now()
        ]);
        DB::table('Cores')->insert([
            'nom_cor'      => 'Prata',
            'dhs_cadastro' => Carbon::now()
        ]);

        //INSERÇÃO NA TABELA MARCAS
        DB::table('Marcas')->insert([
            'nom_marca'      => 'Volkswagen',
            'dhs_cadastro'   => Carbon::now()
        ]);
        DB::table('Marcas')->insert([
            'nom_marca'      => 'Toyota',
            'dhs_cadastro'   => Carbon::now()
        ]);
        DB::table('Marcas')->insert([
            'nom_marca'      => 'Renault',
            'dhs_cadastro'   => Carbon::now()
        ]);
        DB::table('Marcas')->insert([
            'nom_marca'      => 'Hyundai',
            'dhs_cadastro'   => Carbon::now()
        ]);
        DB::table('Marcas')->insert([
            'nom_marca'      => 'Honda',
            'dhs_cadastro'   => Carbon::now()
        ]);
        DB::table('Marcas')->insert([
            'nom_marca'      => 'Hyundai',
            'dhs_cadastro'   => Carbon::now()
        ]);
        DB::table('Marcas')->insert([
            'nom_marca'      => 'Ford',
            'dhs_cadastro'   => Carbon::now()
        ]);
        DB::table('Marcas')->insert([
            'nom_marca'      => 'Nissan',
            'dhs_cadastro'   => Carbon::now()
        ]);
        DB::table('Marcas')->insert([
            'nom_marca'      => 'Chevrolet',
            'dhs_cadastro'   => Carbon::now()
        ]);
        DB::table('Marcas')->insert([
            'nom_marca'      => 'Kia',
            'dhs_cadastro'   => Carbon::now()
        ]);
        DB::table('Marcas')->insert([
            'nom_marca'      => 'Mercedes',
            'dhs_cadastro'   => Carbon::now()
        ]);
        DB::table('Marcas')->insert([
            'nom_marca'      => 'BMW',
            'dhs_cadastro'   => Carbon::now()
        ]);
        DB::table('Marcas')->insert([
            'nom_marca'      => 'Fiat',
            'dhs_cadastro'   => Carbon::now()
        ]);

        //INSERÇÃO NA TABELA USUARIOS
        DB::table('Usuarios')->insert([
            'nom_usuario'    => 'Administrador',
            'num_cpf'        => '15315236155',
            'dat_nascimento' => '1990-09-09',
            'dsc_email'      => 'elbes2009@gmail.com',
            'pws_senha'      => Hash::make('1010'),
            'sit_usuario'    => 'A',
            'dhs_cadastro'   => Carbon::now()
        ]);
    }
}
