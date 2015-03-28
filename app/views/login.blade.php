@extends('main')

@section('content')
<section>
            
            <div class="panel panel-signin">
                <div class="panel-body">
                    <div class="logo text-center">
                        <img src="images/logo-primary.png" alt="Jaiza" >
                    </div>
                    <br />
                    <h4 class="text-center mb5">پہلے سے ہی رکن ؟</h4>
                    <p class="text-center">اکاؤنٹ میں سائن ان کریں</p>
                     <p class='text-center' style="color:red;">{{{  $message or '' }}}</p>
                    <div class="mb30"></div>
                    <center>
                    <form action="login" method="post">
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="username" type="text" class="form-control" placeholder="Username">
                        </div><!-- input-group -->
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input name="password" type="password" class="form-control" placeholder="Password">
                        </div><!-- input-group -->
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                             <a href="recoverPassword">پاس ورڈ بازیافت</a>
                        </div><!-- input-group -->
                        
                        <div class="clearfix">
                            
                            <div class="pull-right">
                                <button type="submit" class="btn btn-success">سائن ان کریں <i class="fa fa-angle-right ml5"></i></button>
                            </div>
                        </div>                      
                    </form>
                    </center>
                </div><!-- panel-body -->
             <!--   <div class="panel-footer">
                    <a href="register" class="btn btn-primary btn-block">Not yet a Member? Create Account Now</a>
                </div><!-- panel-footer -->
            </div><!-- panel -->
            
        </section>


@stop