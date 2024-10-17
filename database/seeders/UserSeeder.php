<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Super Admin';
        $user->email = 'hermansetiawan@d2c.co.id';
        $user->password = bcrypt('@admin_155');
        $user->save();
        $user->assignRole('Super Admin');

        $user = new User();
        $user->name = 'Aditya Nurjaya';
        $user->email = 'adi@d2c.co.id';
        $user->password = bcrypt('@adi_155');
        $user->save();
        $user->assignRole('Admin');

        $user = new User();
        $user->name = 'Bella Aldama';
        $user->email = 'bella@d2c.co.id';
        $user->password = bcrypt('@bella_155');
        $user->save();
        $user->assignRole('Cashier');
    }
}
