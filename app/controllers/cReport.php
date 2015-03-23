<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cReport
 *
 * @author Usama
 */
class cReport {
    //put your code here

    var $f;
    var $b;
    var $n;
    var $i;
    var $newspaperID;
    var $date1;
    var $date2;
    public function incF(){
       $this->f++; 
        
    }
    public function incB(){
       $this->b++; 
        
    }
    public function incN(){
       $this->n++; 
        
    }
    public function incI(){
       $this->i++; 
        
    }
    
    public function inc($chr){
        if($chr=='f')
            $this->incF ();
        if($chr == 'b')
            $this->incB ();
        if($chr == 'n')
            $this->incB();
        if($chr == 'i')
            $this->incI ();
        
    }
    public function setNewspaperID($ID){
        $this->newspaperID = $ID;
        
        
    }
    public function setDates($date1,$date2){
        $this->date1 = $date1;
        $this->date2 = $date2;
        
    }
    public function fill(){
       // echo "<br>newpaperID $this->newspaperID "."<br>";
     $report =    Report::where('newspaper_ID',$this->newspaperID);
     $this->f =  Report::where('newspaper_ID',$this->newspaperID)->where('date','>=',$this->date1)->where('date','<=',$this->date2)->where('columnNO','f')->count();
     $this->n = Report::where('newspaper_ID',$this->newspaperID)->where('date','>=',$this->date1)->where('date','<=',$this->date2)->where('columnNO','n')->count();
     $this->i = Report::where('newspaper_ID',$this->newspaperID)->where('date','>=',$this->date1)->where('date','<=',$this->date2)->where('columnNO','i')->count();
     $this->b = Report::where('newspaper_ID',$this->newspaperID)->where('date','>=',$this->date1)->where('date','<=',$this->date2)->where('columnNO','b')->count();
     
     
    }
    function toString(){
        $str = "";
        $str .=$this->f ." F "."<br>";
        $str .=$this->b ." B "."<br>";
        $str .=$this->n ." Nill "."<br>";
        $str .=$this->i ." Inp "."<br>";
        return $str;
    }
   
}
