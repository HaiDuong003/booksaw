<?php

namespace App\Providers;

use App\Models\Order;
use App\MoonShine\Pages\OrderPage;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuItem;
use MoonShine\Menu\MenuGroup;
use MoonShine\Resources\CustomPage;
use Illuminate\Support\ServiceProvider;
use App\MoonShine\Resources\BookResource;
use App\MoonShine\Resources\OrderResource;
use App\MoonShine\Resources\CouponResource;
use App\MoonShine\Resources\CategoryResource;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        app(MoonShine::class)->menu([
            MenuGroup::make('moonshine::ui.resource.system', [
                MenuItem::make('moonshine::ui.resource.admins_title', new MoonShineUserResource())
                    ->translatable()
                    ->icon('users'),
                MenuItem::make('moonshine::ui.resource.role_title', new MoonShineUserRoleResource())
                    ->translatable()
                    ->icon('bookmark'),
            ])->translatable(),

            // MenuItem::make('Documentation', 'https://laravel.com')
            //     ->badge(fn () => 'Check'),
            MenuItem::make('Books', new BookResource()),
            MenuItem::make('Category', new CategoryResource()),
            MenuItem::make('Coupon', new CouponResource()),
            // MenuItem::make('Order', new OrderResource()),
            MenuItem::make('Order Page', new OrderPage())
        ]);
    }
}
