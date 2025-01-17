<?php

namespace App\Models;

use App\Models\Scopes\OrderByScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'gender',
        'date_of_birth',
        'profile_picture',
        'contact_no',
        'location',
    ];
    protected static function booted()
    {
        static::addGlobalScope(new OrderByScope());
    }
}
