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
class GenerateReportController extends BaseController {
    
    
    
    //put your code here

    
        function greportPage(){
            
            $userController = new UserController();
            $user = $userController->isLogged();            
            $citys = City::all();
            $date1 = date('m/d/Y');
            
            
            return View::make('GR',['user' =>$user,'citys' =>$citys ,'date1' => $date1]);
                    
        }
        function greportPagePost(){
            
            
            
        }
        
        function gImportantNew(){
          $date = Input::get('date');
            
          if($date=="")
                $date = date('Y-m-d');
            else{
                $date2 = DateTime::createFromFormat('m/d/Y', $date);
                $date = $date2->format('Y-m-d');
            }
            
            
              if(Input::has('city')){
                $ci = Input::get('city');
                
                 $importantNews = ColumnView::where('type','News')->where('date',$date)->where('newspaperCityID',$ci)->get();
            
                
           }
            else{
            
                $importantNews = ColumnView::where('type','News')->where('date',$date)->get();
            
                
                  
                
            }
            
            
            
            
            return View::make('importantNews',['importantNews' => $importantNews]);
            
        }
        function gIdaria(){
            
              $date = Input::get('date');
            if($date=="")
                $date = date('Y-m-d');
            else{
            $date2 = DateTime::createFromFormat('m/d/Y', $date);
                $date = $date2->format('Y-m-d');
            }
              if(Input::has('city')){
                $ci = Input::get('city');
                
             $idarias = ColumnView::where('type','Idaria')->where('date',$date)->where('newspaperCityID',$ci)->get();
               
           }
            else{
            
             $idarias = ColumnView::where('type','Idaria')->where('date',$date)->get();
           
                
                  
                
            }
            
            
            return View::make('idaria',['idarias' => $idarias]);
            
        }
        function gColumn(){
           $date = Input::get('date');
            if($date=="")
                $date = date('Y-m-d');
            else{
            $date2 = DateTime::createFromFormat('m/d/Y', $date);
                $date = $date2->format('Y-m-d');
            }
              if(Input::has('city')){
                $ci = Input::get('city');
                
             $columnvs = ColumnView::where('type','Column')->where('date',$date)->where('newspaperCityID',$ci)->get();
               
           }
            else{
            
             $columnvs = ColumnView::where('type','Column')->where('date',$date)->get();
           
                
                  
                
            }
            
            return View::make('columnv',['columnvs' => $columnvs]);
            
            
            
        }
    
}
