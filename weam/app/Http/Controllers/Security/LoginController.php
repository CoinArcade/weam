<?php

namespace App\Http\Controllers\Security;

use \App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Allows to check login information, start user session and return verification status of these information
     *
     * @return string
     */
    public function index(): string
    {
        return json_encode(['error'=> 'There is an error on login']);
    }
}
