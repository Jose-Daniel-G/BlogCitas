<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        $role2 = Role::create(['name'=>'Blogger']);
        $role3 = Role::create(['name'=>'Profesor']);
        $role4 = Role::create(['name'=>'Alumno']);

        // Permission::create(['name'=>'admin.home'])->assignRole($role1);
        Permission::create(['name'=>'admin.home'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name'=>'admin.users.index'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.update'])->syncRoles([$role1]);
        
        Permission::create(['name'=>'admin.categories.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'admin.categories.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.categories.edit'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.categories.destroy'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.tags.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'admin.tags.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.tags.edit'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.tags.destroy'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.posts.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.posts.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.posts.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.posts.destroy'])->syncRoles([$role1,$role2]);
        // $role1->permissions()->attach();

        //PICO Y PLACA
        Permission::create(['name'=>'admin.vehiculos.pico_y_placa.index'])->syncRoles([$role1,$role3,$role4]);
        Permission::create(['name'=>'admin.vehiculos.pico_y_placa.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.vehiculos.pico_y_placa.update'])->syncRoles([$role1]);
        //VEHICULOS
        Permission::create(['name'=>'admin.vehiculos.index'])->syncRoles([$role1,$role3,$role4]);
        Permission::create(['name'=>'admin.vehiculos.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.vehiculos.update'])->syncRoles([$role1]);
        //CURSOS
        Permission::create(['name'=>'admin.cursos.index'])->syncRoles([$role1,$role3,$role4]);
        Permission::create(['name'=>'admin.cursos.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.cursos.update'])->syncRoles([$role1]);
        //CLASES
        Permission::create(['name'=>'admin.clases.index'])->syncRoles([$role1,$role3,$role4]);
        Permission::create(['name'=>'admin.clases.create'])->syncRoles([$role1,$role3]);
        Permission::create(['name'=>'admin.clases.update'])->syncRoles([$role1,$role3]);

    }
}
