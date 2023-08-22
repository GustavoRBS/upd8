@extends('layouts.app')

@section('header')
{!! Html::style(secure_asset('assets/css/client/register.css')) !!}
{!! Html::script('https://cdn.jsdelivr.net/npm/sweetalert2@11') !!}
@endsection
@section('content')
<div class="container-fluid">
    @include('model.message')
    <section class="secao-padding card-form">
        {{ Form::open(array('method' => 'GET', 'id' => 'form', 'class' => 'user', 'autocomplete' => 'off')) }}
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
                                <div class="list-form">{{ Form::text('cpf', $customer->customer_id ?? null, array('class'=>'form-control')) }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="d-flex justify-content-start">
                                <div class="py-2">{{ Form::label('Nome', __('Nome:'), array('class' => 'form-label')) }}</div>
                                <div class="list-form">{{ Form::text('name', $customer->name ?? null, array('class'=>'form-control')) }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="d-flex justify-content-start">
                                <div class="py-2">{{ Form::label('Data de Nascimento:', __('Data de Nascimento'), array('class' => 'form-label')) }}</div>
                                <div class="list-form">{{ Form::date('date_of_birth', $customer->last_name ?? null, array('class'=>'form-control')) }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="d-flex justify-content-start">
                                <div class="py-2">
                                    {{ Form::label('Sexo', __('Sexo:'), array('class' => 'form-label')) }}
                                    {{ Form::radio('sexo', null, array('class'=>'form-control','required' => true)) }}
                                    {{ __('Masculino') }}
                                </div>
                                <div class="py-2">
                                    {{ Form::radio('sexo', null, array('class'=>'form-control','required' => true)) }}
                                    {{ __('Feminino') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="d-flex justify-content-start">
                                <div class="py-2">{{ Form::label('state', __('Estado:'), array('class' => 'form-label')) }}</div>
                                <div class="list-form">{{ Form::select('state', ['0'=>'São Paulo','1'=>'Rio de Janeiro','2'=>'Minas Gerais'], null, array('class' => 'form-select', 'placeholder' => __('Selecione um Estado')))}}</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="d-flex justify-content-start">
                                <div class="py-2">{{ Form::label('city', __('Cidade:'), array('class' => 'form-label')) }}</div>
                                <div class="list-form">{{ Form::select('city', ['0'=>'São Paulo','1'=>'Rio de Janeiro','2'=>'Minas Gerais'], null, array('class' => 'form-select', 'placeholder' => __('Selecione uma Cidade')))}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-end">
                                <div class=""><button class="btn btn-lg btn-block btn-primary" id="form-client" type="button">{{__('Pesquisar')}}</button></div>
                                <div class=""><a href="{{ url()->previous() }}" class="btn btn-lg btn-block ms-3 d-flex btn-light text-black" role="button">{{__('Limpar')}}</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </section>
    <section class="secao-padding card-form">
        <div class="row mb-6 py-3">
            <div class="col-12">
                <table class="table table-bordered" id="data-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Cliente</th>
                            <th>Cpf</th>
                            <th>Data Nasc.</th>
                            <th>Estado</th>
                            <th>Cidade</th>
                            <th>Sexo</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="d-flex justify-content-center align-items-center">
                    <nav aria-label="Page navigation example">
                        <ul id="pagination-links" class="pagination">
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
@section('scriptlogged')
{!! Html::script(secure_asset('assets/js/client/consult.js')) !!}
<script>
    $(document).ready(function() {
        var appUrl = "{{ env('APP_URL') }}";
        initial(appUrl);
        $('#form-client').click(function(event) {
            var formData = $('#form').serialize();
            click(formData, appUrl);
        });
    });
</script>
@endsection