<?php

/**
 * Class Member_m
 *
 * Model for interacting with member data.
 */
class Member_m extends MY_Model {

    protected $_table = 'member';
    protected $primary_key = 'member_id';

    protected $belongs_to = array('user' => array('model' => 'user_m'));
    protected $has_many = array('modules' => array('model' => 'module_m'));

}