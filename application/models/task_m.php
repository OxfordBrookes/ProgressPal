<?php

/**
 * Class Task_m
 *
 * Model for interacting with task data.
 */
class Task_m extends MY_Model {

    protected $_table = 'task';
    protected $primary_key = 'task_id';

    protected $belongs_to = array('milestone' => array('model' => 'milestone_m'));

}