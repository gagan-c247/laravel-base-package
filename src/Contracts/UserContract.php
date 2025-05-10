<?php

namespace c247\codebank\Contracts;

interface UserContract
{
    // Define any methods you want to enforce for the User model
    public function userDetails();
    public function setFirstNameAttribute($value);
}
