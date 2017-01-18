@extends('themes.default1.layouts.master')
@section('content')
<style>
    .settingdivblue:hover {
        border: 5px double #3C8DBC;
    }
    .settingdivblue a:hover {
        /*            color: #61C5FF;*/
        /*            background-color: darkgrey;*/
    }
    .settingdivblue a {
        color: #3A83AD;
    }
    .settingiconblue p {
        text-align: center;
        font-size: 17px;
        word-wrap: break-word;
        font-variant: small-caps;
        font-weight: bold;
        line-height: 30px;
    }
    .settingdivblue {
        width: 70px;
        height: 70px;
        margin: 0 auto;
        text-align: center;
        border: 5px solid #C4D8E4;
        border-radius: 100%;
        padding-top: 5px;
    }
</style>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Settings</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <!--/.col-md-2-->
                <div class="col-md-2 col-sm-6">
                    <div class="settingiconblue">
                        <div class="settingdivblue">
                            <a href="{{ url('settings/system') }}">
                                <span class="fa-stack fa-2x">
                                    <i class="fa fa-laptop fa-stack-1x"></i>
                                </span>
                            </a>
                        </div>
                        <p class="box-title">System Settings</p>
                    </div>
                </div>
                <!--/.col-md-2-->
                 <!--col-md-2-->
                <div class="col-md-2 col-sm-6">
                    <div class="settingiconblue">
                        <div class="settingdivblue">
                            <a href="{{ url('settings/error') }}">
                                <span class="fa-stack fa-2x">
                                    <i class="fa fa-bug fa-stack-1x"></i>
                                </span>
                            </a>
                        </div>
                        <p class="box-title" >Error Log</p>
                    </div>
                </div>
                <!--/.col-md-2-->
                
                
               
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- ./box-body -->
</div>
<!-- /.box -->

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Email</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <!--col-md-2-->
                <div class="col-md-2 col-sm-6">
                    <div class="settingiconblue">
                        <div class="settingdivblue">
                            <a href="{{ url('settings/email') }}">
                                <span class="fa-stack fa-2x">
                                    <i class="fa fa-envelope fa-stack-1x"></i>
                                </span>
                            </a>
                        </div>
                        <p class="box-title" >Email Settings</p>
                    </div>
                </div>
                <!--/.col-md-2-->
                 <!--col-md-2-->
                <div class="col-md-2 col-sm-6">
                    <div class="settingiconblue">
                        <div class="settingdivblue">
                            <a href="{{ url('settings/template') }}">
                                <span class="fa-stack fa-2x">
                                    <i class="fa fa-folder fa-stack-1x"></i>
                                </span>
                            </a>
                        </div>
                        <p class="box-title" >Template Settings</p>
                    </div>
                </div>
                <!--/.col-md-2-->
                <!--/.col-md-2-->
                <div class="col-md-2 col-sm-6">
                    <div class="settingiconblue">
                        <div class="settingdivblue">
                            <a href="{{url('templates')}}">
                                <span class="fa-stack fa-2x">
                                    <i class="fa fa-file-text fa-stack-1x"></i>
                                </span>
                            </a>
                        </div>
                        <p class="box-title" >Templates</p>
                    </div>
                </div>
                <!--/.col-md-2-->
               
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- ./box-body -->
</div>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Api</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <!--col-md-2-->
                <div class="col-md-2 col-sm-6">
                    <div class="settingiconblue">
                        <div class="settingdivblue">
                            <a href="{{ url('github') }}">
                                <span class="fa-stack fa-2x">
                                    <i class="fa fa-github fa-stack-1x"></i>
                                </span>
                            </a>
                        </div>
                        <p class="box-title" >Github</p>
                    </div>
                </div>
                <!--/.col-md-2-->
                <!--col-md-2-->
                <div class="col-md-2 col-sm-6">
                    <div class="settingiconblue">
                        <div class="settingdivblue">
                            <a href="{{ url('mailchimp') }}">
                                <span class="fa-stack fa-2x">
                                    <i class="fa fa-mail-forward fa-stack-1x"></i>
                                </span>
                            </a>
                        </div>
                        <p class="box-title" >Mail Chimp</p>
                    </div>
                </div>
                <!--/.col-md-2-->
               
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- ./box-body -->
</div>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Common</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <!--/.col-md-2-->
                <div class="col-md-2 col-sm-6">
                    <div class="settingiconblue">
                        <div class="settingdivblue">
                            <a href="{{url('tax')}}">
                                <span class="fa-stack fa-2x">
                                    <i class="fa fa-dollar fa-stack-1x"></i>
                                </span>
                            </a>
                        </div>
                        <p class="box-title" >Tax</p>
                    </div>
                </div>
                <!--/.col-md-2-->
                <!--/.col-md-2-->
                <div class="col-md-2 col-sm-6">
                    <div class="settingiconblue">
                        <div class="settingdivblue">
                            <a href="{{url('currency')}}">
                                <span class="fa-stack fa-2x">
                                    <i class="fa fa-money fa-stack-1x"></i>
                                </span>
                            </a>
                        </div>
                        <p class="box-title" >Currency</p>
                    </div>
                </div>
                <!--/.col-md-2-->

                
                

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- ./box-body -->
</div>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Widgets</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <!--/.col-md-2-->
                <div class="col-md-2 col-sm-6">
                    <div class="settingiconblue">
                        <div class="settingdivblue">
                            <a href="{{ url('widgets') }}">
                                <span class="fa-stack fa-2x">
                                    <i class="fa fa-list-alt fa-stack-1x"></i>
                                </span>
                            </a>
                        </div>
                        <p class="box-title" >Footer</p>
                    </div>
                </div>
                <!--/.col-md-2-->                                        
                <!--col-md-2-->
                <div class="col-md-2 col-sm-6">
                    <div class="settingiconblue">
                        <div class="settingdivblue">
                            <a href="{{ url('social-media') }}">
                                <span class="fa-stack fa-2x">
                                    <i class="fa fa-cubes fa-stack-1x"></i>
                                </span>
                            </a>
                        </div>
                        <p class="box-title" >Social Media</p>
                    </div>
                </div>
                <!--/.col-md-2-->                                        
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- ./box-body -->
</div>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Plugins</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <!--/.col-md-2-->
                <div class="col-md-2 col-sm-6">
                    <div class="settingiconblue">
                        <div class="settingdivblue">
                            <a href="{{ url('plugin') }}">
                                <span class="fa-stack fa-2x">
                                    <i class="fa fa-plug fa-stack-1x"></i>
                                </span>
                            </a>
                        </div>
                        <p class="box-title" >Plugins</p>
                    </div>
                </div>
                <!--/.col-md-2-->

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- ./box-body -->
</div>
@stop