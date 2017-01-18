@extends('themes.default1.layouts.master')
@section('content')

<div class="row">

    <div class="col-md-12">
        <div class="box">
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
                <!-- fail message -->
                @if(Session::has('fails'))
                <div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-ban"></i>
                    <b>{{Lang::get('message.alert')}}!</b> {{Lang::get('message.failed')}}.
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('fails')}}
                </div>
                @endif
            </div>


            <div class="box-body">
                {!! Form::model($set,['url'=>'mailchimp','method'=>'patch','files'=>true]) !!}

                <table class="table table-condensed">

                    <tr>
                        <td><h3 class="box-title">{{Lang::get('message.mailchimp')}}</h3></td>
                        <td>{!! Form::submit(Lang::get('message.update'),['class'=>'btn btn-primary pull-right'])!!}</td>

                    </tr>

                    <tr>

                        <td><b>{!! Form::label('api_key',Lang::get('message.api_key'),['class'=>'required']) !!}</b></td>
                        <td>
                            <div class="form-group {{ $errors->has('api_key') ? 'has-error' : '' }}">


                                {!! Form::text('api_key',null,['class' => 'form-control']) !!}
                                <p><i> {{Lang::get('message.enter-the-mailchimp-api-key')}}</i> </p>


                            </div>
                        </td>

                    </tr>
                    <tr>

                        <td><b>{!! Form::label('list_id',Lang::get('message.list_id'),['class'=>'required']) !!}</b></td>
                        <td>
                            <div class="row">
                                <div class="col-md-6 form-group {{ $errors->has('list_id') ? 'has-error' : '' }}">


                                    {!! Form::select('list_id',[''=>'Select','Lists'=>$lists],null,['class' => 'form-control']) !!}
                                    <p><i> {{Lang::get('message.enter-the-mailchimp-list-id')}}</i> </p>


                                </div>
                                <!--                                <div class="col-md-6">
                                                                    <a href="{{url('mail-chimp/add-lists')}}" class="btn btn-primary">{{Lang::get('message.add-mailchimp-lists-to-agora')}}</a>
                                                                </div>-->
                            </div>
                        </td>

                    </tr>

                    <tr>

                        <td><b>{!! Form::label('subscribe_status',Lang::get('message.subscribe_status'),['class'=>'required']) !!}</b></td>
                        <td>
                            <div class="form-group {{ $errors->has('subscribe_status') ? 'has-error' : '' }}">


                                {!! Form::select('subscribe_status',['subscribed'=>'Subscribed','unsubscribed'=>'Unsubscribed','cleaned'=>'Cleaned','pending'=>'Pending'],null,['class' => 'form-control']) !!}
                                <p><i> {{Lang::get('message.enter-the-mailchimp-subscribe-status')}}</i> </p>


                            </div>
                        </td>

                    </tr>

                    @if($set->api_key&&$set->list_id)
                    <tr>

                        <td><b>{!! Form::label('mapping',Lang::get('message.mapping'),['class'=>'required']) !!}</b></td>
                        <td>
                            <div class="form-group">


                                <div class="col-md-6">
                                    <a href="{{url('mail-chimp/mapping')}}" class="btn btn-primary">{{Lang::get('message.mapping')}}</a>
                                    <p><i> {{Lang::get('message.map-the-mailchimp-field-with-agora')}}</i> </p>
                                </div>



                            </div>
                        </td>

                    </tr>
                    @endif

                    {!! Form::close() !!}

                </table>



            </div>

        </div>
        <!-- /.box -->

    </div>


</div>

@stop