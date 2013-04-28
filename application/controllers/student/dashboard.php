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
        $this->load->model(array('module_m', 'milestone_m', 'user_m', 'enrollment_m', 'assignment_m', 'progress_m'));
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
        foreach($milestones as $milestone){
            if($this->isMilestoneCompleted($milestone->is_completed)){
                $numComp++;
            }
        }
        return ($numComp/count($milestones)*100)*100;
    }
    
    public function isModuleCompleted($moduleID)
    {
        $completed = TRUE;
        $assignments = $this->assignment_m->get_many_by('parent_module_id',$moduleID);
        foreach($assignments as $assignment){
            if(!$this->isAssignmentCompleted($assignment)){
                $completed = FALSE;
                break;
            }
        }
        return $completed;
    }
    
    
    public function isAssignmentCompleted($assignmentID)
    {
        $milestones = $this->milestone_m->get_many_by('parent_assignment_id',$assignmentID);
        $completed = TRUE;
        foreach($milestones as $milestone){
            if(!$this->isMilestoneCompleted($milestone)){
                $completed=FALSE;
                break;
            }
        }
        return $completed;
    }
    
    public function isMilestoneCompleted($milestoneID)
    {
        $milestone = $this->progress_m->get_back('milestone_id',$milestoneID);
        return $milestone->is_completed;
    }
    
    public function getUserModuleProgress($userID, $moduleID){        
        $modules = $this->enrollment_m->get_many_by('user_id',$userID);
        foreach($modules as $module){
            if($module->module_id==$moduleID){
                $assignments = $this->assignment_m->get_many_by('parent_module_id',$moduleID);
                foreach($assignments as $assignment){
                    $modProgress += $this->getUserAssignmentProgress($userID, $assignment);
                    }  
                }
        }
        return ($modProgress/count($assignments)*100)*100;
    }
    
    public function isUserMilestoneCompleted($userID, $milestoneID){
        $userProgress = $this->progress_m->get_back('user_id',$userID);
        return $userPregress->is_completed;
    }
    public function getUserAssignmentProgress($userID,$assignmentID){
        $user = $this->progress_m->get_back('user_id',$userID);
        $milestones = $this->milestones_m->get_many_by('user_id',$user->user_id);
        $progress = 0;
        $numOfEnrolledMiles = 0;
        foreach($milestones as $milestone){
            if($milestone->parent_assignment_id==$assignmentID){
                $numOfEnrolledMiles++;
                if($this.isMilestoneCompleted($milestone)){
                    $progress++;
                }
            }
        }
        return ($progress/$numOfEnrolledMiles)*100;
    }
 
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


