<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::select('id')->get();

        $obj = new User();
        $obj->name = 'Welker';
        $obj->lastname = 'Pérez Acero';
        $obj->cellphone = '3213655354';
        $obj->document_type_id = 1;
        $obj->document_number = 1232589088;
        $obj->department_id = 1;
        $obj->city = 'Bucaramanga';
        $obj->street = 'Calle 63D';
        $obj->email = 'welkerperez97@gmail.com';
        $obj->email_verified_at = now();
        $obj->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; //password
        $obj->role_id = $roles[0]->id;
        $obj->remember_token = Str::random(10);
        $obj->save();
    }
}
