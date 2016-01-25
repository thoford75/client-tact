<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'name'     => 'Test Client',
            'email'    => 'client@housetohomeuk.com',
            'password' => Hash::make('client'),
        ));

    }

}
