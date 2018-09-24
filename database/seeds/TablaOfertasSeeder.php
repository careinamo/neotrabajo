<?php

use Illuminate\Database\Seeder;
use App\Oferta;
class TablaOfertasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\Oferta::class, 15)->create();
    }
}
