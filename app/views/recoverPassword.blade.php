@extends('main')

@section('content')
<section>
            
            <div class="panel panel-signin">
                <div class="panel-body">
                    <div class="logo text-center">
                         <H3>	شعبہ نشرواشاعت جماعت اسلامی پاکستان</h3>
                    </div>
                    <br />
                    <h4 class="text-center mb5">آپ Password بھول جاتے ہیں؟</h4>
                    <p class="text-center">صرف ہم اسے ٹھیک ہو جائے گا ہمیں اپنا ای میل کو بتائیں</p>
                     <p class='text-center' style="color:red;">{{{  $message or '' }}}</p>
                    <div class="mb30"></div>
                    
                    <form action="recoverPassword" method="post">
                        <div class="input-group mb15">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input name="email" type="email" value="{{@$email}}" class="form-control" placeholder="ای میل ایڈریس درج کریں">
                        </div><!-- input-group -->
                        <!-- input-group -->
                        
                        <div class="clearfix">
                            <div class="pull-left">
                                
                            </div>
                           
                            <div class="pull-right">
                                <button type="submit" class="btn btn-success">میرا پاسورڈ بازیافت <i class="fa fa-angle-right ml5"></i></button>
                            </div>
                        </div>                      
                    </form>
                    
                </div><!-- panel-body -->
                <div class="panel-footer">
                    <a href="login" class="btn btn-primary btn-block">یہاں لاگ ان کریں</a>
                </div><!-- panel-footer -->
            </div><!-- panel -->
            
        </section>


@stop