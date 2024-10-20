<?php

namespace Database\Seeders;

use App\Models\StatusType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StatusTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        mb_internal_encoding('UTF-8');

        StatusType::create([
            'id' => 1, 
            'name' => mb_convert_case('Usuarios', MB_CASE_TITLE), 
            'created_at' => Carbon::parse('2024-08-15 15:38:59'), 
            'updated_at' => Carbon::parse('2024-08-15 15:38:59')
        ]);

        StatusType::create([
            'id' => 2, 
            'name' => mb_convert_case('Productos', MB_CASE_TITLE), 
            'created_at' => Carbon::parse('2024-08-15 16:20:00'), 
            'updated_at' => Carbon::parse('2024-08-15 16:20:00')
        ]);

        StatusType::create([
            'id' => 3, 
            'name' => mb_convert_case('Precios', MB_CASE_TITLE), 
            'created_at' => Carbon::parse('2024-08-15 16:20:00'), 
            'updated_at' => Carbon::parse('2024-08-15 16:20:00')
        ]);

        StatusType::create([
            'id' => 4, 
            'name' => mb_convert_case('Compras', MB_CASE_TITLE), 
            'created_at' => Carbon::parse('2024-08-15 16:20:00'), 
            'updated_at' => Carbon::parse('2024-08-15 16:20:00')
        ]);

        StatusType::create([
            'id' => 5, 
            'name' => mb_convert_case('Direcciones', MB_CASE_TITLE), 
            'created_at' => Carbon::parse('2024-08-15 16:20:00'), 
            'updated_at' => Carbon::parse('2024-08-15 16:20:00')
        ]);
    }
}
