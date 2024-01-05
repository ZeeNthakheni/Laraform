<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\SubmissionsFactory;

class submissions extends Model
{
    use HasFactory;
    protected static function newFactory(): Factory
    {
        return SubmissionsFactory::new();
    }
}


