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
class ReportController extends BaseController {
    
    
    
    //put your code here

    
        function reportPage(){
            
            $userController = new UserController();
            $user = $userController->isLogged();            
            //$date = date('Y-m-d', strtotime('-1 day'));
            $date = date('Y-m-d');
            
		   $date = Input::get('date');
            if($date==""){
                $date = date('Y-m-d');
          	$date1 = date('m/d/Y');
		}
	  else{
		$date1 = $date;
            $date2 = DateTime::createFromFormat('m/d/Y', $date);
                $date = $date2->format('Y-m-d');
            }


		
            if(Input::has('city')){
                $ci = Input::get('city');
                
                $newspapers = NewspaperView::where('ID',$ci)->get();
            
                
           }
            else{
                   $newspapers = NewspaperView::all();
            
                
                  
                
            }
              $prs = PressRelease::where('date',$date)->get();
            $citys = City::all();
            return View::make('report',['citys'=>$citys,'user' =>$user,'newspapers' =>$newspapers,'prs' =>$prs,'date1'=>$date1]);
                    
        
            
        }
        function isAlready($npID,$prID){
            
            return Report::where('newspaper_ID',$npID)->where('pressrelease_ID',$prID)->count();
            
        }
        function reportPagePost(){
            $npID = Input::get('npID');
            $prID = Input::get('prID');
            $pg = Input::get('pg');
            $cl = Input::get('cl');
            
            $userC = new UserController();
            
            //$userID =  $userC->isLogged()->id;
            $userID = Auth::user()->id;
		$pressr = PressRelease::where('pr_ID',$prID)->first();		
            
	$date = $pressr->date;
            
	if($this->isAlready($npID, $prID)){
                Report::where('newspaper_ID',$npID)->where('pressrelease_ID',$prID)->update([
               'date' => $date,
                'pageNO' => $pg,
                'columnNO' => $cl,
                'user_ID' => $userID,
                'newspaper_ID' => $npID,
                'pressrelease_ID' => $prID
                
                ]);
            }
            else
           Report::insert([
               'date' => $date,
                'pageNO' => $pg,
                'columnNO' => $cl,
                'user_ID' => $userID,
                'newspaper_ID' => $npID,
                'pressrelease_ID' => $prID
                
                ]);
            
             return "Reported Sucessfully";
            
        }

        function getPg(){
            $npID = Input::get('npID');
            $prID = Input::get('prID');
            
            $report = Report::where('newspaper_ID',$npID)->where('pressrelease_ID',$prID);
            if($report->count()){
                
              $report =  $report->first();
                return $report->pageNO;
                
            }
            return "";
        }
        function getCol(){
            $npID = Input::get('npID');
            $prID = Input::get('prID');
            
            $report = Report::where('newspaper_ID',$npID)->where('pressrelease_ID',$prID);
            if($report->count()){
                
              $report =  $report->first();
                return $report->columnNO;
                
            }
            return "";
        }
        
        function reportTable(){
            
            $date = Input::get('date');
            if($date=="")
                $date = date('Y-m-d');
            else{
            $date2 = DateTime::createFromFormat('m/d/Y', $date);
                $date = $date2->format('Y-m-d');
            }
            
              if(Input::has('city')){
                $ci = Input::get('city');
             
                
                $newspapers = NewspaperView::where('cityID',$ci)->get();
               
                
           }
            else{
                   $newspapers = NewspaperView::all();
            
                
                  
                
            }
            $prs = PressRelease::where('date',$date)->get();
            $report = Report::where('date',$date)->get();
            $gReport = false;
            
            if(Input::has('gReport'))
                $gReport = true;
             
            
            if(count($prs))
                return View::make('reportTable',['newspapers' =>$newspapers,'prs' =>$prs ,'reports' =>$report,'gReport' => $gReport]);
            else
                return "<h2>Sorry No PressRelease in this date</h2>";
        
            
        }
}
