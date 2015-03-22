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
class FileController extends BaseController {
    
    
    
    //put your code here

    
        
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
        function pathToFile($image){
                  $file = [$image => Input::file('image')];
              // setting up rules
              $rules = [
                            $image => 'mimes:jpeg,bmp,png|max:999999'
                        ]; //mimes:jpeg,bmp,png and for max size max:10000
                      // doing the validation, passing post data, rules and the messages
                 $validator = Validator::make($file, $rules);
                if ($validator->fails()) {
                 // send back to the page with the input data and errors
                  echo "Image Validator Fails";

                  exit();
                }
                if (!Input::file($image)->isValid()){
                    echo "File is Not Valid";
                    exit();
                }

                    $destinationPath = 'uploads'; // upload path
                    $extension = Input::file($image)->getClientOriginalExtension(); // getting image extension
                    $fileName = rand(11111,99999)."".time().'.'.$extension; // renameing image
                    Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                    // sending back with message
                    $scancopy = $destinationPath."/".$fileName;
                    return $scancopy;
            
        }
    
}
