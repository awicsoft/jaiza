@extends('usermain')
@section('pageName')
رپورٹ پیدا
@stop
@section('content')
 
<script>
    
function updateTable(date1,date2){
 var url = "cReportTable?date1="+date1+"&date2="+date2;
     alert(url);
        $("#creportTable").load(url);

}
function correctDate(date){
  
var arr = date.split("/");
    return arr[2]+"-"+arr[0]+"-"+arr[1];
    
}
function report(){
         var date1= $("#date01").val();
         date1 = correctDate(date1);
         var date2 = $("#date02").val();
         date2 = correctDate(date2);
       
 // var city = $("#city01").val();
     //var myWindow = window.open("popupReport?city="+city+"&date="+date, "", "width=2000, height=1200");


        updateTable(date1,date2);
}
</script>

<div style="width:80%; margin-left: auto; margin-right: auto;">
     <div class="control-group">
                                            <label class="control-label" for="date01">تاریخ ان پٹ</label>
                                             <input name="date01"  type="text" class="input-xlarge datepicker" id="date01" value="{{date('m/d/Y')}}">
                                            <label class="control-label" for="date02">تاریخ ان پٹ</label>
                                             <input name="date02" type="text" class="input-xlarge datepicker" id="date02" value="{{date('m/d/Y')}}">
                                            
                                            
                                           
                                          <div class="controls">
                                            
                                            <button onclick="report()">رپورٹ حاصل</button>
                                          </div>     
                                        </div>

                             
                           
                                 
    
    
    
    
    
</div>





@stop
@section('content2')

<div id="creportTable">
    
    
</div>

@stop
