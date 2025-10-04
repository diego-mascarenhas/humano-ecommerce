<?php

namespace HumanoEcommerce\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class EcommercePermissionsSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		// Store permissions
		Permission::firstOrCreate(['name' => 'store.index']);
		Permission::firstOrCreate(['name' => 'store.list']);
		Permission::firstOrCreate(['name' => 'store.create']);
		Permission::firstOrCreate(['name' => 'store.show']);
		Permission::firstOrCreate(['name' => 'store.edit']);
		Permission::firstOrCreate(['name' => 'store.store']);
		Permission::firstOrCreate(['name' => 'store.update']);
		Permission::firstOrCreate(['name' => 'store.destroy']);

		// Product permissions
		Permission::firstOrCreate(['name' => 'product.index']);
		Permission::firstOrCreate(['name' => 'product.list']);
		Permission::firstOrCreate(['name' => 'product.create']);
		Permission::firstOrCreate(['name' => 'product.show']);
		Permission::firstOrCreate(['name' => 'product.edit']);
		Permission::firstOrCreate(['name' => 'product.store']);
		Permission::firstOrCreate(['name' => 'product.update']);
		Permission::firstOrCreate(['name' => 'product.destroy']);

		// Order permissions
		Permission::firstOrCreate(['name' => 'order.index']);
		Permission::firstOrCreate(['name' => 'order.list']);
		Permission::firstOrCreate(['name' => 'order.create']);
		Permission::firstOrCreate(['name' => 'order.show']);
		Permission::firstOrCreate(['name' => 'order.edit']);
		Permission::firstOrCreate(['name' => 'order.store']);
		Permission::firstOrCreate(['name' => 'order.update']);
		Permission::firstOrCreate(['name' => 'order.destroy']);

		// E-commerce general permissions
		Permission::firstOrCreate(['name' => 'ecommerce.index']);
		Permission::firstOrCreate(['name' => 'ecommerce.list']);
		Permission::firstOrCreate(['name' => 'ecommerce.create']);
		Permission::firstOrCreate(['name' => 'ecommerce.show']);
		Permission::firstOrCreate(['name' => 'ecommerce.edit']);
		Permission::firstOrCreate(['name' => 'ecommerce.store']);
		Permission::firstOrCreate(['name' => 'ecommerce.update']);
		Permission::firstOrCreate(['name' => 'ecommerce.destroy']);
		Permission::firstOrCreate(['name' => 'ecommerce.dashboard']);
		Permission::firstOrCreate(['name' => 'ecommerce.settings']);
	}
}

