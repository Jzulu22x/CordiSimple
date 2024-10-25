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
            ['name' => 'active', 'description' => 'currently active'],
            ['name' => 'cancelled', 'description' => 'currently cancelled'],
        ];

        foreach ($statuses as $state) {
            Status::create($state);
        }
    }
}
