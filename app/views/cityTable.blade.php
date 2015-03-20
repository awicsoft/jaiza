
<table style="width:80%; margin-left: auto; margin-right: auto;" aria-describedby="example2_info" class="table table-striped table-bordered dataTable" id="example2" border="0" cellpadding="0" cellspacing="0">
                                        <thead>
                                            <tr role="row">
                                                <th   style="width: 142px; " colspan="1" rowspan="1" aria-controls="example2" tabindex="0" role="columnheader" class="sorting" ><span dir="rtl" lang="ur">نام</span></th>
                                                <th dir="rtl" lang="ur"   style="width: 142px;" colspan="1" rowspan="1" aria-controls="example2" tabindex="0" role="columnheader" class="sorting">عمل </th>
                                            
                                            </tr>
                                        </thead>
                                        
                                    <tbody aria-relevant="all" aria-live="polite" role="alert">
                                        
                                        @foreach($citys as $city)
                                        <tr class="gradeA odd">
                                         
                                                <input type='hidden' id="cityID" name='city_ID' value = '{{$city->city_ID}}' />
                                               <td class=" "><input id="mycity{{$city->city_ID}}" name='name' value='{{$city->name}}' /></td>
                                                 <td class=" ">
                                                     <button onclick="updateCity({{$city->city_ID}})"  class="btn btn-primary">اپ ڈیٹ</button>
                                                     <button onclick="deleteCity({{$city->city_ID}})"  class="btn btn-danger">مٹا دیں</button>
                                                
                                                 </td>
                                              
                                         </tr>
                                         @endforeach
        </tbody></table>