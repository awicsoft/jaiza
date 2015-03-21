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
class ColumnsController extends BaseController {
    
    
    
    //put your code here

    
        function columnsPage(){
            
            $userController = new UserController();
            $user = $userController->isLogged();
            $newspapers = Newspaper::all();
            $tags = Tag::all();
            $leaders = Leader::all();
            return View::make('columns',['user'=>$user,'newspapers'=>$newspapers ,'tags' =>$tags ,'leaders' => $leaders]);
                    
        }
        
        
        
        public function upload() {
          // getting all of the post data
          $file = array('image' => Input::file('image'));
          // setting up rules
          $rules = array('image' => 'required','mimes'=>'png' ); //mimes:jpeg,bmp,png and for max size max:10000
          // doing the validation, passing post data, rules and the messages
          $validator = Validator::make($file, $rules);
          if ($validator->fails()) {
           // send back to the page with the input data and errors
            return Redirect::to('upload')->withInput()->withErrors($validator);
          }
          else {
          //   checking file is valid.
            if (Input::file('image')->isValid()) {
              $destinationPath = 'uploads'; // upload path
              $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
              $fileName = rand(11111,99999).'.'.$extension; // renameing image
              Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
              // sending back with message
              Session::flash('success', 'Upload successfully'); 
              return Redirect::to('upload');
            }
            else {
              // sending back with error message.
              Session::flash('error', 'uploaded file is not valid');
              return Redirect::to('upload');
            }
          }
        }
        function columnsPagePost(){
            $btnAdd = Input::get('btnAdd');
           if(!empty($btnAdd)){
               
           $tagController = new TagController();
           $title = Input::get('title');
           $summary = Input::get('summary');
           $details = Input::get('details');
           $tags = Input::get('tags');
           $tags =  $tagController->arrToCommaSperated($tags);
           $link  = Input::get('link');
          
           $newspaperID = Input::get('newspaperID');
           $leaderID = Input::get('leaderID');
           $type = Input::get('type');
           $date = date('Y-m-d');
          
           $scancopy  = "";
            if(Input::hasFile('image') )//&& Input::file('image')->isValid())
           {
           
                    echo "<script>alert('file uploaded') </script>";
           
                  $destinationPath = 'uploads'; // upload path
              $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
              $fileName = md5(rand(11111,99999)+time()+Auth::user()->ID).'.'.$extension; // renameing image
              Input::file('image')->move($destinationPath, $fileName); // uploading file to given path

                 $scancopy  = $destinationPath."/".$fileName;
               
           
               
               
           }
           Columns::insert([
               'date' => $date,
               'title' => $title,
               'summary' =>$summary,
               'details' =>$details,
               'tags' => $tags,
               'link' => $link,
               'scancopy' => $scancopy,
               'leader_ID' =>$leaderID,
               'type' => $type,
               'newspaper_ID' =>$newspaperID
               
           ]);
           
           
           }
        
           return $this->columnsPage();
           
        }
    
    function deleteColumns(){
        $cloumns_ID = Input::get('cloumns_ID');
        
        Columns::where('colmuns_ID',$cloumns_ID)->delete();
        return "Sucessfully Deleted";
        
        
    }
    function columnsTable(){
        
        $colums = Columns::all();
        return View::make('clTable',['cls'=>$colums]);
        
    }
}
