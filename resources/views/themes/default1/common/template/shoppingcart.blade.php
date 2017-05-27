@extends('themes.default1.layouts.front.master')
@section('title')
pricing
@stop
@section('page-header')
Pricing
@stop
@section('breadcrumb')
<li><a href="{{url('home')}}">Home</a></li>
<li class="active">Pricing</li>
@stop
@section('main-class') 
main
@stop


@section('content')

<div class="row">
    <div class="col-md-12 center">
        <h4><strong>Help Desk </strong>Pricing Plans</h4>
    </div>
</div>
<div class="row">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissable">
        <i class="fa fa-ban"></i>
        <b>{{Lang::get('message.alert')}}!</b> {{Lang::get('message.success')}}.
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{Session::get('success')}}
    </div>
    @endif
    <!-- fail message -->
    @if(Session::has('fails'))
    <div class="alert alert-danger alert-dismissable">
        <i class="fa fa-ban"></i>
        <b>{{Lang::get('message.alert')}}!</b> {{Lang::get('message.failed')}}.
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{Session::get('fails')}}
    </div>
    @endif

    <!--<div class="col-md-12 col-md-offset-3">-->
    <div class="pricing-table princig-table-flat">
        <!-- Community -->
        @if(array_key_exists('7',$trasform))
        <div class="col-md-3 col-sm-6">
            <div class="plan">
                <h3>HELP DESK COMMUNITY<span>{!! $trasform[7]['price'] !!}</span><small>Lifetime</small></h3>
                <ul>
                    <li><strong>Use</strong> on unlimited domain/site</li>
                    <li><i class="fa fa-close" style="color:red;"> </i> <strong>Installation</strong> &amp; Configuration</li>
                    <li><i class="fa fa-close" style="color:red;"></i> <strong>Advance</strong> Features</li>
                    <li><strong>Unlimited</strong> Agents</li>
                    <li><strong>Open </strong>Source</li>
                    <li><i class="fa fa-close" style="color:red;"></i> <strong>Support</strong></li>
                    <li><i class="fa fa-close" style="color:red;"></i> <strong>Plugins</strong> Multi platform integration</li>
                    <li><i class="fa fa-close" style="color:red;"></i> <strong>API</strong> documentation &amp; support</li>
                    <li>
                        <form method="GET" action="{{url('pricing?id=7')}}" accept-charset="UTF-8">
                            
                            <input name="id" type="hidden" value="7">
                           
                                <input type='submit' value='Buy' class='btn btn-primary'>
                        </form>
                    </li>
                </ul>
                
            </div>
        </div>
        @endif
        @if(array_key_exists('14',$trasform))
        <div class="col-md-3 col-sm-6 center">
            <div class="plan">
                <h3>HELP DESK SMART<span>{!!$trasform[14]['price']!!}</span><small>One Time</small></h3>

                <ul>
                    <li><strong>Use</strong> on one domain/site</li>
                    <li><strong>Installation</strong> &amp; Configuration</li>
                    <li><strong> Advance </strong>Features</li>
                    <li><strong>5 Agents</strong></li>
                    <li><i class="fa fa-close" style="color:red;"></i>  <strong>Open </strong>Source</li>
                    <li><strong>1 Year</strong> free support &amp; software updates</li>
                    <li><strong> Plugins</strong> Multi platform integration</li>
                    <li><strong>API</strong> documentation &amp; support</li>
                    <li>
                        <form method="GET" action="{{url('pricing?id=14')}}" accept-charset="UTF-8">
                            
                            <input name="id" type="hidden" value="14">
                           
                                <input type='submit' value='Buy' class='btn btn-primary'>
                        </form>
                    </li>
                </ul>
                
                
            </div>
        </div>
        @endif
        @if(array_key_exists('15',$trasform))
        <div class="col-md-3 col-sm-6">
            <div class="plan">
                <h3>HELP DESK PRO<span>{!!$trasform[15]['price']!!}</span><small>One Time</small></h3>

                <ul>
                    <li><strong>Use</strong> on one domain/site</li>
                    <li><strong>Installation</strong> &amp; Configuration</li>
                    <li><strong>Advance </strong>Features</li>
                    <li><strong>Unlimited</strong> Agents</li>
                    <li><i class="fa fa-close" style="color:red;"></i>  <strong>Open </strong>Source</li>
                    <li><strong>1 Year</strong> free support &amp; software updates</li>
                    <li><strong>Plugins</strong> Multi platform integration</li>
                    <li><strong>API</strong> documentation &amp; support</li>
                    <li>
                        <form method="GET" action="{{url('pricing?id=15')}}" accept-charset="UTF-8">
                            
                            <input name="id" type="hidden" value="15">
                           
                                <input type='submit' value='Buy' class='btn btn-primary'>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        @endif
        @if(array_key_exists('8',$trasform))
        <div class="col-md-3 col-sm-6">
            <div class="plan">
                <h3>HELP DESK ADVANCE<span>{!!$trasform[8]['price']!!}</span><small>One Time</small></h3>
                <ul>
                    <li><strong>Use</strong> on one domain/site</li>
                    <li><strong>Installation</strong> &amp; Configuration</li>
                    <li><strong> Advance </strong>Features</li>
                    <li><strong>Unlimited</strong> Agents</li>
                    <li><strong>Open </strong>Source</li>
                    <li><strong>1 Year</strong> free support &amp; software updates</li>
                    <li><strong>Plugins</strong> Multi platform integration</li>
                    <li><strong>API</strong> documentation &amp; support</li>
                    <li>
                        <form method="GET" action="{{url('pricing?id=8')}}" accept-charset="UTF-8">
                            
                            <input name="id" type="hidden" value="8">
                           
                                <input type='submit' value='Buy' class='btn btn-primary'>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        @endif
    </div>

