<?php

/**
 * Class Module_m
 */
class Module_m extends MY_Model {

    protected $_table = 'module';
    protected $primary_key = 'module_id';
    
    protected $belongs_to = array('user' => array('model' => 'user_m'));

}