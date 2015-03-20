<script>
    function deleteColumns(pr_ID){
           $.post("deleteColumns",
        {
         cloumns_ID: pr_ID
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
                                               <th aria-label="Engine version: activate to sort column ascending" style="width: 142px;" colspan="1" rowspan="1" aria-controls="example2" tabindex="0" role="columnheader" class="sorting">تاریخ </th>
                                           
                                                <th aria-label="Engine version: activate to sort column ascending" style="width: 142px;" colspan="1" rowspan="1" aria-controls="example2" tabindex="0" role="columnheader" class="sorting">
عنوان </th>
                                                <th aria-label="Engine version: activate to sort column ascending" style="width: 142px;" colspan="1" rowspan="1" aria-controls="example2" tabindex="0" role="columnheader" class="sorting">
ایکشن </th>
                                            
                                            </tr>
                                        </thead>
                                        
                                    <tbody aria-relevant="all" aria-live="polite" role="alert">
                                        
                                        @foreach($cls as $cl)
                                        <tr class="gradeA odd">
                                         
                                                
                                               <td class=" ">{{$cl->date}}</td>
                                               <td class=" ">{{$cl->title}}</td>
                                                
                                               <td class=" ">
                                                 
                                                     <button onclick="editPressRelease({{$cl->colmuns_ID}})"  class="btn btn-primary">ترمیم کریں</button>
                                                     <button onclick="deleteColumns({{$cl->colmuns_ID}})"  class="btn btn-danger">
خارج کر دیں</button>
                                                
                                                 </td>
                                              
                                         </tr>
                                         @endforeach
        </tbody></table>