<?php

namespace c247\codebank\Traits;

use App\Models\UserDetail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Permission\Traits\HasRoles;

trait UserTrait
{
    use HasRoles;

    public function userDetails(): HasOne
    {
        return $this->hasOne(UserDetail::class);
    }

    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst($value);
    }
}
