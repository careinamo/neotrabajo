<?php

use Illuminate\Database\Seeder;
use App\Empresa;
class TablaEmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\Empresa::class, 15)->create();
    }
}
