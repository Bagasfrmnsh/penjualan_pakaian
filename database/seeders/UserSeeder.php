<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'User Administrator'
        ]);

        $pengguna = Role::create([
            'name' => 'pengguna',
            'display_name' => 'User Biasa'
        ]);

        $user = new User();
        $user->name = 'Bagas Firmansyah';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();

        $pengunjung = new User();
        $pengunjung->name = 'Pengunjung';
        $pengunjung->email = 'pengunjung@gmail.com';
        $pengunjung->password = Hash::make('12345678');
        $pengunjung->save();

        $user->attachRole($admin);
        $pengunjung->attachRole($pengguna);

        // $user = new User();
        // $user->name = 'Bagas Firmansyah';
        // $user->email = 'admin@gmail.com';
        // $user->password = Hash::make('12345678');
        // $user->save();

        // $user = new User();
        // $user->name = 'Dessy Agustyani';
        // $user->email = 'member1@gmail.com';
        // $user->password = Hash::make('12345');
        // $user->save();

        // $user = new User();
        // $user->name = 'Dina Amalia';
        // $user->email = 'member2@gmail.com';
        // $user->password = Hash::make('12345');
        // $user->save();

        // $user = new User();
        // $user->name = 'Diki Alif Taufik';
        // $user->email = 'member3@gmail.com';
        // $user->password = Hash::make('12345');
        // $user->save();

        // $user = new User();
        // $user->name = 'Kang Mulki';
        // $user->email = 'member4@gmail.com';
        // $user->password = Hash::make('12345');
        // $user->save();
    }
}