</div>
<div class="row">
    <div class="col-md-12 center">
        <h4><strong>Service Desk </strong>Pricing Plans</h4>
    </div>
</div>

<div class="row">
    <div class="pricing-table princig-table-flat">
        @if(array_key_exists('13',$trasform))
        <div class="col-md-3 col-sm-6">
            <div class="plan">
                <h3>Service Desk Community <span>{!!$trasform[13]['price']!!}</span><small>Lifetime</small></h3>
                <ul>

                    <li><strong>Use</strong> on unlimited domain/site</li>
                    <li><strong>ITIL / ITSM Ready</strong></li>
                    <li><strong>Asset</strong> Management</li>
                    <li><strong>Open </strong>Source</li>
                    <li><i class="fa fa-close" style="color:red;"></i> <strong>Advance</strong> Features</li>
                    <li><strong>Unlimited</strong> Agents</li>
                    <li><i class="fa fa-close" style="color:red;"></i> <strong>Support</strong></li>
                    <li><i class="fa fa-close" style="color:red;"></i> <strong>Plugins</strong> Multi platform integration</li>
                    <li><i class="fa fa-close" style="color:red;"></i> <strong>API</strong> documentation &amp; support</li>

                    <li>
                        <form method="GET" action="{{url('pricing?id=13')}}" accept-charset="UTF-8">
                            
                            <input name="id" type="hidden" value="13">
                           
                                <input type='submit' value='Buy' class='btn btn-primary'>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        @endif
        @if(array_key_exists('21',$trasform))
        <div class="col-md-3 col-sm-6 center">
            <div class="plan">
                <h3>Service Desk Smart <span>₹ 34,999</span><small>One Time</small></h3>

                <ul>

                    <li><strong>Use</strong> on one domain/site</li>
                    <li><strong>ITIL / ITSM Ready</strong></li>
                    <li><strong>Asset</strong> Management</li>
                    <li><i class="fa fa-close" style="color:red;"></i><strong>Open </strong>Source</li>
                    <li><strong>Advance</strong> Features</li>
                    <li><strong>5</strong> Agents</li>
                    <li><strong>1 Year</strong> free support &amp; software updates</li>
                    <li><strong>Plugins</strong> Multi platform integration</li>
                    <li><strong>API</strong> documentation &amp; support</li>

                   <li>
                        <form method="GET" action="{{url('pricing?id=7')}}" accept-charset="UTF-8">
                            
                            <input name="id" type="hidden" value="7">
                           
                                <input type='submit' value='Buy' class='btn btn-primary'>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        @endif
        @if(array_key_exists('22',$trasform))
        <div class="col-md-3 col-sm-6">
            <div class="plan">
                <h3>Service Desk Pro<span>₹ 69,999</span><small>One Time</small></h3>

                <ul>

                    <li><strong>Use</strong> on one domain/site</li>
                    <li><strong>ITIL / ITSM Ready</strong></li>
                    <li><strong>Asset</strong> Management</li>
                    <li><i class="fa fa-close" style="color:red;"></i><strong>Open </strong>Source<strong>
                        </strong></li>
                    <li><strong>Advance</strong> Features</li>
                    <li><strong>Unlimited</strong> Agents</li>
                    <li><strong>1 Year</strong> free support &amp; software updates</li>
                    <li><strong>Plugins</strong> Multi platform integration</li>
                    <li><strong>API</strong> documentation &amp; support</li>

                    <li>
                        <form method="GET" action="{{url('pricing?id=7')}}" accept-charset="UTF-8">
                            
                            <input name="id" type="hidden" value="7">
                           
                                <input type='submit' value='Buy' class='btn btn-primary'>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        @endif
        @if(array_key_exists('12',$trasform))
        <div class="col-md-3 col-sm-6">
            <div class="plan">
                <h3>Service Desk Advance<span>{!!$trasform[12]['price']!!}</span><small>One Time</small></h3>
                <ul>
                    <li><strong>Use</strong> on one domain/site</li>
                    <li><strong>ITIL / ITSM Ready</strong></li>
                    <li><strong>Asset</strong> Management</li>
                    <li><strong>Open </strong>Source<strong>
                        </strong></li>
                    <li><strong>Advance</strong> Features</li>
                    <li><strong>Unlimited</strong> Agents</li>
                    <li><strong>1 Year</strong> free support &amp; software updates</li>
                    <li><strong>Plugins</strong> Multi platform integration</li>
                    <li><strong> API</strong> documentation &amp; support</li>
                    <li>
                        <form method="GET" action="{{url('pricing?id=12')}}" accept-charset="UTF-8">
                            
                            <input name="id" type="hidden" value="12">
                           
                                <input type='submit' value='Buy' class='btn btn-primary'>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        @endif
    </div>

</div>

</div>

@stop

