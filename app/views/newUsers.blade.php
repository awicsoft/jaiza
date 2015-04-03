@extends('usermain')

@section('pageName')
نیاء یوزر
@stop

@section('content')
<script>
    

$(document).ready(function(){
    
loadTable();



});

    function loadTable(){
    
     $("#prTable").load("userTable");
 
   
}
function updateTable(){
      loadTable();  
        
    }
function   updateTagOptions(){

        location.reload();


}

</script>
<section>
            
            <div class="panel panel-signup">
                <div class="panel-body">
                   
                    <p class='text-center' style="color:red;">{{{  $message or '' }}}</p>
                    </p>
                    
                    <div class="mb30"></div>
                    
                    <form action="register" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group mb15">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="username" value="{{@$username}}" type="text" class="form-control" placeholder="Enter Username">
                                </div><!-- input-group -->
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group mb15">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input name="email" type="email" value="{{@$email}}" class="form-control" placeholder="Enter Email Address">
                                </div><!-- input-group -->
                            </div>
                            
                        </div><!-- row -->
                        <br />
                        <div class="row">
                            
                            <div class="col-sm-6">
                                <div class="input-group mb15">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input name="password" type="password" class="form-control" placeholder="Enter Password">
                                </div><!-- input-group -->
                            </div>
                             <div class="col-sm-6">
                                <div class="input-group mb15">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input name="rpassword" type="password" class="form-control" placeholder="Re Enter Password">
                                </div><!-- input-group -->
                            </div>
                        </div><!-- row -->
                        <br />
                        <div class="clearfix">
                            <div class="pull-left">
                                
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-success">Create New Account <i class="fa fa-angle-right ml5"></i></button>
                            </div>
                        </div>
                    </form>
                    
                </div><!-- panel-body -->
            </div><!-- panel -->
            
        </section>
    
    
    
    
    
</div>






@stop

@section('content2')
                                        <div id="prTable">
                                      
                                        </div>

@stop