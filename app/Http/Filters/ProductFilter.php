<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const CATEGORY = 'category_id';
    public const IS_AVIALABLE = 'is_avialable';
    public const RAITING = 'raiting';
    public const PRICE_FROM = 'price_from';
    public const PRICE_TO = 'price_to';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::CATEGORY => [$this, 'categoryId'],
            self::IS_AVIALABLE => [$this, 'isAvialable'],
            self::RAITING => [$this, 'raiting'],
            self::PRICE_FROM => [$this, 'priceFrom'],
            self::PRICE_TO => [$this, 'priceTo']
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function categoryId(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }

    public function isAvialable(Builder $builder, $value)
    {
        $builder->where('is_avialable', $value);
    }

    public function raiting(Builder $builder, $value)
    {
        $builder->where('raiting', $value);
    }
    public function priceFrom(Builder $builder, $value)
    {
        $builder->where('price', '>=' , $value);
    }
    public function priceTo(Builder $builder, $value)
    {
        $builder->where('price', '<=' , $value);
    }
}
