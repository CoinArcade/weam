<?php

namespace App\Http\Controllers\Security;

use \App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Allows to check login information, start user session and return verification status of these information
     *
     * @return string
     */
    public function index(Request $request): string
    {
        if ($request->_token === csrf_token()) {

            return json_encode(['success' => 'login']);

        } else {
            return json_encode(['error'=> 'Invalid token']);
        }
    }
}
