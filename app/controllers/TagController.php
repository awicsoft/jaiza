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
class TagController extends BaseController {
    
    
    
    //put your code here
    function commaSperatedToArr($str){
        $arr = [];
        
        $token = strtok($str, ",");

        while ($token !== false)
        {
            array_push($arr,$token);
            $token = strtok(",");
        } 
        
        return $arr;
        
    }
     function arrToCommaSperated($arr){
           $count = count($arr);
           $output = "";
           for($i = 0; $i<$count -1 ; $i++){
               $output .="$arr[$i],";
               
           }
           if($count-1 >=0)
               $output .=$arr[$count-1];
        
        return $output;
    }
    function all(){
        return Tag::all();
        
    }
            function tagGet(){
            $tags = Tag::all();
            
            return View::make('tag');
            
                    
        }
        function isAlreadyRegistered($name){
          return Tag::where('title_tag',$name)->count();  
            
        }
        function tagPost(){
            $name = Input::get('title_tag');
          
            if($this->isAlreadyRegistered($name))
                    return "This Tag is Already Registered";
           
           Tag::insert(['title_tag'=>$name ]);
            return "Sucessfully Added a new Tag";
            
        }
        
        function updateTag(){
            $ID = Input::get('ID');
          
            
        }
        function deleteTag(){
             $ID = Input::get('ID');
            Leader::where('Tag_ID',$ID)->delete();
            
        }
        function tagTable(){
            $tags = Tag::all();
            
            return $tags;
            
        }
        function tagOptions(){
            $ouput = "";
            $tags =Tag::all();
            $count = 0;
            foreach($tags as $tag){
         
                $ouput .= "<li class='active-result' style='' data-option-array-index='$count'>$tag->title_tag</li>"; 
                   $count++;
            }
            
            echo $ouput;
        }
    
}
