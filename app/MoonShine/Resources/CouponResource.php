<?php

namespace App\MoonShine\Resources;

use App\Models\Coupon;
use MoonShine\Fields\ID;

use MoonShine\Fields\Text;
use MoonShine\Fields\Number;
use MoonShine\Resources\Resource;
use MoonShine\Actions\FiltersAction;
use Illuminate\Database\Eloquent\Model;

class CouponResource extends Resource
{
    public static string $model = Coupon::class;

    public static string $title = 'Coupons';

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Code', 'coupon')->required(),
            Number::make('Percen', 'value')->required()
                ->min(1)
                ->max(100)
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }

    public function search(): array
    {
        return ['id'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
