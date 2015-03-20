@extends('usermain')

@section('pageName')
 
    لیڈر 

@stop

@section('content')
<script>
    

$(document).ready(function(){
updateTable();
    $("#btn1").click(function(){
        var name = $("#name").val();
        var des = $("#des").val();
        $.post("Leader",
        {
         
          name: name,
          des:des
        },
        function(data,status){
         updateTable();
                
         alert("Data: " + data + "\nStatus: " + status);
            
        });

       
    });
    
   




});


function updateLeader( ID){
   var name = $("#name"+ID).val();
   var des = $("#des"+ID).val();
      
    $.post("updateLeader",
        {
         ID: ID,
        
          name: name,
          des:des
        },
        function(data,status){
            updateTable();
                
            alert("Data: " + data + "\nStatus: " + status);
            
        });
    
}

function deleteLeader( ID){
   
    $.post("deleteLeader",
        {
         ID: ID
        },
        function(data,status){
            updateTable();    
            alert("Data: " + data + "\nStatus: " + status);
             
            
        });
    
}

function updateTable(){
    $("#leaderTable").load("leaderTable");

}

</script>

<div style="width:88%; margin-left: auto; margin-right: auto;">


                               <div class="control-group" >
                                          <label class="control-label" for="focusedInput">لیڈر کا نام</label>
                                          <div class="controls">
                                              <input id="name" type="text" placeholder="لیڈر کا نام داخل کریں" />
                                          </div>
                                          
                                          <label class="control-label" for="focusedInput">عہدہ </label>
                                          <div class="controls">
                                              <input id="des" type="text" placeholder="عہدہ ٹائپ" />
                                          </div>
                                        </div>
     
<div class="form-actions">
                                        
                                          <button id="btn1" class="btn btn-primary">لیڈر شامل کریں</button>
                                        </div>     
         
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                       
                                         
                                              
                                      </div>
                                      
                                   </div>
                                    
                                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="span6"></div>
                                            
                                            <div class="span6"><div id="example2_filter" class="dataTables_filter">   
                                                
                                                </div></div></div>
                                    </div></div></div>                                          
                                        <div id="leaderTable">
                                      
                                        </div>
                                        
                                            </div>
                            </div>
                        </div>
                           

    
    
    
                             





@stop

