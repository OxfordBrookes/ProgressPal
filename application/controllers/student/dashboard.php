<?php

/**
 * Class Dashboard
 *
 * The students dashboard.
 */
class Dashboard extends Student_Controller {

    public $totalMilestones = 0;
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
       
       $this->load->view('student/dashboard');
    }
    
    //getAvgModuleProgress($moduleID) -> int avgModule
    public function getClassAvgModuleProgress($moduleID)
    {
        $assignments = $this->assignment_m->get_many_by('parent_module_id',$moduleID);
        $moduleAvg = 0;
        $cnt = count($assignments);
        foreach($assignments as $assignment){
            $moduleAvg += $this->getClassAvgAssignmentProgress($assignment->assignment_id);
        }
        return ($moduleAvg/(count($assignments)*100))*100;
    }
    
    //getAvgAssignmentProgress($assignmentID)
    public function getClassAvgAssignmentProgress($assignmentID)
    {
        $milestones = $this->milestone_m->get_many_by('parent_assignment_id',$assignmentID);
        $numComp = 0;
        $cnt = count($milestones);
        for($i=0;$i<$cnt;$i++){
            if($milestones[i]['is_completed']){
                $numComp++;
            }
        }
        return ($numComp/count($milestones))*100;
    }
    
    public function isModuleCompleted($moduleID)
    {
        return false;
    }
    
    
    public function isAssignmentCompleted($assignmentID)
    {
        $milestones = $this->milestone_m->get_many_by('parent_assignment_id',$assignmentID);
        $completed = TRUE;
        $cnt = count($milestones);
        for($i=0;$i<$cnt;$i++){
            if(!$milestones[i]['is_completed']){
                $completed=FALSE;
            }
        }
        return $completed;
    }
    
    public function isMilestoneCompleted($milestoneID)
    {
        $milestone = $this->milestone_m->get_back('milestone_id',$milestoneID);
        $completed = FALSE;
        if($milestone['is_completed']){
            $completed = TRUE;
            }
        return $completed;
    }
    

    public function getUserModuleProgress($userID, $moduleID){
        $user = $this->user_m->get_back('user_id',$userID);
    }
    //getUserAssignmentProgress()
    //getUserClassProgress()
 
    //getUserProgress($userid) -> int userProgress
    public function getProgress($userID)
    {
        //echo json_encode($userID,$this->getClassAvgModuleProgress,$this->$totalMilestones);
        echo json_encode(array('user'=>10,'avg'=>12,'total'=>20));       
    }
    
    public function getData($userID)
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
       //echo $userID;
       //echo $this->getClassAvgModuleProgress(4);
    }
    
    //getData($userID) -> JSON {modules, assignments, milestones}
    
    //getProgress($userid) -> int getUserProgress & int 
}


