@extends('themes.default1.layouts.master')
@section('content')
<div class="box box-primary">

    <div class="box-header">

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
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{Session::get('success')}}
        </div>
        @endif
        
        @if(Session::has('warning'))
        <div class="alert alert-warning alert-dismissable">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{Session::get('warning')}}
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
        {!! Form::model($user,['url'=>'clients/'.$user->id,'method'=>'PATCH']) !!}

        <h4>{{Lang::get('message.client')}}	{!! Form::submit(Lang::get('message.update'),['class'=>'form-group btn btn-primary pull-right'])!!}</h4>

    </div>

    <div class="box-body">

        <div class="row">

            <div class="col-md-12">



                <div class="row">

                    <div class="col-md-3 form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                        <!-- first name -->
                        {!! Form::label('first_name',Lang::get('message.first_name'),['class'=>'required']) !!}
                        {!! Form::text('first_name',null,['class' => 'form-control']) !!}

                    </div>

                    <div class="col-md-3 form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                        <!-- last name -->
                        {!! Form::label('last_name',Lang::get('message.last_name'),['class'=>'required']) !!}
                        {!! Form::text('last_name',null,['class' => 'form-control']) !!}

                    </div>


                    <div class="col-md-3 form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <!-- email -->
                        {!! Form::label('email',Lang::get('message.email'),['class'=>'required']) !!}
                        {!! Form::text('email',null,['class' => 'form-control']) !!}

                    </div>
                    
                    <div class="col-md-3 form-group {{ $errors->has('user_name') ? 'has-error' : '' }}">
                        <!-- mobile -->
                        {!! Form::label('user_name',Lang::get('message.user_name')) !!}
                        {!! Form::text('user_name',null,['class' => 'form-control']) !!}

                    </div>

                    

                </div>

                <div class="row">

                    <div class="col-md-3 form-group {{ $errors->has('company') ? 'has-error' : '' }}">
                        <!-- company -->
                        {!! Form::label('company',Lang::get('message.company'),['class'=>'required']) !!}
                        {!! Form::text('company',null,['class' => 'form-control']) !!}

                    </div>
                    <div class="col-md-3 form-group {{ $errors->has('bussiness') ? 'has-error' : '' }}">
                        <!-- company -->
                        {!! Form::label('bussiness','Business') !!}
                        {!! Form::select('bussiness',[''=>'Select','Bussinesses'=>$bussinesses],null,['class' => 'form-control']) !!}

                    </div>
                    <div class="col-md-3 form-group {{ $errors->has('mobile_code') ? 'has-error' : '' }}">
                        <label class="required">Country code</label>
                        {!! Form::text('mobile_code',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="col-md-3 form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                        <!-- mobile -->
                        {!! Form::label('mobile',Lang::get('message.mobile'),['class'=>'required']) !!}
                        {!! Form::text('mobile',null,['class' => 'form-control']) !!}

                    </div>

                    <div class="col-md-3 form-group {{ $errors->has('currency') ? 'has-error' : '' }}">
                        <!-- mobile -->
                        {!! Form::label('currency',Lang::get('message.currency')) !!}
                        {!! Form::select('currency',[''=>'Select','Currency'=>DB::table('currencies')->lists('name','code')],$user->currency,['class' => 'form-control']) !!}

                    </div>
                    <div class="col-md-3 form-group {{ $errors->has('active') ? 'has-error' : '' }}">
                        <!-- mobile -->
                        {!! Form::label('active',Lang::get('message.active')) !!}
                        <p>{!! Form::radio('active',1,true) !!}&nbsp;Active&nbsp;&nbsp;{!! Form::radio('active',0) !!}&nbsp;Inactive</p>

                    </div>
                    <div class="col-md-3 form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                        <!-- email -->
                        {!! Form::label('role',Lang::get('message.role')) !!}
                        {!! Form::select('role',['user'=>'User','admin'=>'Admin'],null,['class' => 'form-control']) !!}

                    </div>

                </div>

                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                    <!-- phone number -->
                    {!! Form::label('address',Lang::get('message.address'),['class'=>'required']) !!}
                    {!! Form::textarea('address',null,['class' => 'form-control']) !!}

                </div>

                <div class="row">

                    <div class="col-md-4 form-group {{ $errors->has('town') ? 'has-error' : '' }}">
                        <!-- mobile -->
                        {!! Form::label('town',Lang::get('message.town')) !!}
                        {!! Form::text('town',null,['class' => 'form-control']) !!}

                    </div>

                    <div class="col-md-4 form-group {{ $errors->has('country') ? 'has-error' : '' }}">
                        <!-- name -->
                        {!! Form::label('country',Lang::get('message.country')) !!}
                        <?php $countries = \App\Model\Common\Country::lists('country_name', 'country_code_char2')->toArray(); ?>

                        {!! Form::select('country',[''=>'Select a Country','Countries'=>$countries],null,['class' => 'form-control','onChange'=>'getState(this.value);']) !!}

                    </div>
                    <div class="col-md-4 form-group {{ $errors->has('state') ? 'has-error' : '' }}">
                        <!-- name -->
                        {!! Form::label('state',Lang::get('message.state')) !!}
                        <!--{!! Form::select('state',[],null,['class' => 'form-control','id'=>'state-list']) !!}-->

                        <select name="state" id="state-list" class="form-control">

                            @if(count($state)>0)
                            <option value="{{$state['id']}}">{{$state['name']}}</option>
                            @endif
                            <option value="">Select State</option>
                            @foreach($states as $key=>$value)
                            <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="col-md-4 form-group {{ $errors->has('zip') ? 'has-error' : '' }}">
                        <!-- mobile -->
                        {!! Form::label('zip',Lang::get('message.zip'),['class'=>'required']) !!}
                        {!! Form::text('zip',null,['class' => 'form-control']) !!}

                    </div>
                    <div class="col-md-4 form-group {{ $errors->has('timezone_id') ? 'has-error' : '' }}">
                        <!-- mobile -->
                        {!! Form::label('timezone_id',Lang::get('message.timezone'),['class'=>'required']) !!}
                        {!! Form::select('timezone_id',[''=>'Select','Timezones'=>$timezones],null,['class' => 'form-control']) !!}

                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
</div>


{!! Form::close() !!}

<script>
    function getState(val) {


        $.ajax({
            type: "POST",
            url: "{{url('get-state')}}",
            data: 'country_id=' + val,
            success: function (data) {
                $("#state-list").html(data);
            }
        });
    }
</script>
@stop