<?php

namespace DetosphereLtd\LaravelFaqs\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUuid
{
    // TODO: extract to a package
    public static function bootHasUuid()
    {
        static::creating(function (Model $model) {
            $model->uuid = $model->uuid ?? Str::uuid();
        });
    }
}
