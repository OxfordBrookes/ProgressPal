<?php

/**
 * Class Milestone_m
 *
 * Model for interacting with milestone data.
 */
class Milestone_m extends MY_Model {

    protected $_table = 'milestone';
    protected $primary_key = 'milestone_id';

    protected $belongs_to = array('assignment' => array('model' => 'assignment_m'));
    

}