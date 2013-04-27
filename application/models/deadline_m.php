<?php

/**
 * Class Deadline_m
 *
 * Model for interacting with deadline data.
 */
class Deadline_m extends MY_Model {

    protected $_table = 'deadline';
    protected $primary_key = 'deadline_id';

    protected $belongs_to = array('milestone' => array('model' => 'milestone_m'));

}