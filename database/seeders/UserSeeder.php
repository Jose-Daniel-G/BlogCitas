<?php

namespace Database\Seeders;

use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;
use App\Models\Paciente;
use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123123'),
        ])->assignRole('admin');

        User::create([
            'name' => 'Jose Daniel Grijalba Osorio',
            'email' => 'jose.jdgo97@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123123'),
        ])->assignRole('admin');
        //------------SECRETARIA---------------
        User::create([
            'name' => 'Secretaria',
            'email' => 'secretaria@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123123'),
        ])->assignRole('secretaria');

        Secretaria::create([
            'nombres' => 'Secretaria',
            'apellidos' => 'Catrana',
            'cc' => 'secretaria@email.com',
            'celular' => '3147078256',
            'fecha_nacimiento' => '10/10/2010',
            'direccion' => 'calle 5 o este',
            'user_id' => '3',
        ]);
        //-------------------------------------
        User::create([
            'name' => 'Doctor',
            'email' => 'doctor@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123123'),
        ])->assignRole('doctor');
        Doctor::create([
            'nombres' => 'Doctor',
            'apellidos' => 'Lewis',
            'telefono' => '4564564565',
            'licencia_medica' => '123123123',
            'especialidad' => 'PEDIATRIA',
            'user_id' => '4',
        ]);
        //--------------------------------------------]
        User::create([
            'name' => 'Doctor1',
            'email' => 'doctor1@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123123'),
        ])->assignRole('doctor');
        Doctor::create([
            'nombres' => 'Doctor1',
            'apellidos' => 'Lewis',
            'telefono' => '432324324',
            'licencia_medica' => '777777',
            'especialidad' => 'ODONTOLOGIA',
            'user_id' => '5',
        ]);
        //--------------------------------------------]
        User::create([
            'name' => 'Doctor2',
            'email' => 'doctor2@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('11111111'),
        ])->assignRole('doctor');
        Doctor::create([
            'nombres' => 'Doctor2',
            'apellidos' => 'Lewis',
            'telefono' => '123123213',
            'licencia_medica' => '222222',
            'especialidad' => 'FISIOTERAPIA',
            'user_id' => '6',
        ]);
        //------------- USUARIOS ----------------]
        User::create([
            'name' => 'Fancisco Antonio Grijalba Osorio', // 'sexo'=> 'M', 'telefono'=>'314852684',
            'email' => 'francisco.grijalba@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123123'),
        ])->assignRole('usuario');

        User::create([
            'name' => 'Juan David Grijalba Osorio',
            // 'sexo'=> 'M','telefono'=>'314852685',
            'email' => 'juandavidgo1997@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123123'),
        ])->assignRole('blogger');

        User::create([
            'name' => 'Paciente',
            'email' => 'paciente@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123123'),
        ])->assignRole('paciente');

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@email.com',
            'password' => bcrypt('123123123'),
        ])->assignRole('usuario');
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@email.com',
            'password' => bcrypt('123123123'),
        ])->assignRole('usuario');
        //----------------- CONSULTORIO --------------------------
        Consultorio::create([
            'nombre' => 'PEDIATRIA',
            'ubicacion' => '1-1A',
            'capacidad' => '10',
            'telefono' => '316548',
            'especialidad' => 'PEDIATRIA',
            'estado' => 'A',
        ]);
        Consultorio::create([
            'nombre' => 'ODONTOLOGIA',
            'ubicacion' => '1-1A',
            'capacidad' => '10',
            'telefono' => '316548',
            'especialidad' => 'ODONTOLOGIA',
            'estado' => 'A',
        ]);
        Consultorio::create([
            'nombre' => 'pediatria',
            'ubicacion' => '1-1A',
            'capacidad' => '10',
            'telefono' => '316548',
            'especialidad' => 'pediatria',
            'estado' => 'A',
        ]);
        Consultorio::create([
            'nombre' => 'FISIOTERAPIA',
            'ubicacion' => '1-1A',
            'capacidad' => '10',
            'telefono' => '316548',
            'especialidad' => 'FISIOTERAPIA',
            'estado' => 'A',
        ]);

        User::factory()->create([
            'name' => 'blogger',
            'email' => 'bloger@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123123'),
        ])->assignRole('blogger');

        // User::create([
        //     'name'=>'Hebron Teacher',
        //     'sexo'=> 'M',
        //     'telefono'=>'314852686',
        //     'email'=> 'hebron.customer@email.com',
        //     'email_verified_at' => now(),           
        //     'password'=> bcrypt('123123123'),
        // ])->assignRole('Profesor');

        // User::create([
        //     'name'=>'Mario',
        //     'sexo'=> 'M',
        //     'telefono'=>'314852567',
        //     'email'=> 'mario@email.com',
        //     'email_verified_at' => now(),            
        //     'password'=> bcrypt('123123123'),
        // ])->assignRole('Alumno');

        // User::create([
        //     'name'=>'Alejandro',
        //     'sexo'=> 'M',
        //     'telefono'=>'314852568',
        //     'email'=> 'alejo@email.com',
        //     'email_verified_at' => now(),            
        //     'password'=> bcrypt('123123123'),
        // ])->assignRole('Alumno');

        User::factory(9)->create();
        /// CREACION DE HORARIOS
        Horario::create([
            'dia' => 'LUNES',
            'hora_inicio' => '8:00:00',
            'hora_fin' => '14:00:00',
            'doctor_id' => '1',
            'consultorio_id' => '1',
        ]);
    }
}
