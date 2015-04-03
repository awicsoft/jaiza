@extends('template.jaiza.layout2')

@section('content2')
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    
<script>
   
   $(document).ready(function(){
  
        
        updateTable('{{Input::get('date')}}','{{Input::get('city')}}');
    
    
    });
   
   
   
function updateTable(date,city){
    dateFormate(date);
    cityName(city);
     $("#reportTable").load("reportTable?gReport=1&date="+date+"&city="+city);
     $("#newsTable").load("gImportantNew?gReport=1&date="+date+"&city="+city);
     $("#idariaTable").load("gIdaria?gReport=1&date="+date+"&city="+city);
     $("#columnTable").load("gColumn?gReport=1&date="+date+"&city="+city);
     
}

function dateFormate(date){
    var arr = date.split('/');
$("#hdate").html(arr[1] + " " +getMonthinUrdu(arr[0]) +" "+arr[2]);
    
}
function cityName(cityID){
    
     $("#hcityName").load("getCityName?ID="+cityID);
    
    
}
    function report(){
         var date = $("#date01").val();
          var city = $("#city01").val();
    
        var myWindow = window.open("popupReport?city="+city+"&date="+date, "", "width=400, height=1000");

        updateTable(date,city);
}

function getMonthinUrdu(month){
       if(month==1)
           return 'جنوری';
       if(month == 2)
           return 'فروري'
       if(month == 3)
           return 'مارچ';
       if(month == 4)
           return 'اپريل';
       if(month == 5)
           return 'مئ';
       if(month == 6)
           return 'جون';
       if(month == 7)
           return 'جولائ';
       if(month == 8)
           return 'اگست';
       if(month == 9)
           return 'ستمبر';
       if(month == 10)
           return 'اکتوبر';
       if(month == 11)
           return 'نومبر';
       if(month == 12)
           return 'دسمبر';
}
</script>
<table style="width:100%;height: 40px " >
    <tr><td></td><td style='width:700px'> </td><td> </td><td>تیارکردہ: {{$usernamename}}</td><td>ناظم شعبہ: {{$nazim}} </td></tr>
 </table>
<table style="width:100%;height: 40px " >
  
    <tr><td><lable id='hcityName'></lable> کے اخبارات کا جائزہ</td><td style="width:250px;">تاریخ  <label id='hdate'></label>ء</td><td>شعبہ نشرواشاعت جماعت اسلامی پاکستان</td><td></td><td></td></tr>
    
    
</table>
<div id="reportTable">
    
    
</div>
<div id="newsTable">
    
    
</div>
<div id="idariaTable">
    
    
</div>
<div id="columnTable">
    
    
</div>
@stop
