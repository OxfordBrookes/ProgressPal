<?php

class User_m extends MY_Model {

    protected $_table = 'user';
    
    protected $primary_key = 'user_id';

    /**
     * Produce a password hash.
     *
     * @param $password
     * @param $email
     * @param $created
     */
    public function hash($password, $email, $created)
    {
        $password = str_split($password, (strlen($password) / 2) + 1);
        return hash('whirlpool', $email.$password[0] . 'bananarama' . $password[1] . 'dska2' . $created);
    }

}