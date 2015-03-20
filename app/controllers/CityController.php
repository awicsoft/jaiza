<?php

class CityController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/




        function cityPage(){
            
            $userController = new UserController();
            $user = $userController->isLogged();
           
            return View::make('City',['user' =>$user ]);
                    
        }
        function cityTable(){
            
             $citys = City::all();
             
            return View::make('cityTable',['citys' => $citys]);
            
        }
        function isCityExits($name){
                $city = City::where('name',$name);
                return $city->count();
                
            
        }
        function cityPagePost(){
          
            $name = Input::get('name');
            
            
              if($this->isCityExits($name))
                return "This city Already Added";
              
              
            City::Insert(['name' => $name]);
            
            
            return "A City Has been Added Successfully";
        }
        function updateCity(){
            $city_ID = Input::get('city_ID');
            $name = Input::get('name');
            $btn  = Input::get('btn');
            
            if($btn == 'Update'){
                  if($this->isCityExits($name))
                return "This city Already Added";
                City::where('city_ID',$city_ID)->update(['name' =>$name]);
                return "City Has been Updated";
            }
            if($btn == 'Delete'){
                City::where('city_ID',$city_ID)->delete();
                    return "City Has been Deleted";
                
                
            }
            
            
            
            
            
        }
        
}
