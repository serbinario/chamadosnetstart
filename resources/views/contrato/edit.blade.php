@extends('menu')


@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h4>
                <i class="fa fa-user"></i>
                Editar Contrato
            </h4>
        </div>
        <div class="ibox-content">


            @if(Session::has('message'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <em> {!! session('message') !!}</em>
                </div>
            @endif

            @if (isset($return) && $return !=  null)
                @if($return['success'] == false && isset($return[0]['fields']) &&  $return[0]['fields'] != null)
                    <div class="alert alert-warning">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        @foreach ($return[0]['fields'] as $nome => $erro)
                            {{ $erro }}<br>
                        @endforeach
                    </div>
                @elseif($return['success'] == false)
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ $return['message'] }}<br>
                    </div>
                @elseif($return['success'] == true)
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ $return['message'] }}<br>
                    </div>
                @endif
            @endif

            {!! Form::model($model, ['route'=> ['serbinario.contrato.update', $model->id], 'id' => 'formAluno', 'enctype' => 'multipart/form-data']) !!}
                @include('tamplatesForms.tamplateFormContrato')
                {{--<a href="{{ route('seracademico.report.contratoAluno', ['id' => $crud->id]) }}" target="_blank" class="btn btn-info">Contrato</a>--}}
            {!! Form::close() !!}
        </div>
    </div>
<?php
@endsection
//echo $cliente['enderecosEnderecos']['bairrosBairros']['cidadesCidades']['estadosEstados']['id']; ?>
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#tree-servicos").tree();
        });
    </script>
@stop
@stop
