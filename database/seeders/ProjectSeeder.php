<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'Project 1',
            'project_code' => 'PJ-001',
            'sst_date' => '2025-09-22',
            'jpict_number' => 'JPICT-02',
            'jpict_approval_date' => '2025-10-10',
            'contract_period' => '36 months',
            'start_date' => '2025-11-01',
            'end_date' => '2028-11-01',
            'contract_value' => '360000',
            'company_name' => 'Company A',
            'company_pic' => 'Alim Kassim',
            'department_owner' => 'IT Department',
            'project_owner' => 'Nasrudin Ali',
            'officer_in_charge' => 'Ismael Daud',
            'sealed_date' => '2025-10-15',
            'contract_status' => Project::STATUS_ACTIVE,
            'remarks' => 'Example project remarks',
        ]);
    }
}
