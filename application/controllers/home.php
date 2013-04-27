<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Home
 *
 * Sign in page.
 */
class Home extends CI_Controller {

    /**
     * Constructor.
     *
     * Check if the user is already logged in and direct them elsewhere
     * if necessary.
     */
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('user_id'))
        {
            // User is already logged in, send them somewhere else!
        }
    }

    /**
     * Show the sign in page.
     */
    public function index()
	{
		$this->load->view('signin');
	}
}