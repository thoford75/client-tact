<?php

use App\User;
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

        $this->call('ContactsTableSeeder');

    }
}

class ContactsTableSeeder extends Seeder {

    public function run()
    {

        User::create(array(
            'name' => 'New Client',
            'email' => 'new@housetohomeuk.com',
            'password' => Hash::make('new'),
        ));

    }

}
