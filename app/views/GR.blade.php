@extends('usermain')
@section('pageName')
رپورٹ پیدا
@stop
@section('content')
 
<script>
    
function updateTable(date,city){
    
     $("#reportTable").load("reportTable?gReport=1&date="+date+"&city="+city);
     $("#newsTable").load("gImportantNew?gReport=1&date="+date+"&city="+city);
     $("#idariaTable").load("gIdaria?gReport=1&date="+date+"&city="+city);
     $("#columnTable").load("gColumn?gReport=1&date="+date+"&city="+city);
     
}
function report(){
         var date = $("#date01").val();
          var city = $("#city01").val();
     var myWindow = window.open("popupReport?city="+city+"&date="+date, "", "width=2000, height=1200");

        updateTable(date,city);
}
</script>

<div style="width:80%; margin-left: auto; margin-right: auto;">
     <div class="control-group">
                                            <label class="control-label" for="date01">تاریخ ان پٹ</label>
                                             <input name="date" type="text" class="input-xlarge datepicker" id="date01" value="{{$date1}}">
                                             <label class="control-label" for="date01">شہر کا نام</label>
                                             <select name='city' id='city01'>
                                                 <option></option>
                                                 @foreach($citys as $city)
                                                 <option value="{{$city->city_ID}}">{{$city->name}}</option>
                                                 @endforeach
                                             </select>
                                           
                                          <div class="controls">
                                            
                                            <button onclick="report()">رپورٹ حاصل</button>
                                          </div>     
                                        </div>

                             
                           
                                 
    
    
    
    
    
</div>





@stop
@section('content2')

<div id="reportTable">
    
    
</div>
<div id="newsTable">
    
    
</div>
<div id="idariaTable">
    
    
</div>
<div id="columnTable">
    
    
</div>
@stop
