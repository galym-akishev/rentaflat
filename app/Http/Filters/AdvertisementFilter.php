<?php

namespace App\Http\Filters;

use Illuminate\Contracts\Database\Eloquent\Builder;

class AdvertisementFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const DESCRIPTION = 'description';
    public const PRICE = 'price';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::DESCRIPTION => [$this, 'description'],
            self::PRICE => [$this, 'price'],
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where(self::TITLE, 'like', "%{$value}%");
    }
    public function description(Builder $builder, $value)
    {
        $builder->where(self::DESCRIPTION, 'like', "%{$value}%");
    }
    public function price(Builder $builder, $value)
    {
        $builder->where(self::PRICE, $value);
    }
}
