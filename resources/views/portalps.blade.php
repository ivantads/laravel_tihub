@extends('layouts/default')

{{-- Page title --}}
@section('title')
    ADMIN 
    @parent
@stop

{{-- Page content --}}
@section('content')

                <div class="outer">
                    <div class="inner bg-container">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                  <div class="card-body card_block_top_align ">
                                    <input class="form-control" name="parceiro" type="text" value="14" id="parceiro">
									<table class="table table-striped" id="datatable">
                                      <thead>
                                        <tr>
                                          <th>NomeRepresentante</th>
                                      	  <th>RazaoSocial</th>
                                          <th>CNPJ</th>
                                          <th>Bloqueado</th>
                                      	  <th>ContratoNovo</th>
                                          <th>DataContrato</th>
                                      	  <th>DataVencimento</th>
                                      	  <th>ValorMensalidade</th>
                                        </tr>
                                      </thead>
									</table>
                                  </div>
                                  <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>					
                </div>
        <!-- /#content -->

@stop
@section('css')
 <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
@stop

@section('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment-with-locales.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://cdn.datatables.net/plug-ins/1.10.21/dataRender/datetime.js"></script>
<script>
$(document).ready(function() {
  moment.locale('pt-br');
  $("#parceiro").blur(function(){
    var parceiro = $(this).val();
    var jqxhr = $.getJSON("https://portalpsapi.azurewebsites.net/api/Contrato/ListarContratos?TipoDataFiltro=&DataInicial=&DataFinal=&CodigoStatus=0&CodigoParceiro="+parceiro, function(data) {
    if (data.sucesso != false) {
  
      $('#datatable').DataTable( {
        "bDestroy": true,
		"lengthChange": true,
        "searching": true,
        "ordering": true,
        "autoWidth": false,
  	  "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Todos"]],        
  	  "processing": true,
        "ajax": "https://portalpsapi.azurewebsites.net/api/Contrato/ListarContratos?TipoDataFiltro=&DataInicial=&DataFinal=&CodigoStatus=0&CodigoParceiro="+parceiro,
        "columnDefs": [ {
          "targets": [5,6],
          "render": $.fn.dataTable.render.moment( 'YYYY-MM-DDTHH:mm:ss','DD/MM/YYYY' ),
        } ],        
  	  "columns": [
		  { "data": "nomeRepresentante" },
		  { "data": "razaoSocial" },
          { "data": "cnpj" },
          { "data": "bloqueado" },
          { "data": "contratoNovo" },
          { "data": "dataContrato" },
          { "data": "dataVencimento" },
		  { "data": "valorMensalidade" }
        ]
      })
    }else{
  	console.log('deu false');
    }
  });
  });
});
</script>
@stop		