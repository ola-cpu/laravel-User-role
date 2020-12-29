<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	User::truncate();

    	$admin = User::create([

    		'name' => 'admin',
    		'email' => 'admin@admin.com',
    		'password' => Hash::make('momo')
    	]);



    	$auteur = User::create([

    		'name' => 'auteur',
    		'email' => 'auteur@admin.com',
    		'password' => Hash::make('momo')
    	]);





    	$utilisateur = User::create([

    		'name' => 'utilisateur',
    		'email' => 'u@admin.com',
    		'password' => Hash::make('momo')
    	]);

    	$adminRole = Role::where('name','admin')->first();
    	$auteurRole = Role::where('name','auteur')->first();
    	$utilisateurRole = Role::where('name','utilisateur')->first();



    	$admin->roles()->attach($adminRole);
    	$auteur->roles()->attach($auteurRole);
    	$utilisateur->roles()->attach($utilisateurRole);

    }
}
