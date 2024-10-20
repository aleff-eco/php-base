<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        mb_internal_encoding('UTF-8');
        Status::create(['order' => 1, 'status_type_id' => 1, 'name' => mb_convert_case('Activo', MB_CASE_TITLE)]);
        Status::create(['order' => 2, 'status_type_id' => 1, 'name' => mb_convert_case('Inactivo', MB_CASE_TITLE)]);
        Status::create(['order' => 3, 'status_type_id' => 1, 'name' => mb_convert_case('Eliminado', MB_CASE_TITLE)]);

        Status::create(['id' => 4, 'name' => mb_convert_case('Activo', MB_CASE_TITLE), 'order' => 1, 'status_type_id' => 2, 'created_at' => Carbon::parse('2024-08-19 16:20:00'), 'updated_at' => Carbon::parse('2024-08-19 16:20:00')]);
        Status::create(['id' => 5, 'name' => mb_convert_case('Inactivo', MB_CASE_TITLE), 'order' => 2, 'status_type_id' => 2, 'created_at' => Carbon::parse('2024-08-19 16:20:00'), 'updated_at' => Carbon::parse('2024-08-19 16:20:00')]);

        Status::create(['id' => 6, 'name' => mb_convert_case('Activo', MB_CASE_TITLE), 'order' => 1, 'status_type_id' => 3, 'created_at' => Carbon::parse('2024-08-19 16:20:00'), 'updated_at' => Carbon::parse('2024-08-19 16:20:00')]);
        Status::create(['id' => 7, 'name' => mb_convert_case('Inactivo', MB_CASE_TITLE), 'order' => 2, 'status_type_id' => 3, 'created_at' => Carbon::parse('2024-08-19 16:20:00'), 'updated_at' => Carbon::parse('2024-08-19 16:20:00')]);

        Status::create(['id' => 12, 'name' => mb_convert_case('Pagado', MB_CASE_TITLE), 'order' => 1, 'status_type_id' => 4, 'created_at' => Carbon::parse('2024-08-19 16:20:00'), 'updated_at' => Carbon::parse('2024-08-19 16:20:00')]);
        Status::create(['id' => 13, 'name' => mb_convert_case('Cancelado', MB_CASE_TITLE), 'order' => 2, 'status_type_id' => 4, 'created_at' => Carbon::parse('2024-08-19 16:20:00'), 'updated_at' => Carbon::parse('2024-08-19 16:20:00')]);
        Status::create(['id' => 14, 'name' => mb_convert_case('Orden Generada', MB_CASE_TITLE), 'order' => 3, 'status_type_id' => 4, 'created_at' => Carbon::parse('2024-08-19 16:20:00'), 'updated_at' => Carbon::parse('2024-08-19 16:20:00')]);
        Status::create(['id' => 15, 'name' => mb_convert_case('Comprobando Pago', MB_CASE_TITLE), 'order' => 3, 'status_type_id' => 4, 'created_at' => Carbon::parse('2024-08-19 16:20:00'), 'updated_at' => Carbon::parse('2024-08-19 16:20:00')]);
        Status::create(['id' => 16, 'name' => mb_convert_case('Error De Pago', MB_CASE_TITLE), 'order' => 4, 'status_type_id' => 4, 'created_at' => Carbon::parse('2024-08-19 16:20:00'), 'updated_at' => Carbon::parse('2024-08-19 16:20:00')]);
        Status::create(['id' => 17, 'name' => mb_convert_case('Pedido En Proceso', MB_CASE_TITLE), 'order' => 5, 'status_type_id' => 4, 'created_at' => Carbon::parse('2024-08-19 16:20:00'), 'updated_at' => Carbon::parse('2024-08-19 16:20:00')]);
        Status::create(['id' => 18, 'name' => mb_convert_case('Pedido Listo', MB_CASE_TITLE), 'order' => 5, 'status_type_id' => 4, 'created_at' => Carbon::parse('2024-08-19 16:20:00'), 'updated_at' => Carbon::parse('2024-08-19 16:20:00')]);
        Status::create(['id' => 19, 'name' => mb_convert_case('Pedido Enviado', MB_CASE_TITLE), 'order' => 5, 'status_type_id' => 4, 'created_at' => Carbon::parse('2024-08-19 16:20:00'), 'updated_at' => Carbon::parse('2024-08-19 16:20:00')]);
        Status::create(['id' => 20, 'name' => mb_convert_case('Pedido Finalizado', MB_CASE_TITLE), 'order' => 5, 'status_type_id' => 4, 'created_at' => Carbon::parse('2024-08-19 16:20:00'), 'updated_at' => Carbon::parse('2024-08-19 16:20:00')]);

        Status::create(['id' => 21, 'name' => mb_convert_case('Activo', MB_CASE_TITLE), 'order' => 1, 'status_type_id' => 5, 'created_at' => Carbon::parse('2024-08-19 16:20:00'), 'updated_at' => Carbon::parse('2024-08-19 16:20:00')]);
        Status::create(['id' => 22, 'name' => mb_convert_case('Inactivo', MB_CASE_TITLE), 'order' => 2, 'status_type_id' => 5, 'created_at' => Carbon::parse('2024-08-19 16:20:00'), 'updated_at' => Carbon::parse('2024-08-19 16:20:00')]);
        Status::create(['id' => 23, 'name' => mb_convert_case('Eliminado', MB_CASE_TITLE), 'order' => 3, 'status_type_id' => 5, 'created_at' => Carbon::parse('2024-08-19 16:20:00'), 'updated_at' => Carbon::parse('2024-08-19 16:20:00')]);
    }
}
