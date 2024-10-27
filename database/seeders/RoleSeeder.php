<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'invitado']);
        $role3 = Role::create(['name' => 'Padres']);

        Permission::create(['name'=>'admin.users.index'])->assignRole($role1);
        Permission::create(['name'=>'admin.users.edit'])->assignRole($role1);
        Permission::create(['name'=>'admin.users.update'])->assignRole($role1);
        Permission::create(['name'=>'padres'])->assignRole($role3);

        Permission::create(['name'=>'admin.roxana.index'])->assignRole($role1, $role2);
        Permission::create(['name'=>'admin.roxana.subadministrador'])->assignRole($role1, $role2);
        Permission::create(['name'=>'admin.roxana.eliminar'])->assignRole($role1, $role2);
        Permission::create(['name'=>'admin.roxana.crear'])->assignRole($role1, $role2);
    }
}
