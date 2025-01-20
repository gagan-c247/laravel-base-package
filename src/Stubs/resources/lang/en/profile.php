<?php
return [
    'edit_profile' => [
        'name' => [
            'required' => 'Full name is required.',
            'minlength' => 'Full name must be at least 3 characters long.',
            'maxlength' => 'Maximum 50 characters allowed for the name.',
        ],
        'email' => [
            'required' => 'Email is required.',
            'email' => 'Please enter a valid email address.',
        ],
        'contact_no' => [
            'required' => 'Phone number is required.',
            'digits' => 'Phone number must contain only digits.',
            'minlength' => 'Phone number must be exactly 10 digits.',
            'maxlength' => 'Phone number must be exactly 10 digits.',
        ],
        'location' => [
            'required' => 'Location is required.',
            'minlength' => 'Location must be at least 3 characters long.',
            'maxlength' => 'Maximum 50 characters allowed for the location.',
        ],
    ],
    'change_password' => [
        'strongPassword' => 'Password must be at least 2 characters long and include alphanumeric characters.',
        'confirmation' => 'Password confirmation does not match the new password.',
    ],
];
