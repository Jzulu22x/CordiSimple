<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['name' => 'activado', 'description' => 'actualmente activo'],
            ['name' => 'cancelado', 'description' => 'actualmente cancelado'],
        ];

        foreach ($statuses as $state) {
            Status::create($state);
        }
    }
}
