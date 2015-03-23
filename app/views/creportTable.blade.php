<script>
    $(document).ready(function(){
       // alert("ss");
        fillAll();
    });
    
    
    
    function fillAll(){
        @foreach($citys as $city)
            @foreach($newspapers as $newspaper)
            alert("ss");
                fillElement(
                        {{$newspaper->newspaper_ID}},
                        '{{$newspaper->name}}',
                        {{$city->city_ID}},
                        '{{$date1}}',
                        '{{$date2}}'
                        );
                
            @endforeach
        @endforeach
        
    }
    
    function fillElement(newpaperID,newspaperName,cityID,date1,date2){
        $("#elemen"+cityID+"t"+newspaperID).load("tableElement?cityID="+cityID+"&newspaperName="+newspaperName+"&date1="+date1+"&date2="+date2);
        
    }
</script>
<table style="width:100%; margin-left: auto; margin-right: auto; direction: rtl;" border='5px'>
    <tr>
        <th></th>
        @foreach($newspapers as $newspaper)
        <th style= "text-align: center;">{{$newspaper->name}}<!--<span lang="ur" dir="rtl" style="font-size:9px ; ">({{$newspaper->cityName}})</span>--></th>
        @endforeach
    </tr>
    
    @foreach($citys as $city)
    <tr>
        <td style= "width: 20px;text-align: center;">
            {{$city->name}}
        </td>
        
        
        @foreach($newspapers as $newspaper)
       <td  style= "text-align: center;">
            
           <div id="elemen{{$city->city_ID}}t{{$newspaper->newspaper_ID}}">
               
               
           </div>
            
            <!-- <button>a</button>-->
          </td>
        @endforeach
    </tr>
    @endforeach
    
</table>

  </div>
  @if(Input::has('add'))
<div class="form-actions">
                                        
    <button id="btn1" onclick="adddReport();"class="btn btn-primary">رپورٹ شامل کریں</button>
  </div>
  @endif