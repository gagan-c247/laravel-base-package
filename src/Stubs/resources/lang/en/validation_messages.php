<?php

return [
    'signup' => [
        'username' => [
            'required' => 'Username field is required.',
            'unique' => 'This username is already taken, please enter a different username.',
            'valid' => 'Username can only have alphabets, numbers, -(dashes), and .(dot).',
        ],
        'full_name' => [
            'required' => 'Full name field is required.',
        ],
        'first_name' => [
            'required' => 'First name field is required.',
            'valid' => 'First name is required and it must contain alphabets only (but should accept .(dot)).',
        ],
        'last_name' => [
            'required' => 'Last name is required and it must contain alphabets only.',
        ],
        'email' => [
            'required' => 'Email field is required.',
            'valid' => 'Please enter a valid email address.',
            'exists' => 'This email address is already registered with us. Please try to register with another email address.',
        ],
        'password' => [
            'required' => 'Password field is required.',
            'min' => 'Password should be at least 8 characters long.',
            'max' => 'Password should be at most 15 characters long.',
            'strength' => 'Password should be at least 6 characters long, including a number and letters.',
        ],
        'confirm_password' => [
            'min' => 'Confirmed password should be at least 6 characters long.',
            'match' => 'Password and confirm password didn\'t match.',
        ],
    ],

    'login' => [
        'email' => [
            'required' => 'Email field is required.',
            'valid' => 'Email field must contain a valid email address.',
            'not_registered' => 'Email does not exist.',
        ],
        'password' => [
            'required' => 'Password field is required.',
            'min' => 'Password field must be at least 8 characters in length.',
            'incorrect' => 'Invalid email or password.',
        ],
        'account' => [
            'banned' => 'Your account has been banned. Please contact the admin for further details.',
            'deactivated' => 'Your account has been deactivated. Please contact the admin for further details.',
            'already_logged_in' => 'You\'re already logged in from another device.',
        ],
    ],

    'forgot_password' => [
        'email' => [
            'required' => 'Email field is required.',
            'valid' => 'Email field must contain a valid email address.',
            'sent' => 'We have emailed you a password reset link.',
            'not_registered' => 'Email does not exist.',
        ],
    ],

    'change_password' => [
        'success' => 'Password changed successfully.',
        'old_password_incorrect' => 'Incorrect old password.',
        'password' => [
            'required' => 'Password field is required.',
            'min' => 'Password should be at least 8 characters long.',
            'max' => 'Password should be at most 15 characters long.',
        ],
        'confirmation' => 'Confirm passwords do not match.',
    ],

    'reset_password' => [
        'confirm_mismatch' => 'Password does not match.',
        'token_expired' => 'Your token has expired. Please try again with a new one.',
    ],

    'profile' => [
        'updated' => 'Profile details updated successfully.',
        'account_updated' => 'Account details updated successfully.',
    ],

    'subscription_details' => [
        'cancel_plan' => 'Are you sure you want to cancel your {Plan Name} subscription?',
    ],

    'billing_details' => [
        'first_name' => 'First name is required.',
        'last_name' => 'Last name is required.',
        'company_name' => 'Company name is required.',
        'address' => 'Street address is required.',
        'city' => 'City is required.',
        'postal_code' => 'Postal code is required.',
        'country' => 'Country is required.',
    ],

    'support' => [
        'feedback' => 'Thank you for your message. We will get back to you shortly.',
        'message_required' => 'Message field is required.',
    ],

    'newsletter' => [
        'email_required' => 'Email field is required.',
        'valid_email' => 'Email field must contain a valid email address.',
        'subscribed' => 'Subscribed successfully.',
    ],

    'ssn' => [
        'required' => 'SSN is required.',
        'length' => 'Text length is max 12 and min 0 (allow alphanumeric).',
    ],

    'tax' => [
        'required' => 'Tax number is required (if mandatory).',
        'length' => 'Text length will be max 11 digits and min 0 (digits only).',
    ],
    'global' => [
        'strongPassword' => 'Password must contain a lowercase, uppercase, digit, and special character.',
        'validPhone' => 'Please enter a valid phone number.',
        'fileSize2MB' => 'File size must not exceed 2MB.',
        'noSpecialChars' => 'Special characters are not allowed.',
        'noSpaces' => 'No spaces are allowed.',
    ],
    'edit_profile' => [
        'full_name_required' => 'Full name is required.',
        'email_required' => 'Email is required.',
        'phone_required' => 'Phone number is required.',
        'location_required' => 'Location is required.',
    ]
];
