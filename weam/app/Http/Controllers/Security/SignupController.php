<?php


namespace App\Http\Controllers\Security;

use \App\Http\Controllers\Controller;

class SignupController extends Controller
{
    /**
     * Allows to check signup information, send a verification code by email and return verification status of these information
     *
     * @return String
     */
    public function index(): String
    {
        return json_encode(['error' => 'There is an error on signup...']);
    }
}

?>
