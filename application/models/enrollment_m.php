<?php

/**
 * Class Enrollment_m
 */
class Enrollment_m extends MY_Model {

    protected $_table = 'enrollment';
    protected $primary_key = 'enrollment_id';

    protected $has_many = array(
        'user' => array('model' => 'user_m'),
        'module' => array('model' => 'module_m')
    );

}