<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TablaCursosSeeder::class);
        $this->call(TablaPuestosSeeder::class);
        $this->call(TablaSectoresSeeder::class);
        $this->call(TablaEmpresasSeeder::class);
        $this->call(TablaOfertasSeeder::class);
        $this->call(TablaTiposContratosSeeder::class);
    }
}
