<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // create user
        $admin = Role::create(['name' => 'admin']);
        $guest = Role::create(['name' => 'guest']);






        Permission::create(['name' => 'categories.index'])
            ->syncRoles([$admin, $guest]);
        Permission::create(['name' => 'categories.create'])
            ->syncRoles($admin);
        Permission::create(['name' => 'categories.store'])
            ->syncRoles($admin);
        Permission::create(['name' => 'categories.update'])
            ->syncRoles($admin);
        Permission::create(['name' => 'categories.edit'])
            ->syncRoles($admin);
        Permission::create(['name' => 'categories.destroy'])
            ->syncRoles($admin);
        Permission::create(['name' => 'categories.show'])
            ->syncRoles($admin);

        Permission::create(['name' => 'products.index'])
            ->syncRoles([$admin, $guest]);
        Permission::create(['name' => 'products.create'])
            ->syncRoles($admin);
        Permission::create(['name' => 'products.store'])
            ->syncRoles($admin);
        Permission::create(['name' => 'products.edit'])
            ->syncRoles($admin);
        Permission::create(['name' => 'products.destroy'])
            ->syncRoles($admin);
        Permission::create(['name' => 'products.update'])
            ->syncRoles($admin);
        Permission::create(['name' => 'products.show'])
            ->syncRoles($admin);

        Permission::create(['name' => 'barcodes.index'])
            ->syncRoles($admin);
        Permission::create(['name' => 'barcodes.create'])
            ->syncRoles($admin);
        Permission::create(['name' => 'barcodes.store'])
            ->syncRoles($admin);
        Permission::create(['name' => 'barcodes.update'])
            ->syncRoles($admin);
        Permission::create(['name' => 'barcodes.edit'])
            ->syncRoles($admin);
        Permission::create(['name' => 'barcodes.show'])
            ->syncRoles($admin);

        Permission::create(['name' => 'barcodes.destroy'])
            ->syncRoles($admin);


        Permission::create(['name' => 'prices.index'])
            ->syncRoles($admin);
        Permission::create(['name' => 'prices.create'])
            ->syncRoles($admin);
        Permission::create(['name' => 'prices.store'])
            ->syncRoles($admin);
        Permission::create(['name' => 'prices.edit'])
            ->syncRoles($admin);
        Permission::create(['name' => 'prices.update'])
            ->syncRoles($admin);
        Permission::create(['name' => 'prices.destroy'])
            ->syncRoles($admin);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('admin');
        User::factory()->create([
            'name' => 'guest',
            'email' => 'guest@guest.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('guest');;
    }
}
