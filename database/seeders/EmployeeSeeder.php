<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 3; $i++) {

            // Create the corresponding employee
            Employee::create([
                'name' => 'Employee ' . $i,
                'email' => 'employee' . $i . '@example.com',
                'joining_date' => now(),
                'department' => 'Department ' . $i,
                'designation' => 'Designation ' . $i,
                'status' => 'active'
            ]);
        }
    }
}
