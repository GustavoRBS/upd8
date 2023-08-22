@extends('layouts.app')

@section('header')
{!! Html::style(secure_asset('assets/css/client/register.css')) !!}
{!! Html::script('https://cdn.jsdelivr.net/npm/sweetalert2@11') !!}
@endsection
@section('content')
<div class="container-fluid">
    @include('model.message')
    <section class="secao-padding card-form">
        {{ Form::open(array('method' => 'POST', 'class' => 'user', 'id' => 'form-client', 'autocomplete' => 'off')) }}
        {{ Form::token() }}
        <div class="row mb-4">
            <div class="col-12">
                <div class="card-header py-2">
                    <p class="text-primary m-0">{{__('Cadastro Cliente')}}</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="d-flex justify-content-start">
                                <div class="py-2">{{ Form::label('CPF', __('CPF: '), array('class' => 'form-label')) }} </div>
                                <div class="list-form">{{ Form::text('cpf', null, array('class'=>'form-control', 'id' => 'cpf')) }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="d-flex justify-content-start">
                                <div class="py-2">{{ Form::label('Nome', __('Nome:'), array('class' => 'form-label')) }}</div>
                                <div class="list-form">{{ Form::text('name', null, array('class'=>'form-control', 'id' => 'name')) }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="d-flex justify-content-start">
                                <div class="py-2">{{ Form::label('Data de Nascimento:', __('Data de Nascimento'), array('class' => 'form-label')) }}</div>
                                <div class="list-form">{{ Form::date('date_of_birth', null, array('class'=>'form-control', 'id' => 'date_of_birth')) }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="d-flex justify-content-start">
                                <div class="py-2">
                                    {{ Form::label('Sexo', __('Sexo:'), array('class' => 'form-label')) }}
                                    <input type="radio" id="genderM" name="gender" value="M">
                                    {{ __('Masculino') }}
                                </div>
                                <div class="py-2">
                                    <input type="radio" id="genderF" name="gender" value="F">
                                    {{ __('Feminino') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="d-flex justify-content-start">
                                <div class="py-2">{{ Form::label('address', __('Endereço:'), array('class' => 'form-label')) }}</div>
                                <div class="list-form">{{ Form::text('address', null, array('class'=>'form-control', 'id' => 'address')) }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="d-flex justify-content-start">
                                <div class="py-2">{{ Form::label('state', __('Estado:'), array('class' => 'form-label')) }}</div>
                                <div class="list-form">{{ Form::select('state', ['0'=>'São Paulo','1'=>'Rio de Janeiro','2'=>'Minas Gerais'], null, array('class' => 'form-select', 'id' => 'state', 'placeholder' => __('Selecione um Estado'), 'required' => true))}}</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="d-flex justify-content-start">
                                <div class="py-2">{{ Form::label('city', __('Cidade:'), array('class' => 'form-label')) }}</div>
                                <div class="list-form">{{ Form::select('city', ['0'=>'São Paulo','1'=>'Rio de Janeiro','2'=>'Minas Gerais'], null, array('class' => 'form-select', 'id' => 'city', 'placeholder' => __('Selecione uma Cidade'), 'required' => true))}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-end">
                                <div class=""><button class="btn btn-lg btn-block btn-primary" type="submit">{{__('Salvar')}}</button></div>
                                <div class=""><a href="{{ url()->previous() }}" class="btn btn-lg btn-block ms-3 d-flex btn-light text-black" role="button">{{__('Limpar')}}</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </section>
</div>
@endsection
@section('scriptlogged')
{!! Html::script(secure_asset('assets/js/client/register.js')) !!}
<script>
    $(document).ready(function() {
        var appUrl = "{{ env('APP_URL') }}";
        $('#form-client').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            form(formData, appUrl)
        });
        <?php if (!empty($client_id)) { ?>
            id = '{{$client_id }}';
            var appUrl = "{{ env('APP_URL') }}";
            getId(id, appUrl)
        <?php } ?>
    });
</script>
@endsection