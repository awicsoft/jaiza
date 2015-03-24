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
require_once 'cReport.php';
class CReportController extends BaseController {
    
    
    
    //put your code here

    
        function creportPage(){
            
            $userController = new UserController();
            $user = $userController->isLogged();            
            $citys = City::all();
           
            
            return View::make('cReport',['user' =>$user,'citys' =>$citys]);
                    
        }
        
        function creportPost(){
            
            
            
        }
        function tableElement(){
            $cityID = Input::get('cityID');
            $newspaperName = Input::get('newspaperName');
              $date1 = Input::get('date1');
            $date2 = Input::get('date2');
        
            return $this->element($cityID, $newspaperName, $date1, $date2);
            
          
        }
        function element( $cityID,$newspaperName,$date1,$date2){
          
           
            
           $newsp = Newspaper::where('city_id',$cityID)->where('name',$newspaperName);
            if($newsp->count()){
                $newspaperID = $newsp->first()->newspaper_ID;
                $cReport = new cReport();
                $cReport->setNewspaperID($newspaperID);
                $cReport->setDates($date1, $date2);
                
                $cReport->fill();
                
                return $cReport->toString();
            }
            
            return "empty";
        }

        function cReportTable(){
            
           $date1 = Input::get('date1');
            
            $date2 = Input::get('date2');
            
            
            $citys = City::all();
            $newspapers = Newspaper::distinct()->get(array('name'));
            $newspapers = Newspaper::groupby('name')->get();
            $arr = [];
            
            
            foreach($citys as $city)
            { 
                foreach($newspapers as $newspaper)
                {
                    $cityID = $city->city_ID;
                     $newspaperName = $newspaper->name;
                     
                    $element  = $this->element($cityID, $newspaperName, $date1, $date2);
                    array_push($arr,$element);
                    
                }
            }
            return View::make('creportTable',[
                'date1' => $date1,
                'date2' => $date2,
                'citys' => $citys,
                'newspapers' => $newspapers,
                'data' => $arr
                ]);
            
        }
        
    
}
