@extends('main')
@section('header')
<a class="brand" href="#" style="direction: rtl; float: right;">صارف پینل</a>
                    <div class="nav-collapse collapse" >
                        <ul class="nav pull-right" style="direction: rtl; float: left;">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i>  <i class="caret"></i>
 !السلام عليكم   
 {{Auth::user()->username}}  
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="profile">پروفائل</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="logout">لاگ آؤٹ کریں</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                
@stop
@section('sidebar')
<!--
<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li>
                            <a href="index"><i class="icon-chevron-right"></i> Dashboard</a>
                        </li>
                         
                         <li>
                            <a href="GenerateReport"><i class="icon-chevron-right"></i>
                               
                                
                                Generate Report</a>
                        </li>
                         <li>
                            <a href="Report"><i class="icon-chevron-right"></i>
                               
                                
                               Report</a>
                        </li>
                        <li>
                            <a href="PressRelease"><i class="icon-chevron-right"></i>
                               
                                
                               Press Release</a>
                        </li>
                        <li>
                            <a href="Columns"><i class="icon-chevron-right"></i>
                               
                                
                               columns</a>
                        </li>
                        <li>
                            <a href="City"><i class="icon-chevron-right"></i>
                               
                                
                                City</a>
                        </li>
                         <li>
                            <a href="Newspaper"><i class="icon-chevron-right"></i>
                               
                                
                                Newspaper</a>
                        </li>
                        <li>
                            <a href="Leader"><i class="icon-chevron-right"></i>
                               
                                
                                Leader</a>
                        </li>
                        
                        <li>
                            <a href="#"><span class="badge badge-warning pull-right">4,231</span> Logs</a>
                        </li>
                    </ul>
-->
@stop
@section('uppernav')
<ul class="nav" style="float:right;">
                           
                           
                            @if(Auth::user()->isAdmin)
                                <li>
                                    <a href='register'>نیاء یوزر </a>
                                </li>
                            @endif
                            
                            <li >
                                <a href="Tag">ٹیگ</a>
                            </li>
                           
                            <li >
                                <a href="City">شہر</a>
                            </li>
                            <li >
                                <a href="Newspaper">اخبار</a>
                            </li>
                            <li >
                                <a href="Leader">رہنما</a>
                            </li>
                             <li >
                                <a href="Columns">کالمز</a>
                            </li>
                            <li >
                                <a href="PressRelease">پریس ریلیز</a>
                            </li>
                             <li >
                                <a href="cReport">تمام مراکز کی تقابلی رپورٹ</a>
                            </li>
                         
                            
                            <li >
                                <a href="GenerateReport">روزانہ کی رپوٹ</a>
                            </li>
                            <li >
                                <a href="Report">رپورٹ میں اضافہ کریں</a>
                            </li>
                            <li >
                                <a href="index">ڈیش بورڈ</a>
                            </li> 
                        </ul>
@stop