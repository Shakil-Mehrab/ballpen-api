<?php

namespace App\Future\Auth\User;

use App\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    protected function passwordRules()
    {
        return ['required', 'string', 'confirmed'];
        // return ['required', 'string', new Password(), 'confirmed'];
    }
}
