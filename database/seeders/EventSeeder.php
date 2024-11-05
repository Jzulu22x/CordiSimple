<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $event=[
            [
                'name' => 'Conferencia de Tecnología',
                'description' => 'Evento anual sobre los últimos avances en tecnología.',
                'date_time' => Carbon::create(2024, 12, 5),
                'location' => 'Centro de Convenciones',
                'people_capacity' => 200,
                'status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Feria de Emprendimiento',
                'description' => 'Evento para conectar emprendedores con inversores.',
                'date_time' => Carbon::create(2024, 11, 10),
                'location' => 'Pabellón de Exposiciones',
                'people_capacity' => 150,
                'status_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Concierto al Aire Libre',
                'description' => 'Concierto de bandas locales en el parque central.',
                'date_time' => Carbon::create(2024, 12, 20),
                'location' => 'Parque Central',
                'people_capacity' => 500,
                'status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($event as $eventData) {
            Event::firstOrCreate(
                ['name' => $eventData['name']],
                [
                    'description' => $eventData['description'],
                    'date_time' => $eventData['date_time'],
                    'location' => $eventData['location'],
                    'people_capacity' => $eventData['people_capacity'],
                    'status_id' => $eventData['status_id'],
                    'created_at' => $eventData['created_at'],
                    'updated_at' => $eventData['updated_at'],
                ]
            );
        }
    }
}
