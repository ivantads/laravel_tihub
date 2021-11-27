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
                        <div class="col-12">
                            <div class="card">
                              <div class="card-header bg-white">
                                <h4 class="card-title">Calend&aacute;rio de Atividades Lan&ccedil;adas</h4>
                        		<div class="card-tools">    </div>
                              </div>
							  
 <div class="row">							  
<div class="col-lg-3">
<div class="card m-t-15">
                                    <div class="card-header bg-white">
                                        <i class="fa fa-filter"></i> Filtros
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive m-t-35">
										    <table class="table table-bordered">
											    <thead>
                                                <tr>
                                                    <th>Selecionar analista</th>
												</tr>
												</thead>
												<tbody>
                                                <tr>
                                                    <td >
													<label for="calendar_view">Filter Eventy Type</label>
													<select name="select" id="user_filter" style="width:100%">
  <option value="0" selected>TODOS</option> 
  <option value="1" >Diogo Pompeu</option>
  <option value="2">Ivan Ferreira</option>
  <option value="3">Rodrigo Deniel</option>
  <option value="4">Paulo Tonial</option>  
</select>
</td>


<label for="calendar_view">Filter Eventy Type</label>
  <div class="input-group">
      <select class="filter" id="user_filter" multiple="multiple">
        <option value="0">TODOS</option>
        <option value="1">DIOGO</option>
        <option value="2">IVAN</option>
        <option value="3">RODRIGO</option>
        <option value="4">PAULO</option>
      </select>
    </div>


												</tr>
												</tbody>
												
											</table>
										</div>
										<div class="table-responsive m-t-35">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Cor</th>
                                                    <th>Legenda</th>
                                                    <th>Data Negoci&aacute;vel</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="bg-primary text-white">
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td>Agendamento</td>
                                                    <td>SIM</td>
                                                </tr>
                                                <tr class="bg-success text-white">
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td>Pre-Implantação</td>
                                                    <td>N&Atilde;O</td>
                                                </tr>
                                                <tr class="bg-warning text-white">
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td>Treinamento</td>
                                                    <td>SIM</td>
                                                </tr>
                                                <tr class="bg-mint text-white">
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td>Visita</td>
                                                    <td>SIM</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
</div>



<div class="col-lg-9">
<div class="card m-t-15">
                                    <div class="card-header bg-white">
                                        <i class="fa fa-calendar"></i> Calend&aacute;rio
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive m-t-35">
								
								@include('calendario/modal_events')
								    <div id="calendar" data-route-load-events="{{ route('routeLoadEvents') }}"></div>
                                        </div>
                                    </div>
                                </div>
</div>

</div> <!-- row -->




							    </div>
                            </div>
                        </div>
                    </div>
                </div>					
            </div>
@stop
@section('css')
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fullcalendar/core/fullcalendar.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fullcalendar/daygrid/daygrid.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fullcalendar/list/list.css')}}"/>
<!--<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fullcalendar/timegrid/timegrid.css')}}"/>
-->
<link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/calendar_custom.css')}}"/>
<style>
select.filter{
  width: 500px !important;
}
</style>


 <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2.min.css')}}"/>
@stop


@section('js')
<!-- Select2 -->
  <script type="text/javascript" src="{{asset('assets/vendors/select2/js/select2.full.min.js')}}"></script> 
  <script type="text/javascript" src="{{asset('assets/vendors/select2/js/i18n/pt-BR.js')}}"></script> 




<!-- end of plugin scripts -->

<script type="text/javascript" src="{{asset('assets/vendors/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/moment/js/lang/pt-br.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/fullcalendar/core/fullcalendar.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/fullcalendar/core/locales-all.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/fullcalendar/interaction/interaction.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/fullcalendar/daygrid/daygrid.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/fullcalendar/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/fullcalendar/moment-timezone/moment-timezone.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/fullcalendar/list/list.min.js')}}"></script>
<!--<script type="text/javascript" src="{{asset('assets/vendors/fullcalendar/timegrid/timegrid.js')}}"></script>


<script type="text/javascript" src="{{asset('assets/js/pluginjs/calendarcustom.js')}}"></script>-->
<script>
/*
$(function () {
    $('.date-time').mask('00/00/0000 00:00:00');
    $('.time').mask('00:00:00');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content');
        }
    });*/
   /* 
  var defaultCalendarView = $("#calendar_view").val();
  
  
  //$('#calendar_view').on('change',function () {
 $( "#user_filter" ).change(function () {

	  
    var defaultCalendarView = $("#user_filter").val();
	alert(defaultCalendarView);
    $('#calendar').Calendar('changeView', defaultCalendarView);

*/







    
  //});	
</script>
<script type="text/javascript" src="{{asset('assets/js/pages/calendar.js')}}"></script>
@stop