<?php

use Illuminate\Database\Seeder;
use App\ReservationStatus;

class ReservationStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new ReservationStatus;
        $status->name = 'Reservado';
        $status->save();

        $status = new ReservationStatus;
        $status->name = 'Cancelado';
        $status->save();
    }
}
