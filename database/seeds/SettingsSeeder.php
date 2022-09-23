<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Patient;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('settings')->insert([
            'option_name' => 'system_name',
            'option_value' => 'Allo Cabinet',
        ]);

        DB::table('settings')->insert([
            'option_name' => 'title',
            'option_value' => 'Allo Cabinet',
        ]);

         DB::table('settings')->insert([
            'option_name' => 'address',
            'option_value' => '20 avenue de la Liberté, Tunis',
        ]);

         DB::table('settings')->insert([
            'option_name' => 'phone',
            'option_value' => '+21629844830',
        ]);

         DB::table('settings')->insert([
            'option_name' => 'cabinet_email',
            'option_value' => 'allo.cabinet@gmail.com',
        ]);

        DB::table('settings')->insert([
            'option_name' => 'currency',
            'option_value' => 'DT',
        ]);

        DB::table('settings')->insert([
            'option_name' => 'vat',
            'option_value' => '19',
        ]);

        DB::table('settings')->insert([
            'option_name' => 'language',
            'option_value' => 'fr',
        ]);

        DB::table('settings')->insert([
            'option_name' => 'appointment_interval',
            'option_value' => '30',
        ]);

        DB::table('settings')->insert([
            'option_name' => 'saturday_from',
            'option_value' => null,
        ]);
        DB::table('settings')->insert([
            'option_name' => 'saturday_to',
            'option_value' => null,
        ]);
        DB::table('settings')->insert([
            'option_name' => 'sunday_from',
            'option_value' => null,
        ]);
        DB::table('settings')->insert([
            'option_name' => 'sunday_to',
            'option_value' => null,
        ]);
        DB::table('settings')->insert([
            'option_name' => 'monday_from',
            'option_value' => '08:00',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'monday_to',
            'option_value' => '17:00',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'tuesday_from',
            'option_value' => '08:00',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'tuesday_to',
            'option_value' => '17:00',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'wednesday_from',
            'option_value' => '08:00',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'wednesday_to',
            'option_value' => '17:00',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'thursday_from',
            'option_value' => '08:00',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'thursday_to',
            'option_value' => '17:00',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'friday_from',
            'option_value' => '08:00',
        ]);
        DB::table('settings')->insert([
            'option_name' => 'friday_to',
            'option_value' => '17:00',
        ]);

        DB::table('settings')->insert([
            'option_name' => 'NEXMO_KEY',
            'option_value' => env('NEXMO_KEY'),
        ]);

        DB::table('settings')->insert([
            'option_name' => 'NEXMO_SECRET',
            'option_value' => env('NEXMO_SECRET'),
        ]);

        DB::table('settings')->insert([
            'option_name' => 'header_right',
            'option_value' => 'Allo Cabinet',
        ]);

        
        DB::table('settings')->insert([
            'option_name' => 'header_left',
            'option_value' => 'Docteur Eyette',
        ]);

        
        DB::table('settings')->insert([
            'option_name' => 'footer_right',
            'option_value' => '71 000 000',
        ]);

        
        DB::table('settings')->insert([
            'option_name' => 'footer_left',
            'option_value' => 'Tunis, Tunisie',
        ]);

        

        DB::table('users')->insert([
            'name' => 'doctor',
            'email' => 'doctor@gmail.com',
            'password' => Hash::make('doctor'),
            'role' => 'doctor',
        ]);


        DB::table('users')->insert([
            'name' => 'secretaire',
            'email' => 'secretaire@gmail.com',
            'password' => Hash::make('secretaire'),
            'role' => 'secretary',
        ]);

        $user = User::create([
            'name' => 'patient',
            'email' => 'patient@gmail.com',
            'password' => Hash::make('patient'),
            'role' => 'patient',
        ]);

        Patient::create([
            'user_id'=> $user->id,
            'birthday' => now()->subYears(30)->toDateString(),
            'phone' => 22333444,
            'gender'=> 'Homme',
             'blood' => 'A+',
             'adress' => 'Tunis',
            'weight'=> '70kg',
            'height' => '164'
        ]);
    }
}
