<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'department_id' => 1,
                'designation_id' => 1,
                'name' => 'John doe',
                'phone_number' => 958887771
            ],
            [
                'id' => 2,
                'department_id' => 2,
                'designation_id' => 2,
                'name' => 'Samual',
                'phone_number' => 964885552
            ],
            [
                'id' => 3,
                'department_id' => 1,
                'designation_id' => 1,
                'name' => 'George',
                'phone_number' => 993684552
            ],
            [
                'id' => 4,
                'department_id' => 2,
                'designation_id' => 2,
                'name' => 'Sam',
                'phone_number' => 9968545552
            ],
        ];

        foreach ($users as $user) {
            $des =  User::find($user['id']);
            if ($des) {
                $des->department_id = $user['department_id'];
                $des->designation_id = $user['designation_id'];
                $des->name = $user['name'];
                $des->phone_number = $user['phone_number'];
                $des->save();
            } else {
                User::create([
                    'id' => $user['id'],
                    'department_id' => $user['department_id'],
                    'designation_id' => $user['designation_id'],
                    'name' => $user['name'],
                    'phone_number' => $user['phone_number'],
                ]);
            }
        }
    }
}
