<?php

namespace App\Http\Filters;

use Illuminate\Contracts\Database\Eloquent\Builder;

class UserFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const EMAIL = 'email';
    public const ROLE = 'role';

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::EMAIL => [$this, 'email'],
            self::ROLE => [$this, 'role'],
        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where(self::NAME, 'like', "%{$value}%");
    }

    public function email(Builder $builder, $value)
    {
        $builder->where(self::EMAIL, 'like', "%{$value}%");
    }

    public function role(Builder $builder, $value)
    {
        $builder->where(self::ROLE);
    }
}
