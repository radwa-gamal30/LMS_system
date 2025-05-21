<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'create_user',
            'edit_user',
            'delete_user',
            'show_user',
            
            'create_course',
            'edit_course',
            'delete_course',
            'show_course',

            'create_lesson',
            'edit_lesson',
            'delete_lesson',
            // 'show_lesson',

            'show_course_lessons',
            
            'create_user_enrollments',
            'edit_user_enrollments',
            'delete_user_enrollments',
            
            'show_user_enrollments',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
   
    }
}
