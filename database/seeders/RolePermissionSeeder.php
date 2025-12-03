<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createRoleIfNotExist();
        $this->updateOrCreatePermission();
        $this->syncRolesPermissions();
    }

    private function createRoleIfNotExist(): void
    {
        $roles = [
            [
                'name' => 'superadmin',
                'display_name' => 'Superadmin',
                'description' => 'Akses penuh ke semua fungsi sistem.',
            ],
            [
                'name' => 'project_officer',
                'display_name' => 'Pegawai Projek/ Penyelia Kontrak',
                'description' => 'Merekod maklumat projek, kemajuan kerja dan laporan pemantauan.',
            ],
            [
                'name' => 'finance_officer',
                'display_name' => 'Pegawai Kewangan/ Perakauanan (UPI dan Pegawai Penerima)',
                'description' => 'Memasukkan maklumat peruntukan dan rekod pembayaran.',
            ],
            [
                'name' => 'system_admin',
                'display_name' => 'Pentadbir Sistem (Admin ICT - UAG)',
                'description' => 'Menguruskan pengguna, kebenaran akses dan konfigurasi sistem.',
            ],
            [
                'name' => 'senior_management',
                'display_name' => 'Pengurusan Atasan (Pemantau-SUB)',
                'description' => 'Melihat laporan, status dan analisis prestasi projek.',
            ],
        ];

        // Create each role if not exist yet
        foreach ($roles as $role) {
            if (! Role::where('name', $role['name'])->exists()) {
                Role::create([
                    'name' => $role['name'],
                    'display_name' => $role['display_name'],
                    'description' => $role['description'],
                ]);
            }
        }
    }

    private function updateOrCreatePermission(): void 
    {
        $permissions = [
            [
                'name' => 'create-project',
                'display_name' => 'Create Project',
                'description' => 'Allows the user to create new projects in the system',
            ],
            [
                'name' => 'read-project',
                'display_name' => 'Read Project',
                'description' => 'Allows the user to create read projects in the system',
            ],
            [
                'name' => 'update-project',
                'display_name' => 'Update Project',
                'description' => 'Allows the user to update projects in the system',
            ],
            [
                'name' => 'delete-project',
                'display_name' => 'Delete Project',
                'description' => 'Allows the user to delete projects in the system',
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['name' => $permission['name']],
                [
                    'display_name' => $permission['display_name'],
                    'description' => $permission['description'],
                ],
            );
        }

        // Delete permissions that are not in the list anymore
        $permissionNames = array_column($permissions, 'name');
        Permission::whereNotIn('name', $permissionNames)->delete();
    }

    private function syncRolesPermissions(): void
    {
        $rolesPermissions = [
            'superadmin' => [
                'create-project',
                'read-project',
                'update-project',
                'delete-project',
            ],
            'project_officer' => [
                'create-project',
                'read-project',
                'update-project',
                'delete-project',
            ],
            'finance_officer' => [],
            'system_admin' => [],
            'senior_management' => [],
        ];

        foreach ($rolesPermissions as $role => $permissions) {
            $model = Role::where('name', $role)->first();
            $model->syncPermissions($permissions);
        }
    }
}
