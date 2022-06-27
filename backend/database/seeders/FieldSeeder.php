<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = [
            ['title' => 'address', 'type' => Field::STRING],
            ['title' => 'no of guests', 'type' => Field::NUMBER],
            ['title' => 'booking date', 'type' => Field::DATE],
            ['title' => 'are you bringing your own drinks?', 'type' => Field::BOOLEAN]
        ];

        foreach($fields as $field){
            Field::firstOrCreate($field);
        }
    }
}
