<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewsPaperController
 *
 * @author 12003065165
 */
class LeaderController extends BaseController {
    
    
    
    //put your code here

    
        function leaderPage(){
            
            $userController = new UserController();
            $user = $userController->isLogged();            
            return View::make('leader',['user' =>$user ]);
                    
        }
        function isAlreadyRegistered($name,$des){
          return Leader::where('name',$name)->where('designation',$des)->count();  
            
        }
        function leaderPagePost(){
            $name = Input::get('name');
            $des  = Input::get('des');
            if($this->isAlreadyRegistered($name, $des))
                    return "This Leader is Already Registered";
           
            Leader::insert(['name'=>$name , 'designation'=>$des ]);
            return "Sucessfully Added a new Leader";
            
        }
        function updateLeader(){
            $ID = Input::get('ID');
             $name = Input::get('name');
            $des  = Input::get('des');
            if($this->isAlreadyRegistered($name, $des))
                    return "This Leader is Already Registered";
            
            Leader::where('leader_ID',$ID)->update([
                  'name'=>$name , 'designation'=>$des 
                  
                  
                  
              ]);
             return "Sucessfully Updated a  Leader";
            
        }
        function deleteLeader(){
             $ID = Input::get('ID');
            Leader::where('leader_ID',$ID)->delete();
            
        }
        function leaderTable(){
            $leaders = Leader::all();
            
            return View::make('leaderTable',['leaders'=>$leaders]);
            
        }
    
}
