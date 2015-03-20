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
class NewsPaperController extends BaseController {
    
    
    
    //put your code here

    
        function newspaperPage(){
            
            $userController = new UserController();
            $user = $userController->isLogged();            
            $citys = City::all();
           
            return View::make('newspaper',['user' =>$user,'citys'=>$citys ]);
                    
        }
        function newspaperTable(){
            
           $citys = City::all();
            $Newspapers = NewspaperView::all();
            return View::make('newspaperTable',[
                'newspapers' =>$Newspapers,
                'citys' => $citys
                    
                    ]);
                    
        }
        function deleteNewspaper(){
            $ID = Input::get('ID');
            Newspaper::where('newspaper_ID',$ID)->delete();
            return "Sucessfully Deleted a Newspaper";
        } 
        function updateNewspaper(){
            $ID = Input::get('ID');
            $name= Input::get('name');
            $cityID = Input::get('cityID');
            $circularPeriod = Input::get('circularPeriod');
            $website = Input::get('website');
            $language = Input::get('language'); 
             if(Newspaper::where('name',$name)->where('city_id',$cityID)->where('language',$language)->where('circularPeriod',$circularPeriod)->count()){
                return "Newspaper($name) with the city($cityID) Already Registered ";
          
            }
            
            Newspaper::where('newspaper_ID',$ID)->update([
               'name' => $name ,
               'language' =>$language,
                'circularPeriod' =>$circularPeriod,
                'website' => $website,
                'city_id' =>$cityID
                
                
            ]);
             return "Sucessfully Updated a Newspaper";
        }
              
        function newspaperPagePost(){
            $name= Input::get('name');
            $cityID = Input::get('cityID');
            $circularPeriod = Input::get('circularPeriod');
            $website = Input::get('website');
            $language = Input::get('language');
            
            //if(Newspaper::where('name',$name)->where('city_id',$cityID)->where('language',$language)->where('circularPeriod',$circularPeriod)->count()){
            //    return "Newspaper($name) with the city($cityID) Already Registered ";
          
            //}
        
              NewsPaper::insert([
                'name' => $name ,
               'language' =>$language,
                'circularPeriod' =>$circularPeriod,
                'website' => $website,
                'city_id' =>$cityID
                ]);   
                   return "Newspaper($name) with the city($cityID Sucessfully Added ";
          
        }
    
    
}
