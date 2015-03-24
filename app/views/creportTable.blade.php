@extends('template.jaiza.layout2')
@section('content2')
<script>
    
$(document).ready(function(){
fillAll();
 //  $("#2element15").load("empty");
});

    function fillAll(){
    var newspaperID =0;
        var newspaperName = "";
        var cityID = 0;
        var date1 = "";
        var date2 = "";

        @foreach($citys as $city)
            @foreach($newspapers as $newspaper)
                newspaperID =  {{$newspaper->newspaper_ID}};
                newspaperName = '{{$newspaper->name}}';
                cityID = {{$city->city_ID}};
                date1 = '{{$date1}}';
                date2 = '{{$date2}}';
              
                fillElement(newspaperID,newspaperName,cityID,date1,date2);
                
            @endforeach
        @endforeach

    
        }
    
    function fillElement(newspaperID,newspaperName,cityID,date1,date2){
     var url = "tableElement?cityID="+cityID+"&newspaperName="+newspaperName+"&date1="+date1+"&date2="+date2;
    // alert(url);
     
     var ele = "#"+cityID+"element"+newspaperID;
     //  $(ele).load("empty");
        $(ele).load(url);
         //alert(ele);
         //alert();
        
    }
</script>  

<table style="width:100%; margin-left: auto; margin-right: auto; direction: rtl;" border='5px'>
    <tr>
        <th></th>
        @foreach($newspapers as $newspaper)
        <th style= "text-align: center;">{{$newspaper->name}}<!--<span lang="ur" dir="rtl" style="font-size:9px ; ">({{$newspaper->cityName}})</span>--></th>
        @endforeach
    </tr>
    <?php $i=0;?>
    @foreach($citys as $city)
    <tr>
        <td style= "width: 20px;text-align: center;">
            {{$city->name}}
        </td>
        
        
        @foreach($newspapers as $newspaper)
       
        <td  style= "text-align: center;">
          {{$data[$i]}}
            <?php $i++;?>
          </td>
        @endforeach
    </tr>
    @endforeach 
    
</table>

  </div>
 
  
  
  @stop