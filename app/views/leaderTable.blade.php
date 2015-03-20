     <table style="width:80%; margin-left: auto; margin-right: auto;" aria-describedby="example2_info" class="table table-striped table-bordered dataTable" id="example2" border="0" cellpadding="0" cellspacing="0">
                                        <thead>
                                            <tr role="row">
                                                 <th aria-label="Engine version: activate to sort column ascending" style="width: 142px;" colspan="1" rowspan="1" aria-controls="example2" tabindex="0" role="columnheader" class="sorting">نام </th>
                                              
                                               <th aria-label="Engine version: activate to sort column ascending" style="width: 142px;" colspan="1" rowspan="1" aria-controls="example2" tabindex="0" role="columnheader" class="sorting">عہدہ </th>
                                                <th aria-label="Engine version: activate to sort column ascending" style="width: 142px;" colspan="1" rowspan="1" aria-controls="example2" tabindex="0" role="columnheader" class="sorting">ایکشن </th>
                                            
                                            </tr>
                                        </thead>
                                        
                                    <tbody aria-relevant="all" aria-live="polite" role="alert">
                                        
                                        @foreach($leaders as $leader)
                                        <tr class="gradeA odd">
                                         
                                               <td class=" "><input id="name{{$leader->leader_ID}}" value='{{$leader->name}}' /></td>
                                                 <td class=" "><input id="des{{$leader->leader_ID}}" value='{{$leader->designation}}' /></td>
                                                 <td class=" ">
                                                     <button onclick="updateLeader({{$leader->leader_ID}})"  class="btn btn-primary">اپ ڈیٹ کریں</button>
                                                     <button onclick="deleteLeader({{$leader->leader_ID}})"  class="btn btn-danger">خارج کریں</button>
                                                
                                                 </td>
                                              
                                         </tr>
                                         @endforeach
        </tbody></table>