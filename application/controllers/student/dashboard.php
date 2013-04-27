<?php

/**
 * Class Dashboard
 *
 * The students dashboard.
 */
class Dashboard extends CI_Controller {

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('module_m', 'milestone_m', 'user_m', 'enrollment_m', 'assignment_m'));
    }

    /**
     *
     */
    public function index()
    {

    }
    
    //getAvgModuleProgress($moduleID) -> int avgModule
    public function getClassAvgModuleProgress($moduleID)
    {
        $modules = $this->module_m->get_many_by('module_id',$moduleID);
        
        
        $assignmentAvg = getAvgAssignemntProgress($assignmentID);
        $moduleAvg;
        return $moduleAvg;
    }
    
    //getAvgAssignmentProgress($assignmentID)
    public function getClassAvgAssignmentProgress($assignmentID)
    {
        $assignmentAvg;
        return $assignmentAvg;
    }
    
    
    public function isAssignementCompleted($assignmentID)
    {
        return false;
    }
    
    public function isMilestoneCompleted($milestoneID)
    {
        return false;
    }
    

    //getUserModuleProgress()
    //getUserAssignmentProgress()
    //getUserClassProgress()
 
    //getUserProgress($userid) -> int userProgress
    
    //getData($userID) -> JSON {modules, assignments, milestones}
    
    //getProgress($userid) -> int getUserProgress & int 
}