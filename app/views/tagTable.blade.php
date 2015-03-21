<script>
function updateTag( ID){
   var cityName = $("#mycity"+ID).val();
     
    $.post("updateTag",
        {
         ID: ID,
         btn:'Update',
          name: cityName
        },
        function(data,status){
            updateTable();
                
            alert("Data: " + data + "\nStatus: " + status);
            
        });
    
}

function deleteTag( ID){
   
     $.post("deleteTag",
        {
         tag_ID: ID
        },
        function(data,status){
            updateTable();    
            alert("Data: " + data + "\nStatus: " + status);
             
            
        });
    
}

</script>


<table style="width:80%; margin-left: auto; margin-right: auto;" aria-describedby="example2_info" class="table table-striped table-bordered dataTable" id="example2" border="0" cellpadding="0" cellspacing="0">
                                        <thead>
                                            <tr role="row">
                                                <th   style="width: 142px; " colspan="1" rowspan="1" aria-controls="example2" tabindex="0" role="columnheader" class="sorting" ><span dir="rtl" lang="ur">نام</span></th>
                                                <th dir="rtl" lang="ur"   style="width: 142px;" colspan="1" rowspan="1" aria-controls="example2" tabindex="0" role="columnheader" class="sorting">عمل </th>
                                            
                                            </tr>
                                        </thead>
                                        
                                    <tbody aria-relevant="all" aria-live="polite" role="alert">
                                        
                                        @foreach($tags as $tag)
                                        <tr class="gradeA odd">
                                    
                                                <input type='hidden' id="ID" name='ID' value = '{{$tag->tag_ID}}' />
                                               <td class=" "><input id="mycity{{$tag->tag_ID}}" name='name' value='{{$tag->title_tag}}' /></td>
                                                 <td class=" ">
                                                     <button onclick="updateTag({{$tag->tag_ID}})"  class="btn btn-primary">اپ ڈیٹ</button>
                                                     <button onclick="deleteTag({{$tag->tag_ID}})"  class="btn btn-danger">مٹا دیں</button>
                                                
                                                 </td>
                                         </tr>
                                         @endforeach
        </tbody></table>