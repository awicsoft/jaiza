@extends('usermain')

@section('pageName')
 اخبار
@stop

@section('content')
<script>
    



function addNewspaper(){
    
        var cityID = $("#cityID").val();
        var name = $("#name").val();
        var circularPeriod = $("#circularPeriod").val();
        var language = $("#language").val();
        var website = $("#website").val();
    
        $.post("Newspaper",
        {
          cityID:cityID,  
          name: name,
          circularPeriod:circularPeriod,
          language:language,
          website:website
        },
        function(data,status){
          
         updateTable();
                
         alert("Data: " + data + "\nStatus: " + status);
            
        });
        
      
}
function updateNewspaper( ID){
  
   var cityID = $("#cityID"+ID).val();
        var name = $("#name"+ID).val();
        var circularPeriod = $("#circularPeriod"+ID).val();
        var language = $("#language"+ID).val();
        var website = $("#website"+ID).val();
    
    $.post("updateNewspaper",
        {
          ID:ID,
          cityID:cityID,  
          name: name,
          circularPeriod:circularPeriod,
          language:language,
          website:website
        },
        function(data,status){
            updateTable();
                
            alert("Data: " + data + "\nStatus: " + status);
            
        });
    
}

function deleteNewspaper( ID){
   
    $.post("deleteNewspaper",
        {
         ID: ID
       
        },
        function(data,status){
            updateTable();    
            alert("Data: " + data + "\nStatus: " + status);
             
            
        });
    
}

function updateTable(){
    $("#newspaperTable").load("newspaperTable");

}

</script>

<div style="width:88%; margin-left: auto; margin-right: auto;">
                               <div class="control-group">
                                   <table>
                                   <tr>      
                                       <td>      <label class="control-label" for="focusedInput" style="padding-right: 10px">اخبار کا نام</label>
                                      </td>  
                                       <td>
                                        <div class="controls">
                                            <input id="name" name="name" class="input-xlarge focused" id="focusedInput" value="" type="text">
                                          </div>
                                       </td>
                                   </tr>
                                   <tr>      
                                       <td>      <label class="control-label" for="focusedInput" style="padding-right: 10px">
زبان </label>
                                      </td>  
                                       <td>
                                        <div class="controls">
                                            <select style="height: 50px;" id="language" name="language">
                                                <option value="اردو">اردو</option>
                                                <option value="انگریزی">انگریزی</option>
                                                <option value="پنجابی">پنجابی</option>
                                                <option value="پشتو">پشتو</option>
                                            
                                            </select>
                                            
                                          </div>
                                       </td>
                                   </tr>
                                   <tr>      
                                       <td>      <label class="control-label" for="focusedInput" style="padding-right: 10px">
ویب سائٹ </label>
                                      </td>  
                                       <td>
                                        <div class="controls">
                                            <input id="website" name="website" class="input-xlarge focused" id="focusedInput" value="" type="text">
                                          </div>
                                       </td>
                                   </tr>
                                    <tr>      
                                       <td>      <label class="control-label" for="focusedInput" style="padding-right: 10px">سرکلر دورانئے </label>
                                      </td>  
                                       <td>
                                        <div class="controls">
                                            <input id="circularPeriod" name="circularPeriod" class="input-xlarge focused" id="focusedInput" value="" type="text">
                                          </div>
                                       </td>
                                   </tr>
                                     <tr>      
                                       <td>      <label class="control-label" for="focusedInput" style="padding-right: 10px">
شہر </label>
                                      </td>  
                                       <td>
                                        <div class="controls">
                                            <select id="cityID">
                                                @foreach($citys as $city)
                                                <option value="{{$city->city_ID}}">{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                            
                                          </div>
                                       </td>
                                   </tr>
                                   </table>
                               
                               </div>

                                        
    <button onclick="addNewspaper();"  class="btn btn-primary">اخبار کا اضافہ کریں</button>
                                        </div>     

</div>                          

                                 
    
    
    
    
    
                             





@stop
@section('content2')
<script>
    
    $(document).ready(function(){
  
        updateTable();
        
    });

</script>
<div id='newspaperTable' style="float:none;">
    <br>
 

</div>

@stop