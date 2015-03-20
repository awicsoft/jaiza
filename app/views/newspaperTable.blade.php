    <br>
 <table aria-describedby="example2_info" class="table table-striped table-bordered dataTable" id="example2" border="0" cellpadding="0" cellspacing="0">
                                        <thead>
                                            <tr role="row">
                                               <th aria-label="Engine version: activate to sort column ascending" style="width: 2px;" colspan="1" rowspan="1" aria-controls="example2" tabindex="0" role="columnheader" class="sorting">
نام </th>
                                               <th aria-label="Engine version: activate to sort column ascending" style="width: 42px;" colspan="1" rowspan="1" aria-controls="example2" tabindex="0" role="columnheader" class="sorting">
شہر </th>
                                               <th aria-label="Engine version: activate to sort column ascending" style="width: 42px;" colspan="1" rowspan="1" aria-controls="example2" tabindex="0" role="columnheader" class="sorting">
زبان </th>
                                               <th aria-label="Engine version: activate to sort column ascending" style="width: 42px;" colspan="1" rowspan="1" aria-controls="example2" tabindex="0" role="columnheader" class="sorting">سرکلر دورانئے</th>
                                               <th aria-label="Engine version: activate to sort column ascending" style="width: 42px;" colspan="1" rowspan="1" aria-controls="example2" tabindex="0" role="columnheader" class="sorting">
ویب سائٹ </th>
                                               
                                               <th aria-label="Engine version: activate to sort column ascending" style="width: 142px;" colspan="1" rowspan="1" aria-controls="example2" tabindex="0" role="columnheader" class="sorting">
ایکشن </th>
                                            
                                            </tr>
                                        </thead>
                                        
                                    <tbody aria-relevant="all" aria-live="polite" role="alert">
                                        
                                        @foreach($newspapers as $newspaper)
                                        <tr class="gradeA odd">
                                         
                                                
                                               <td class=" "><input id="name{{$newspaper->ID}}" name='name' value='{{$newspaper->name}}' /></td>
                                               <td class=" ">
                                                   
                                                   <select id="cityID{{$newspaper->ID}}">
                                                    @foreach($citys as $city)
                                                       <option 
                                                           <?php
                                                         if($city->city_ID == $newspaper->cityID)
                                                             echo "selected='selected'";
                                                       ?> 
                                                           value="{{$city->city_ID}}">{{$city->name}}
                                                       
                                                       </option>
                                                  @endforeach
                                                   </select>
                                                    
                                               
                                               
                                               
                                               </td>
                                               <td class=" "><input id="language{{$newspaper->ID}}" name='name' value='{{$newspaper->language}}' /></td>
                                               <td class=" "><input id="circularPeriod{{$newspaper->ID}}" name='name' value='{{$newspaper->circularPeriod}}' /></td>
                                               <td class=" "><input id="website{{$newspaper->ID}}" name='name' value='{{$newspaper->website}}' /></td>
                                               
                                               
                                               
                                               <td class=" ">
                                                     <button onclick="updateNewspaper({{$newspaper->ID}})"  class="btn btn-primary">
اپ ڈیٹ کریں</button>
                                                     <button onclick="deleteNewspaper({{$newspaper->ID}})"  class="btn btn-danger">خارج کر دیں</button>
                                                
                                                 </td>
                                              
                                         </tr>
                                         @endforeach
                                    </tbody>
 </table>