<?php

/**
 * Class Dashboard
 */
class Dashboard extends CI_Controller {

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->load->model(array('module_m', 'task_m', 'milestone_m'));
    }

    /**
     *
     */
    public function index()
    {

    }

}