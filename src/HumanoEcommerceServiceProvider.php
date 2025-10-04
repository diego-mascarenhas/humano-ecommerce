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
				$permissions = [
					'store.list',
					'product.list',
					'order.list',
				];

				foreach ($permissions as $name) {
					Permission::firstOrCreate(['name' => $name], ['guard_name' => 'web']);
				}

				$adminRole = class_exists(Role::class) ? Role::where('name', 'admin')->first() : null;
				if ($adminRole) {
					$adminRole->givePermissionTo($permissions);
				}
			}
		} catch (\Throwable $e) {
			Log::debug('HumanoEcommerce: permissions setup skipped: ' . $e->getMessage());
		}
	}
}


