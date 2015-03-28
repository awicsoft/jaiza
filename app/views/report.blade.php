@extends    ('usermain')

@section('pageName')

رپورٹ
@stop

@section('content')
<script>
    

    function adddReport(){
       
       addAll();
        

    }
$(document).ready(function(){
    
updateTable1();
//loadAll();
    $("#btn1").click(function(){
       
        adddReport()    
      
        

       
    });
    
   




});

    function addAll(){
     
     @foreach($prs as $pr)
            @foreach($newspapers as $newspaper)
           
            
                    add({{$newspaper->ID}},{{$pr->pr_ID}} );
             
            @endforeach
    @endforeach
            
       alert("Sucessfully Added");
       updateTable1();

 }
    function add(npID,prID){
                var col = $("#co"+prID+"l"+npID).val();
                      var pg = $("#p"+prID+"g"+npID).val();
//alert(""+npID+"ss"+prID);
              $.post("Report",
                     {
                         
                         npID:npID,
                         prID:prID,
                         pg:pg,
                         cl:col



                     },
                     function(data,status){
                 

                      //alert("Data: " + data + "\nStatus: " + status);

                     });

 
     } 
 function loadAll(){
     @foreach($prs as $pr)
            @foreach($newspapers as $newspaper)
           
            
                    load({{$newspaper->ID}},{{$pr->pr_ID}} );
             
            @endforeach
       @endforeach
            
     
 }   
 
function updateTable1(){
@if(Input::has('date') && Input::has('city'))
updateTable('{{Input::get('date')}}','{{Input::get('city')}}');
@endif
} 
function updateTable(date ,city){

     $("#reportTable").load("reportTable?date="+date+"&add=2"+"&city="+city);

}
function report(){

         var date = $("#date01").val();
//    updateTable(date);
        var city = $("#city01").val();
	window.open("Report?date="+date+"&city="+city,'_self');
	
	
}
</script>
<div style="width:80%; margin-left: auto; margin-right: auto;">

     <div class="control-group" >
                                          
                                          <label class="control-label" for="date01">تاریخ ان پٹ</label>
                                             <input name="date" type="text" class="input-xlarge datepicker" id="date01" value="{{$date1}}">
                                             <label class="control-label" for="date01">شہر کا نام</label>
                                             <select name='city' id='city01'>
                   
                                                 @foreach($citys as $city)
                                                 <option 
                                                        @if(Input::get('city') == $city->city_ID)
                                                            selected = "selected"
                                                        @endif    
                                                  value="{{$city->city_ID}}">{{$city->name}}</option>
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
@stop
