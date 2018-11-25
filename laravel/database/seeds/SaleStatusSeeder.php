<?php

use Illuminate\Database\Seeder;
use App\SaleStatus;

class SaleStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status 	  = new SaleStatus;
        $status->name = 'Aguardando Pagamento';
        $status->save();

        $status 	  = new SaleStatus;
        $status->name = 'Em Análise';
        $status->save();

        $status 	  = new SaleStatus;
        $status->name = 'Paga';
        $status->save();

        $status 	  = new SaleStatus;
        $status->name = 'Disponível';
        $status->save();

        $status 	  = new SaleStatus;
        $status->name = 'Em Disputa';
        $status->save();

        $status 	  = new SaleStatus;
        $status->name = 'Devolvida';
        $status->save();

        $status 	  = new SaleStatus;
        $status->name = 'Cancelada';
        $status->save();
    }
}
