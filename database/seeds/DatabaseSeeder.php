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
            'name' => 'JLF Moving Solutions Limited',
            'email' => 'steve@jlfmovingsolutions.co.uk',
            'password' => Hash::make('jlf2016'),
        ));

        User::create(array(
            'name' => 'John Lomas Removals Ltd',
            'email' => 'rob.horrobin@johnlomasremovals.co.uk',
            'password' => Hash::make('johnlomasremovals2016'),
        ));

        User::create(array(
            'name' => 'Metro Removals Limited',
            'email' => 'lee@metroremovals.co.uk',
            'password' => Hash::make('metro2016'),
        ));

        User::create(array(
            'name' => 'W Southerington &amp; Sons Ltd',
            'email' => 'paul@southeringtons.co.uk',
            'password' => Hash::make('southeringtons2016'),
        ));

        User::create(array(
            'name' => 'Warrens Removals',
            'email' => 'warrenleggett@hotmail.co.uk',
            'password' => Hash::make('warrens2016'),
        ));


    }

}
