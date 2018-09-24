<?php

use Illuminate\Database\Seeder;
use App\TipoContrato;

class TablaTiposContratosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$users = factory(App\TipoContrato::class, 3)->create();
        $user = TipoContrato::create([
            'descripcion' => 'Tipo de contrato 1',
        ]);
        $user = TipoContrato::create([
            'descripcion' => 'Tipo de contrato 2',
        ]);
        $user = TipoContrato::create([
            'descripcion' => 'Tipo de contrato 3',
        ]);
    }
}
