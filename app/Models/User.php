<?php

namespace App\Models;

use Cartalyst\Sentinel\Users\EloquentUser;

class User extends EloquentUser
{
    /**
     * Get the full name of the user.
     *
     * @return void
     */
    public function fullName()
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }
}