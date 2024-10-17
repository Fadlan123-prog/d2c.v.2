<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Branch extends Model
{
    protected $table = 'branches';

    protected $fillable = ['name', 'address'];

    public $incrementing = false;

    protected $keyType = 'uuid';   // Specify that the key type is UUID

    // Automatically set the UUID when creating a new model instance
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = Str::uuid()->toString();  // Generate UUID
            }
        });
    }
}
