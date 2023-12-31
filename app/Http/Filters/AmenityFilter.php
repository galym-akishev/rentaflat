<?php

namespace App\Http\Filters;

use Illuminate\Contracts\Database\Eloquent\Builder;

class AmenityFilter extends AbstractFilter
{
    public const TITLE = 'title';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title']
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where(self::TITLE, 'like', "%{$value}%");
    }
}
