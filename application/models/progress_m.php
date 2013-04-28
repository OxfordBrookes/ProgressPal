<?php

/**
 * Class Enrollment_m
 */
class Progress_m extends MY_Model {

    protected $_table = 'progress';

    protected $has_many = array(
        'user' => array('model' => 'user_m'),
        'milestone' => array('model' => 'milestone_m')
    );

}