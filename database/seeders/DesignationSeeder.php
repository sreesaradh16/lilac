<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $designations = [
            [
                'id' => 1,
                'name' => 'Marketing Manager',
            ],
            [
                'id' => 2,
                'name' => 'Software Engineer',
            ],
        ];

        foreach ($designations as $designation) {
            $des =  Designation::find($designation['id']);
            if ($des) {
                $des->name = $designation['name'];
                $des->save();
            } else {
                Designation::create(['id' => $designation['id'], 'name' => $designation['name']]);
            }
        }
    }
}
