<?php

use Illuminate\Database\Seeder;
use Ultraware\Roles\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createPatientPermission = Permission::create([
            'name' => 'Create patient',
            'slug' => 'create.patient',
            'description' => 'can register new patient',
        ]);

        $modifyPatientPermission = Permission::create([
            'name' => 'modify patient',
            'slug' => 'modify.patient',
            'description' => 'can update patient details',
        ]);

        $deletePatientPermission = Permission::create([
            'name' => 'delete patient',
            'slug' => 'delete.patient',
            'description' => 'can delete patient',
        ]);

        $viewPatientPermission = Permission::create([
            'name' => 'view patient',
            'slug' => 'view.patient',
            'description' => 'can view patient',
        ]);

        $searchPatientPermission = Permission::create([
            'name' => 'Search patient',
            'slug' => 'search.patient',
            'description' => 'can search for a patient',
        ]);

        $createUsersPermission = Permission::create([
            'name' => 'Create users',
            'slug' => 'create.users',
            'description' => 'can register new user',
        ]);

        $modifyUsersPermission = Permission::create([
            'name' => 'modify user',
            'slug' => 'modify.user',
            'description' => 'can update user details',
        ]);
        
        $deleteUsersPermission = Permission::create([
            'name' => 'Delete users',
            'slug' => 'delete.users',
        ]);

        $viewUsersPermission = Permission::create([
            'name' => 'view user',
            'slug' => 'view.user',
            'description' => 'can view user',
        ]);

        $createRequestPermission = Permission::create([
            'name' => 'Create request',
            'slug' => 'create.request',
            'description' => 'can create new request',
        ]);

        $modifyRequestPermission = Permission::create([
            'name' => 'modify request',
            'slug' => 'modify.request',
            'description' => 'can update request details',
        ]);

        $deleteRequestPermission = Permission::create([
            'name' => 'delete request',
            'slug' => 'delete.request',
            'description' => 'can delete request',
        ]);

        $viewRequestPermission = Permission::create([
            'name' => 'view request',
            'slug' => 'view.request',
            'description' => 'can view request',
        ]);

        $modifyPaymentPermission = Permission::create([
            'name' => 'Update payment',
            'slug' => 'update.payment',
            'description' => 'can update payment details',
        ]);

        $viewPaymentPermission = Permission::create([
            'name' => 'view payment',
            'slug' => 'view.payment',
            'description' => 'can view payment',
        ]);
    }
}
