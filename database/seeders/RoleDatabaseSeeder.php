<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $roles = [
             ['name'=>'super-admin', 'display_name'=>'Super Admin', 'group'=>'system'],
             ['name'=>'admin', 'display_name'=>'Admin', 'group'=>'system'],
             ['name'=>'employee', 'display_name'=>'Employee', 'group'=>'system'],
             ['name'=>'manager', 'display_name'=>'manager', 'group'=>'system'],
             ['name'=>'user', 'display_name'=>'user', 'group'=>'system'],
        ];

        foreach($roles as $role){
            Role::updateOrCreate($role);
        }
        $permissions = [
            ['name'=>'create-user', 'display_name'=>'Create User', 'group'=>'user'],
            ['name'=>'update-user', 'display_name'=>'Update User', 'group'=>'user'],
            ['name'=>'Show-user', 'display_name'=>'Show User', 'group'=>'user'],
            ['name'=>'Delete-user', 'display_name'=>'Delete User', 'group'=>'user'],

            ['name'=>'create-role', 'display_name'=>'Create role', 'group'=>'role'],
            ['name'=>'update-role', 'display_name'=>'Update role', 'group'=>'role'],
            ['name'=>'Show-role', 'display_name'=>'Show role', 'group'=>'role'],
            ['name'=>'Delete-role', 'display_name'=>'Delete role', 'group'=>'role'],

            ['name'=>'create-category', 'display_name'=>'Create category', 'group'=>'category'],
            ['name'=>'update-category', 'display_name'=>'Update category', 'group'=>'category'],
            ['name'=>'Show-category', 'display_name'=>'Show category', 'group'=>'category'],
            ['name'=>'Delete-category', 'display_name'=>'Delete category', 'group'=>'category'],

            ['name'=>'create-product', 'display_name'=>'Create product', 'group'=>'product'],
            ['name'=>'update-product', 'display_name'=>'Update product', 'group'=>'product'],
            ['name'=>'Show-product', 'display_name'=>'Show product', 'group'=>'product'],
            ['name'=>'Delete-product', 'display_name'=>'Delete product', 'group'=>'product'],

            ['name'=>'create-coupon', 'display_name'=>'Create coupon', 'group'=>'coupon'],
            ['name'=>'update-coupon', 'display_name'=>'Update coupon', 'group'=>'coupon'],
            ['name'=>'Show-coupon', 'display_name'=>'Show coupon', 'group'=>'coupon'],
            ['name'=>'Delete-coupon', 'display_name'=>'Delete coupon', 'group'=>'coupon'],


           
        ];
        foreach($permissions as $permission){
            Permission::updateOrCreate($permission);
        }
    }
}
