<?php

/**
 * Having multiple classes in one file like this is kinda fucked. Maybe sort this out
 * at some point.
 */

/**
 * Class MY_Controller
 *
 * Should be used as the base class for all pages where the user is required to be signed in.
 */
class MY_Controller extends CI_Controller {

    /**
     * Constructor.
     *
     * Check if the user is signed in.
     */
    public function __construct()
    {
        parent::__construct();

        if ( ! $this->session->userdata('user_id'))
        {
            redirect('');
        }
    }
}

/**
 * Class Student_Controller
 *
 * Should be used as the base class for all student-only pages.
 */
class Student_Controller extends MY_Controller {

    /**
     * Constructor.
     *
     * If the user is not a student, sign them out.
     */
    public function __construct()
    {
        parent::__construct();

        if ( ! $this->session->user_data('student_id'))
        {
            // user is not signed in! We should redirect them
            redirect('');
        }
    }

}

/**
 * Class Staff_Controller
 *
 * Should be used as the base class for all staff-only pages.
 */
class Staff_Controller extends MY_Controller {

    /**
     * Constructor.
     *
     * If the user is not a staff member, sign them out.
     */
    public function __construct()
    {
        parent::__construct();

        if ( ! $this->session->user_data('staff_id'))
        {
            // user is not signed in! We should redirect them
            redirect('');
        }
    }

}
