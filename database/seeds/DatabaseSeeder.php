<?php

use Illuminate\Database\Seeder;
use Queuetest\CarType;
use Queuetest\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Gica Hagi';
        $user->email = 'gica.hagi@example.com';
        $user->password = \Illuminate\Support\Facades\Hash::make('123qweasd');
        $user->save();

        (new CarType())->fill([
            'name' => 'Alfa Romeo Giulia',
            'image' => 'alfagiulia.png',
            'cost' => '60000',
            'speed' => '280',
            'revenue' => 1000

        ])->save();

        (new CarType())->fill([
            'name' => 'Honda Jazz',
            'image' => 'hondajazz.png',
            'cost' => '14000',
            'speed' => '110',
            'revenue' => 250
        ])->save();

        (new CarType())->fill([
            'name' => 'Toyota Yaris',
            'image' => 'toyotayaris.png',
            'cost' => '9000',
            'speed' => '85',
            'revenue' => 100
        ])->save();

    }
}
