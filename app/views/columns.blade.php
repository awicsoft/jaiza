@extends('usermain')

@section('pageName')
کالمز
@stop

@section('content')
<script>
    

$(document).ready(function(){
     $("#tagForm").load("Tag");
          $("#uploadFileButton").load("uploadFileButton");

loadTable();



});
function loadTable(){
    
     $("#prTable").load("columnsTable");
 
   
}
function updateTable(){
      loadTable();  
        
    }
function   updateTagOptions(){

        location.reload();


}

</script>
{{ Form::open( [ 'url' => 'Columns', 'method' => 'post', 'files' => true ] ) }}
<!--<form method="POST" action="Columns" 
  accept-charset="UTF-8" enctype="multipart/form-data">-->
<table style="width:88%; margin-left: auto; margin-right: auto;">
    <tr><td> <label class="control-label" for="focusedInput">عنوان</label></td>
        
        <td>
                <input id="title" name="title" type="text" placeholder="
عنوان ٹائپ کریں" />
                                        
        </td>
    
    </tr>
    
    <tr ><td> <label class="control-label" for="focusedInput">خلاصہ </label></td>
        
        <td colspan="5">
               
		                        <!-- block -->
		                        
                                                
		                            <div class="block-content collapse in">
                                                <textarea name="summary" id="ckeditor_full"></textarea>
		                            </div>
		                      
		                        <!-- /block -->
		                    
                                        
        </td>
    
    </tr>
     <tr >
         <td> <label class="control-label" for="focusedInput">تفصیلات</label></td>
        
        <td colspan="5">
               
		                        <!-- block -->
		                        
                                                
		                            <div  class="block-content collapse in">
                                                <textarea name="details" id="ckeditor_full"></textarea>
		                            </div>
		                      
		                        <!-- /block -->
		                    
                                        
        </td>
    
    </tr>
    <tr><td> <label class="control-label" for="focusedInput">لنک</label></td>
        
        <td>
                <input id="link" name="link" type="text" placeholder="لنک ٹائپ کریں" />
                                        
        </td>
    
    </tr>
    <tr id='uploadFileButton'>
    
    </tr>
    <tr>
        <td> <label class="control-label" for="focusedInput">
اخبار</label></td>
        
        <td>
            <select id='newspaperID' name="newspaperID">
           @foreach($newspapers as $newspaper)
                <option value="{{$newspaper->newspaper_ID}}">{{$newspaper->name}}</option>
           @endforeach     
            </select>                            
        </td>
    
    </tr>
      <tr>
        <td> <label class="control-label" for="focusedInput">رہنما</label></td>
        
        <td>
            <select id='leaderID' name="leaderID">
           @foreach($leaders as $leader)
                <option value="{{$leader->leader_ID}}">{{$leader->name}}</option>
           @endforeach     
            </select>                            
        </td>
    
    </tr>
    
    <tr>
        <td> <label class="control-label" for="focusedInput">قسم</label></td>
        
        <td>
            <select id='type' name="type">
                <option value="Column">کالمز</option>
                <option value="News">خبر</option>
                <option value="Idaria">اداریہ</option>
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
            
        </div>                                 
   </tr>                                    
</table>

                            
                             
<div class="form-actions"style="width:88%; margin-left: auto; margin-right: auto;">
                                        
    <input type="submit" name="btnAdd" class="btn btn-primary" value="کالم کا اضافہ کریں" />
                                        </div>     
                   {{ Form::close() }}    
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                       
                                         
                                              
                                      </div>
                                      
                                   </div>
                                    
                                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="span6"></div>
                                            
                                            <div class="span6"><div id="example2_filter" class="dataTables_filter">   
                                                
                                                </div></div></div>
                                        
                                        <div id="prTable">
                                      
                                        </div>
                                        
                                            </div>
                            </div>
                        </div>
<div class="span12">
                                 
    
    
    
    
    
</div>






@stop

