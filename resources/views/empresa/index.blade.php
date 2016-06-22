@extends('menu')

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <div class="col-md-10">
                <h4>
                    <i class="fa fa-users"></i>
                    Listar Empresa
                </h4>
            </div>
            <div class="col-md-2">
                <a href="{{ route('serbinario.empresa.create')}}" class="btn-sm btn-primary">Nova Empresa</a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive no-padding">
                        <table id="fornecedor-grid" class="display table table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CNPJ</th>
                                <th>Acão</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>CNPJ</th>
                                <th style="width: 17%;">Acão</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script type="text/javascript">
        var table = $('#fornecedor-grid').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('serbinario.empresa.grid') !!}",
            columns: [
                {data: 'nome', name: 'nome'},
                {data: 'cpnj', name: 'cpnj'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

        /*//Seleciona uma linha
        $('#crud-grid tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );

        //Retonra o id do registro
        $('#crud-grid tbody').on( 'click', 'tr', function () {

            var rows = table.row( this ).data()

            console.log( rows.id );
        } );*/

    </script>
@stop