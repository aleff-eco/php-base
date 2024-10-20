<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        mb_internal_encoding('UTF-8');
        Person::create([
            'names'             => mb_convert_case('FERNANDO DANIEL' , MB_CASE_TITLE),
            'surnames'          => mb_convert_case('GARCIA ALVAREZ', MB_CASE_TITLE),
        ]);
        
    }
}
