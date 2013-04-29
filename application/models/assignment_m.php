<?php

/**
 * Class Task_m
 *
 * Model for interacting with task data.
 */
class Assignment_m extends MY_Model {

    protected $_table = 'assignment';
    protected $primary_key = 'assignment_id';

    protected $belongs_to = array('module' => array('model' => 'module_m'));

}