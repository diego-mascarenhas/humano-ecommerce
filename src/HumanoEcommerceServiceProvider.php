<?php

namespace Idoneo\HumanoEcommerce;

use Idoneo\HumanoEcommerce\Models\SystemModule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HumanoEcommerceServiceProvider extends PackageServiceProvider
{
	public function configurePackage(Package $package): void
	{
		$package
			->name('humano-ecommerce')
			->hasViews()
			->hasRoutes('web')
			->hasMigrations([
				'create_stores_table',
				'create_products_table',
				'create_orders_table',
				'create_order_items_table',
			]);
	}

	public function bootingPackage(): void
	{
		parent::bootingPackage();

		try {
			if (Schema::hasTable('modules')) {
				if (class_exists(\App\Models\Module::class)) {
					\App\Models\Module::updateOrCreate(
						['key' => 'ecommerce'],
						[
							'name' => 'E-commerce',
							'icon' => 'ti ti-shopping-cart',
							'description' => 'E-commerce module (stores, products, orders)',
							'is_core' => false,
							'status' => 1,
						]
					);
				} else {
					SystemModule::query()->updateOrCreate(
						['key' => 'ecommerce'],
						[
							'name' => 'E-commerce',
							'icon' => 'ti ti-shopping-cart',
							'description' => 'E-commerce module (stores, products, orders)',
							'is_core' => false,
							'status' => 1,
						]
					);
				}
			}
		} catch (\Throwable $e) {
			Log::debug('HumanoEcommerce: module registration skipped: ' . $e->getMessage());
		}

		// Ensure permissions exist for menus and access
		try {
			if (Schema::hasTable('permissions') && class_exists(Permission::class)) {
				// Run the permissions seeder
				if (class_exists(\HumanoEcommerce\Database\Seeders\EcommercePermissionsSeeder::class)) {
					(new \HumanoEcommerce\Database\Seeders\EcommercePermissionsSeeder())->run();
				}

				// Grant all ecommerce permissions to admin role
				$adminRole = class_exists(Role::class) ? Role::where('name', 'admin')->first() : null;
				if ($adminRole) {
					$ecommercePermissions = Permission::where(function($query) {
						$query->where('name', 'LIKE', 'store.%')
							->orWhere('name', 'LIKE', 'product.%')
							->orWhere('name', 'LIKE', 'order.%')
							->orWhere('name', 'LIKE', 'ecommerce.%');
					})->pluck('name')->toArray();
					
					if (!empty($ecommercePermissions)) {
						$adminRole->givePermissionTo($ecommercePermissions);
					}
				}
			}
		} catch (\Throwable $e) {
			Log::debug('HumanoEcommerce: permissions setup skipped: ' . $e->getMessage());
		}
	}
}


