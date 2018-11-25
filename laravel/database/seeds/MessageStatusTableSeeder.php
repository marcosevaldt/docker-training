<?php

use Illuminate\Database\Seeder;
use App\MessageStatus;

class MessageStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $message_status = new MessageStatus();
        $message_status->name = 'Não Visualizado';
        $message_status->save();
        
        $message_status = new MessageStatus();
        $message_status->name = 'Visualizado';
        $message_status->save();
    }
}
