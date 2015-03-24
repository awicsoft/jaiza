@extends('usermain')

@section('pageName')
پروفائل
@stop

@section('content')
    
                             
<div style="width:80%; margin-left: auto; margin-right: auto;">
         
                        
                        <!-- CONTENT GOES HERE -->    
                        <?php if(@$message!="") {?>
                       <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong>{{@$message}}</strong> 
                                </div>
                       <?php }?> 
                               
                            <form action="updatePersonal" method="post">

                            <div class="" ="col-sm-6">
                                <div class="input-group mb15">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="name" value="{{$user->name}}" class="form-control"  placeholder="نام درح کریں" type="text">
                                </div><!-- input-group -->
                            <div class="input-group mb15">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="email" value="{{$user->email}}" class="form-control" placeholder="میل درح کریں " type="text">
                                </div>
                            <div class="clearfix">
                            
                            <div class="">
                                <button name="up" type="submit" class="btn btn-success">پروئل آپڈیٹ کریں <i class="fa fa-angle-right ml5"></i></button>
                            </div>
                      
                        </form>
                       
                             
                             <h5><i class="glyphicon glyphicon-eye-open"></i><b> Security </b> </h5>
                              <form method="post" action="updatePassword" >
                       
                            
                            <div class="col-sm-6">
                                <div class="input-group mb15">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="cpassword" class="form-control" placeholder="Enter Current password" type="password">
                                </div><!-- input-group -->
                            </div> 
                            
                        
                            
                          
                        </div>
                     
                          
                            <div class="col-sm-6">
                                <div class="input-group mb15">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-repeat"></i></span>
                                    <input name="npassword" class="form-control" placeholder="Enter New password" type="password">
                                </div><!-- input-group -->
                            </div> 
                            
                        
                            
                          
                       
                       
                       
                            <div class="col-sm-6">
                                <div class="input-group mb15">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-repeat"></i></span>
                                    <input name="rpassword" class="form-control" placeholder="Re-Enter new Password" type="password">
                                </div><!-- input-group -->
                            </div>
                            
                            
                       
                        
                        <div class="clearfix">
                            
                            <div class="">
                                <button name="upw" type="submit" class="btn btn-success">Update Password <i class="fa fa-angle-right ml5"></i></button>
                            </div>
                            </form>
                        </div>
                   
                            </div> 
                            
                            
                            
                              
                            <br>
                            
                            
                      
                          
                            </div>                      

@stop