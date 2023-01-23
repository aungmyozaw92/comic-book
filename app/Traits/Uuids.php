<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Webpatser\Uuid\Uuid;

trait Uuids
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            //if (! $model->getKey()) {
                // $model->{$model->getKeyName()} = Uuid::generate()->string;
            //}
            if (!$model->getKey()) {
                // Dynamically set the primary key
                $model->setAttribute($model->getKeyName(), Str::uuid()->toString());
            }
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}