@extends('layouts/default')

{{-- Page title --}}
@section('title')
ADMIN
@parent
@stop

{{-- Page content --}}
@section('content')


<!--End of global styles-->
<!--Page level styles-->
<link type="text/css" rel="stylesheet" href="css/pages/buttons.css" />
<div class="outer">
    <div class="inner bg-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-white">
                        Links Diversos
                        <button type="button" class="btn btn-success float-right" data-toggle="modal"
                            data-target="#modal_links" data-whatever="@mdo">Adicionar Link</button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive m-t-35">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>FUNÇÃO</th>
                                        <th>ACESSAR</th>
                                        <th>OBTER LINK</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($linksLista ?? '' as $registro)

                                    <tr>
                                        <th scope="row">{{ $registro->id}}</th>
                                        <td>{{ $registro->descricao }}</td>
                                        <div id="{{ $registro->id}}" style="display:none;">
                                            {{ $registro->link }}</div>
                                        <td>
                                            <a href="{{ $registro->link }}" target="_blank" class="btn btn-success"
                                                role="button" aria-pressed="true">Acessar</a>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary"
                                                onclick="copyToClipboard('#{{ $registro->id}}')">Obter
                                                Link</button>
                                        </td>


                                       
                                    </tr>
                                    @endforeach
                                    <div class="modal fade" id="modal_links" tabindex="-1" role="dialog"
                                            aria-labelledby="modal_projetos_label" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modal_projetos_label"> Adicionar Links</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                   
                                                        <form action="{{route('Links.store')}}" method="post">
                                                            <p>
                                                                <label>Descricao:</label>
                                                                <input id="descricao" name="tdescricao" type="text"
                                                                    class="form-control">
                                                            </p>
                                                            <p>
                                                                <label>Link:</label>
                                                                <input id="link" name="tlink" type="text"
                                                                    class="form-control">
                                                            </p>
                                                           
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">




                                                    </div>
                                                    <div class="modal-footer">

                                                        <button class="btn btn-labeled btn-success" type="submit">
                                                            <i class="fa fa-bookmark"></i> Salvar
                                                        </button>
                                                        </form>
                                                        {!! Form::close() !!}


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- /.inner -->
</div>


@stop

@section('css')
<!-- dataTable.net -->
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/widgets.css')}}" />






@stop

@section('js')
<!-- dataTable.net -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>
<script type="text/javascript" src="{{asset('assets/js/pages/widget1.js')}}"></script>
<script>
< script type = "text/javascript"
src = "{{asset('assets/vendors/slimscroll/jquery.slimscroll.min.js') }}" >
</script>

<script type="text/javascript" src="{{asset('assets/vendors/raphael/js/raphael.min.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/Buttons/js/scrollto.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/Buttons/js/buttons.js') }}"></script>

/*
* Confirguracoes gerais da dataTable
* Parametrize de acordo com as configuracoes abaixo
*/

/*
/*Configuração da link da table
*/
$(document).ready(function() {
$('#datatable tbody').on('click', 'tr', function() {
window.location = $(this).data('href');
});

});
</script>
@stop