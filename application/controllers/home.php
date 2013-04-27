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

    /**
     * Sign in the user.
     */
    public function login()
    {
        $this->load->model('user_m');

        $validation_rules = array(
            array(
                'field' => 'email',
                'label' => 'Email address',
                'rules' => 'required|trim|valid_email'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim|min_length[6]'
            )
        );

        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run())
        {
            if ($user = $this->user_m->get_by(array('email' => $this->input->post('email'))))
            {
                $password = $this->user_m->hash($this->input->post('password'), $this->input->post('email'));

                if ($this->user_m->get_by(array('email' => $this->input->post('email'), 'password' => $password)))
                {
                    // successful login
                    if ($user->is_staff)
                    {
                        redirect('');
                    }
                    else
                    {
                        redirect('student/dashboard');
                    }
                }
            }

            $this->session->set_flashdata('error', 'Invalid sign in details');
        }

        $this->load->view('signin');
    }
}