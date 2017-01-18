@extends('themes.default1.layouts.master')
@section('content')
<div class="box box-primary">

    <div class="content-header">
        {!! Form::open(['url'=>'renew/'.$id,'method'=>'post']) !!}
        <h4>Renew	{!! Form::submit(Lang::get('message.generate'),['class'=>'form-group btn btn-primary pull-right'])!!}</h4>

    </div>

    <div class="box-body">

        <div class="row">

            <div class="col-md-12">

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

                <div class="row">

                    <div class="col-md-4 form-group {{ $errors->has('plan') ? 'has-error' : '' }}">
                        <!-- first name -->
                        {!! Form::label('plan','Plans',['class'=>'required']) !!}
                        {!! Form::select('plan',[''=>'Select','Plans'=>$plans],null,['class' => 'form-control','onchange'=>'getPrice(this.value)']) !!}
                        {!! Form::hidden('user',$userid) !!}
                    </div>

                   

                   <div class="col-md-4 form-group {{ $errors->has('payment_method') ? 'has-error' : '' }}">
                        <!-- last name -->
                        {!! Form::label('payment_method',Lang::get('message.payment-method'),['class'=>'required']) !!}
                        {!! Form::select('payment_method',[''=>'Select','cash'=>'Cash','check'=>'Check','online payment'=>'Online Payment','ccavanue'=>'ccAvanue','paypal'=>'Paypal'],null,['class' => 'form-control']) !!}

                    </div>
                     <div class="col-md-4 form-group {{ $errors->has('cost') ? 'has-error' : '' }}">
                        <!-- last name -->
                        {!! Form::label('cost',Lang::get('message.price'),['class'=>'required']) !!}
                        {!! Form::text('cost',null,['class' => 'form-control','id'=>'price']) !!}

                    </div>
                </div>

                

                

            </div>

        </div>

    </div>

</div>


{!! Form::close() !!}
@stop
<script>
    function getPrice(val) {
        
        var user = document.getElementsByName('user')[0].value;
        $.ajax({
            type: "POST",
            url: "{{url('get-renew-cost')}}",
            data: {'user': user, 'plan': val},
            success: function (data) {
                var price = data
                $("#price").val(price);
            }
        });
    }
</script>