@extends('usermain')
@section('pageName')
رپورٹ پیدا
@stop
@section('content')
 
<script>
function updateTable(date){
     $("#reportTable").load("reportTable?gReport=1&date="+date);
     $("#newsTable").load("gImportantNew?gReport=1&date="+date);
     $("#idariaTable").load("gIdaria?gReport=1&date="+date);
     $("#columnTable").load("gColumn?gReport=1&date="+date);
     
}
function report(){
         var date = $("#date01").val();
    updateTable(date);
}
</script>

<div style="width:80%; margin-left: auto; margin-right: auto;">
     <div class="control-group">
                                          <label class="control-label" for="date01">تاریخ ان پٹ</label>
                                          <div class="controls">
                                            <input name="date" type="text" class="input-xlarge datepicker" id="date01" value="{{date('m/d/Y')}}">
                                            <button onclick="report()">رپورٹ حاصل کریں</button>
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
