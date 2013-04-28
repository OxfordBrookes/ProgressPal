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
        //$this->load->model(array('module_m', 'milestone_m', 'user_m', 'enrollment_m', 'assignment_m', 'progress_m', 'enrollment_m'));
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
        return $moduleAvg/count($assignments);
    }
    
    //getAvgAssignmentProgress($assignmentID)
    public function getClassAvgAssignmentProgress($assignmentID)
    {
        $milestones = $this->milestone_m->get_many_by('parent_assignment_id',$assignmentID);
        
        $numComp = 0;
        foreach($milestones as $milestone){
            if($this->isMilestoneCompleted()){
                $numComp++;
            }
        }
        return $numComp/count($milestones);
    }
    
    public function isModuleCompleted($moduleID)
    {
        $completed = TRUE;
        $assignments = $this->assignment_m->get_many_by('parent_module_id',$moduleID);
        
        foreach($assignments as $assignment){
            //if(!$this->isUserMilestoneCompleted(,$assignment->assignment_id)){
                $completed = FALSE;
                break;
            //}
        }
        //return $completed;
    }
    
    public function getEnrolledUsers($moduleID)
    {
        $enrollments = $this->enrollment_m->get_many_by('module_id',$moduleID);
        //$assignments = $this->assigment_m->get_many_by('parent_module_id',$moduleID);
        $userIDs = array();
        foreach ($enrollments as $enrollment)
        {
            $userIDs[] = $enrollment->user_id;
        }
        return $userIDs;
    }
    
    public function isAssignmentCompleted($userID, $assignmentID)
    {
        //echo $this->isUserMilestoneCompleted(3,2);
        
        $milestones = $this->milestone_m->get_many_by('parent_assignment_id',$assignmentID);
        var_dump($milestones);
        $parent_module_id = $this->assignment_m->get_by('assignment_id',$assignmentID)->parent_module_id;
        
        $user_ids = $this->getEnrolledUsers($parent_module_id);
        var_dump($user_ids);
        foreach($milestones as $milestone){
            foreach($user_ids as $userID)
            {
                var_dump($milestone->milestone_id);
                var_dump($userID);
                if(!($this->isUserMilestoneCompleted($userID,$milestone->milestone_id))){
                    return false;
                }
            }
        }
        return true;
    }
    
    //correct
    public function isUserMilestoneCompleted($userID,$milestoneID)
    {
        $progress = $this->progress_m->get_by(array('user_id' => $userID, 'milestone_id' => $milestoneID));
        var_dump($progress);
        return $progress->is_completed === '1';
    }
    
    public function getUserModuleProgress($userID){        
        $modules = $this->enrollment_m->get_many_by('user_id',$userID);
        $modProgress = 0;
        foreach($modules as $module){
            //if($module->module_id==$moduleID){
                $assignments = $this->assignment_m->get_many_by('parent_module_id',$module->module_id);
                foreach($assignments as $assignment){
                    $modProgress += $this->getUserAssignmentProgress($userID, $assignment);
                    }  
                }
        return $modProgress;///count($assignments);
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
        //echo json_encode(array('user'=>  $this->getUserModuleProgress($userID, $moduleID)))
        echo json_encode(array('user'=>0,'avg'=>3,'total'=>6));       
    }
    
    public function getData($userID)
    {
        
        $data = array(array(
           'id' => 1,
           'type' => 'module',
           'complete' => false, 
           'name' => 'Computing',
           'desc' => 'software',
           'children' => array(array(
               'id' => 2,
                'type' => 'assignment',
                'complete' => false, 
                'name' => 'python',
                'desc' => 'snake'),
               array(
               'id' => 3,
                'type' => 'assignment',
                'complete' => false, 
                'name' => 'java',
                'desc' => 'coffee','children' => array(array(
               'id' => 4,
                'type' => 'milestone',
                'complete' => false, 
                'name' => 'helloworld',
                'desc' => 'lol'),
               array(
               'id' => 5,
                'type' => 'milestone',
                'complete' => false, 
                'name' => 'game',
                'desc' => 'AI and stuff'),
               ))
                
               )),
            
            
            array(
           'id' => 1,
           'type' => 'module',
           'complete' => false, 
           'name' => 'Business',
           'desc' => 'money',
           'children' => array(
               array(
               'id' => 3,
                'type' => 'assignment',
                'complete' => false, 
                'name' => 'accounting',
                'desc' => 'numbers','children' => array(array(
               'id' => 4,
                'type' => 'milestone',
                'complete' => false, 
                'name' => 'startup',
                'desc' => 'lol'),
               array(
               'id' => 5,
                'type' => 'milestone',
                'complete' => false, 
                'name' => 'millionaire',
                'desc' => 'cool stuff')
               )),array(
               'id' => 2,
                'type' => 'assignment',
                'complete' => false, 
                'name' => 'marketing',
                'desc' => 'sell stuff')
                
               
            
            
            
            
            )
        ));
       
       echo json_encode($data);
       //echo $userID;
       //echo $this->getClassAvgModuleProgress(4);
    }
    
    public function changeComplete($str)
    {
        //$this->
        //return true;
    }
    //getData($userID) -> JSON {modules, assignments, milestones}
    
    //getProgress($userid) -> int getUserProgress & int 
}


