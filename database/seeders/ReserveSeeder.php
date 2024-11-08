<?php

namespace Database\Seeders;

use App\Models\Reserve;
use Illuminate\Database\Seeder;

class ReserveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reserves = [
            [
                'event_id' => 1,
                'status_id' => 1,
                'user_id' => 1,
            ],
            [
                'event_id' => 2,
                'status_id' => 2,
                'user_id' => 1,
            ],
            [
                'event_id' => 2,
                'status_id' => 2,
                'user_id' => 2,
            ],
            [
                'event_id' => 2,
                'status_id' => 2,
                'user_id' => 2,
            ],
            [
                'event_id' => 2,
                'status_id' => 2,
                'user_id' => 3,
            ],
            [
                'event_id' => 2,
                'status_id' => 2,
                'user_id' => 3,
            ],
            [
                'event_id' => 2,
                'status_id' => 2,
                'user_id' => 4,
            ],
            [
                'event_id' => 2,
                'status_id' => 2,
                'user_id' => 4,
            ]
        ];

        foreach ($reserves as $reserve) {
            Reserve::create([
                'event_id' => $reserve['event_id'],
                'status_id' => $reserve['status_id'],
                'user_id' => $reserve['user_id'],
            ]);
        }
    }
}
