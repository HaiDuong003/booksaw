<?php

namespace App\MoonShine\Resources;

use App\Models\Book;
use App\Models\Category;

use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\Select;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\Resource;
use MoonShine\Actions\FiltersAction;
use Illuminate\Database\Eloquent\Model;

class BookResource extends Resource
{
    public static string $model = Book::class;

    public static string $title = 'Books';

    public function fields(): array
    {
        // convert category begin
        $categoryArrays = Category::select('id', 'name')->get()->map(function ($category) {
            return $category->toArray();
        });
        $categories = $categoryArrays->toArray();
        $idCategory = array_column($categories, 'id');
        $nameCategory = array_column($categories, 'name');
        $resultCategory = array_combine($idCategory, $nameCategory);
        // convert category end
        return [
            ID::make()->sortable(),
            Text::make('Title', 'title')->required(),
            Image::make('Image', 'cover')->required()
                ->dir('/')
                ->disk('public')
                ->allowedExtensions(['jpg', 'gif', 'png']),
            Number::make('Price', 'price')->required()
                ->min(1),
            Textarea::make('Description', 'description')->required(),
            Select::make('Languages', 'languages')
                ->options([
                    'Vietnamese' => 'Tiếng Việt',
                    'English' => 'Tiếng Anh'
                ])->required(),
            Select::make('Category', 'category_id')
                ->options($resultCategory)->required(),
            Text::make('Author', 'author')->required()->required(),
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
