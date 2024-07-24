<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'id' => 1,
                'name' => 'Sales and marketing',
            ],
            [
                'id' => 2,
                'name' => 'Application development',
            ],
        ];

        foreach ($departments as $department) {
            $dep =  Department::find($department['id']);
            if ($dep) {
                $dep->name = $department['name'];
                $dep->save();
            } else {
                Department::create(['id' => $department['id'], 'name' => $department['name']]);
            }
        }
    }
}
