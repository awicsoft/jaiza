@extends('usermain')

@section('pageName')
 پریس ریلیز
@stop

@section('content')
<script>
    

$(document).ready(function(){
     $("#tagForm").load("Tag");
     
loadTable();



});
function makeSelectAction(){
   var type =  $("#type").val();
    if(type=='PIC'){
        
        loadUploadButton();
    }
    else{
        emptyUploadButton();
        
    }
    
}
function loadUploadButton(){
    //alert("ss");
     $("#uploadFileButton").load("uploadFileButton");
}
function emptyUploadButton(){
   // alert("ss");
     $("#uploadFileButton").load("empty");
} 

    function loadTable(){
    
     $("#prTable").load("pressReleaseTable");
 
   
}
function updateTable(){
      loadTable();  
        
    }
function   updateTagOptions(){
     location.reload();
    
}

</script>
{{ Form::open( [ 'url' => 'PressRelease', 'method' => 'post', 'files' => true ] ) }}

<table style="width:88%; margin-left: auto; margin-right: auto;">
    <tr><td> <label class="control-label" for="focusedInput">
تاریخ</label></td>
        
        <td>
         <input name="date" type="text" class="input-xlarge datepicker" id="date01" value="{{date('m/d/Y')}}">
                             
        </td>
    
    </tr>
    
    <tr><td> <label class="control-label" for="focusedInput">
عنوان</label></td>
        
        <td>
                <input id="title" name="title" type="text" placeholder="عنوان ٹائپ کریں" />
                                        
        </td>
    
    </tr>
    <tr><td> <label class="control-label" for="focusedInput">جگہ</label></td>
        
        <td>
                <input id="place" name="place" type="text" placeholder="جگہ ٹائپ کریں" />
                                        
        </td>
    
    </tr>
    <tr ><td> <label class="control-label" for="focusedInput">
تفصیلات</label></td>
        
        <td colspan="5">
               
		                        <!-- block -->
		                        
                                                
		                            <div class="block-content collapse in">
                                                <textarea name="details" id="ckeditor_full"></textarea>
		                            </div>
		                      
		                        <!-- /block -->
		                    
                                        
        </td>
    
    </tr>
    <tr><td> <label class="control-label" for="focusedInput">
قسم</label></td>
        
        <td>
            <select onchange= "makeSelectAction()" id='type' name="type">
                <option value="PR"> پریس ریلیز</option>
                <option value="PIC">تصویر</option>
            </select>
                                        
        </td>
  
    </tr>

    <tr id="uploadFileButton" >
        
    </tr>
  
    
    
    <tr><td> <label class="control-label" for="focusedInput">
رہنما</label></td>
        
        <td>
            <select id='leaderID' name="leaderID">
           @foreach($leaders as $leader)
                <option value="{{$leader->leader_ID}}">{{$leader->name}}</option>
           @endforeach     
            </select>                            
        </td>
    
    </tr>
    <tr>    
        
        <div class="control-group">
                                        <td>  <label class="control-label" for="multiSelect2">ٹیگز </label>
                                        </td>
                                        <td>
                                            <div class="controls">
                                            <select   id="tags[]"  name='tags[]' multiple="multiple" id="multiSelect2" class="chzn-select span4">
                                            @foreach($tags as $tag)
                                                <option>{{$tag->title_tag}}</option>
                                                
                                           @endforeach
                                            </select>
                                                
                                          </div>
                                        </td>
                                      <!--  <td id='tagForm'></td>-->
        </div>                                 
   </tr>                                    
</table>

                            
                             
<div class="form-actions" style="width:80%; margin-left: auto; margin-right: auto;">
                                        
    <input name="btnAdd" type="submit" id="btn1" class="btn btn-primary" value="پریس ریلیز شامل کریں" />
                                        </div>     
                   </form>          
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                       
                                         
                                              
                                      </div>
                                      
                                   </div>
                                    
                                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="span6"></div>
                                            
                                            <div class="span6"><div id="example2_filter" class="dataTables_filter">   
                                                
                                                </div></div></div>
                                        
                                        
                                            </div>
                            </div>
                        </div>
<div class="span12">
                                 
    
    
    
    
    
</div>






@stop


@section('content2')
                                        <div id="prTable">
                                      
                                        </div>

@stop