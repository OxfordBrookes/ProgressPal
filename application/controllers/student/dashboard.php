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
       /* $moduleID = 1;
        $assignments = $this->assignment_m->get_many_by('',$moduleID);
       echo $assignments;*/
       
      /* [{"id":1,
        "type":"module",
        "complete":false,
        "name":"example",
        "desc":"sdjfhgjkdfgjksdfhg",
        "children":[{"id":1,"type":"module",
                    "complete":false,"name":"example",
                    "desc":"sdjfhgjkdfgjksdfhg"
                    }]
        }]*/
       
       //array('type' => $obj->)
       
       
    }
    
    //getAvgModuleProgress($moduleID) -> int avgModule
    public function getClassAvgModuleProgress($moduleID)
    {
        $assignments = $this->assignment_m->get_many_by('',$moduleID);
        $assignmentAvg = getAvgAssignemntProgress($assignmentID);
        $moduleAvg;
        return $moduleAvg;
    }
    
    //getAvgAssignmentProgress($assignmentID)
    public function getClassAvgAssignmentProgress($assignmentID)
    {
        $milestones = $this->milestone_m->get_many_by('parent_assignment_id',$assignmentID);
        var_dump($milestones);
        //for($i=0; $assignmentID ){}
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
    public function getUserProgress($userID)
    {
        
    }
    
    public function getData()
    {
        $data = array(array(
           'id' => 1,
           'type' => 'module',
           'complete' => false, 
           'name' => 'computing',
           'desc' => 'asdasdasd',
           'children' => array(array(
               'id' => 2,
                'type' => 'assignment',
                'complete' => false, 
                'name' => 'python',
                'desc' => 'asdasdasd'
               )))
        );
       
       echo json_encode($data);
    }
    
    //getData($userID) -> JSON {modules, assignments, milestones}
    
    //getProgress($userid) -> int getUserProgress & int 
}