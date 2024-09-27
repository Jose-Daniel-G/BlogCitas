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
        //-----------------------------------------------------------------------------------------------        
        $role3 = Role::create(['name' => 'profesor']);
        $role4 = Role::create(['name' => 'alumno']);
        // ----------------------------------------------------------------------------------------------
        $admin = Role::create(['name' => 'admin']);
        $blogger = Role::create(['name' => 'blogger']);

        $secretaria = Role::create(['name' => 'secretaria']);
        $doctor = Role::create(['name' => 'doctor']);
        $paciente = Role::create(['name' => 'paciente']);
        $usuario = Role::create(['name' => 'usuario']);



        // Permission::create(['name'=>'admin.home'])->assignRole($admin);
        Permission::create(['name' => 'admin.users.create'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.categories.index'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.categories.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categories.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categories.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.tags.index'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.tags.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.tags.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.tags.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.posts.index'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.posts.create'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.posts.edit'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.posts.destroy'])->syncRoles([$admin, $blogger]);

        //------------------------[ ALEJANDRO PROJECT  ]---------------------------------
        // Permission::create(['name'=>'admin.home'])->assignRole($admin);
        Permission::create(['name' => 'admin.home'])->syncRoles([$admin, $secretaria, $doctor, $usuario, $paciente, $blogger, $role3, $role4]);
        Permission::create(['name' => 'admin.index']);

        //rutas para el admin
        Permission::create(['name' => 'admin.users.index'])->syncRoles([$admin]);
        //proximamente remplazadas estas rutas seran
        Permission::create(['name' => 'admin.usuarios.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.destroy'])->syncRoles([$admin]);

        //rutas - configuraciones
        Permission::create(['name' => 'admin.config.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.config.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.config.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.config.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.config.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.config.destroy'])->syncRoles([$admin]);

        //rutas para el admin - secretarias
        Permission::create(['name' => 'admin.secretarias.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.secretarias.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.secretarias.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.secretarias.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.secretarias.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.secretarias.destroy'])->syncRoles([$admin]);

        //rutas para el admin - pacientes
        Permission::create(['name' => 'admin.pacientes.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pacientes.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pacientes.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pacientes.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pacientes.edit'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pacientes.destroy'])->syncRoles([$admin, $secretaria]);
        //rutas para el admin - consultorios
        Permission::create(['name' => 'admin.consultorios.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.edit'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.destroy'])->syncRoles([$admin, $secretaria]);
        //rutas para el admin - doctores
        Permission::create(['name' => 'admin.doctores.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.edit'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.destroy'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.pdf'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.reportes'])->syncRoles([$admin, $secretaria]);

        //rutas para el admin - horarios
        Permission::create(['name' => 'admin.horarios.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.horarios.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.horarios.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.horarios.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.horarios.edit'])->syncRoles([$admin, $secretaria]);

        //----------------------------------------------------------------------------------------
        Permission::create(['name' => 'cargar_datos_cosultorios'])->syncRoles([$admin, $usuario]);
        Permission::create(['name' => 'cargar_reserva_doctores'])->syncRoles([$admin, $usuario]);
        Permission::create(['name' => 'ver_reservas'])->syncRoles([$admin, $usuario]);
        Permission::create(['name' => 'admin.eventos.create'])->syncRoles([$admin, $usuario]);
        Permission::create(['name' => 'admin.eventos.destroy'])->syncRoles([$admin, $usuario]);
        //----------------------------------------------------------------------------------------
        Permission::create(['name' => 'admin.pagos.buscar_paciente'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pagos.imprimir_historial'])->syncRoles([$admin, $secretaria]);
        
        //RUTAS PARA LAS RESERVAS
        Permission::create(['name' => 'admin.reservas.reportes'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.reservas.pdf'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.reservas.pdf_fechas'])->syncRoles([$admin]);

        //rutas para el historial clinico
        Permission::create(['name' => 'admin.historial.index'])->syncRoles([$admin, $doctor]);
        Permission::create(['name' => 'admin.historial.create'])->syncRoles([$admin, $doctor]);
        Permission::create(['name' => 'admin.historial.store'])->syncRoles([$admin, $doctor]);
        Permission::create(['name' => 'admin.historial.pdf'])->syncRoles([$admin, $doctor]);
        Permission::create(['name' => 'admin.historial.show'])->syncRoles([$admin, $doctor]);
        Permission::create(['name' => 'admin.historial.edit'])->syncRoles([$admin, $doctor]);
        Permission::create(['name' => 'admin.historial.buscar_paciente'])->syncRoles([$admin, $doctor]);
        Permission::create(['name' => 'admin.historial.imprimir_historial'])->syncRoles([$admin, $doctor]);

        //rutas para pagos
        Permission::create(['name' => 'admin.pagos.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pagos.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pagos.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pagos.pdf'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pagos.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pagos.edit'])->syncRoles([$admin, $secretaria]);









        // $admin->permissions()->attach();

        // //VEHICULOS
        // Permission::create(['name'=>'admin.vehiculos.index'])->syncRoles([$admin,$role3,$role4]);
        // Permission::create(['name'=>'admin.vehiculos.create'])->syncRoles([$admin]);
        // Permission::create(['name'=>'admin.vehiculos.update'])->syncRoles([$admin]);  

        // //PICO Y PLACA
        // Permission::create(['name'=>'admin.vehiculos.pico_y_placa.index'])->syncRoles([$admin,$role3,$role4]);
        // Permission::create(['name'=>'admin.vehiculos.pico_y_placa.create'])->syncRoles([$admin]);
        // Permission::create(['name'=>'admin.vehiculos.pico_y_placa.update'])->syncRoles([$admin]);

        // //CURSOS
        // Permission::create(['name'=>'admin.cursos.index'])->syncRoles([$admin,$role3,$role4]);
        // Permission::create(['name'=>'admin.cursos.create'])->syncRoles([$admin]);
        // Permission::create(['name'=>'admin.cursos.update'])->syncRoles([$admin]);

        // //CLASES
        // Permission::create(['name'=>'admin.clases.index'])->syncRoles([$admin,$role3,$role4]);
        // Permission::create(['name'=>'admin.clases.create'])->syncRoles([$admin,$role3]);
        // Permission::create(['name'=>'admin.clases.update'])->syncRoles([$admin,$role3]);

    }
}
