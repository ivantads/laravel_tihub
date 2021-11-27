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
					<!--BEGIN SELECT-->
					<div class="col-lg-3">
                        <div class="card">
                            <div class="card-header bg-white">
                                <i class="fa fa-filter"></i> Filtros
                            </div>
                            <div class="card-body">
                                <div class="col input_field_sections">
                                    <h5>Analista</h5>
                                    <!--<select class="form-control chzn-select" tabindex="1" id="user_filter" multiple size="3"> -->
									<select class="form-control chzn-select" tabindex="1" id="user_filter">
                                        <option value="0" selected>Todos</option> 
                                        @isset($users)
                                            @foreach($users as $user)												  
                                                <option value="{{ $user->id }}">{{ $user->name}}</option>
                                            @endforeach
                                 	    @endisset		
                                    </select>
                                </div>
                                <div class="col input_field_sections">
                                    <h5>Tipo da Agenda</h5>
									<select class="form-control hide_search" tabindex="2">
										<option value="0" selected>Mostrar Todas</option> 
										<option value="1" selected>Projeto Implanta&ccedil;&atilde;o</option> 
										<option value="3" selected>Plant&atilde;o da Semana</option> 
                                    </select>
                                </div>
								
							</div>
                        </div>
					</div>
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-header bg-white">
                                <i class="fa fa-calendar"></i> Calend&aacute;rio
								<a class="btn btn-sm float-right text-white" style="background-color: #FF9933;">Negoci&aacute;vel</a>&nbsp;
								<a class="btn btn-sm float-right text-white" style="background-color: #FF8086;">N&Atilde;O Negoci&aacute;vel</a>&nbsp;
								<a class="btn btn-sm float-right text-white" style="background-color: #00CC99;">Data Confirmada</a>&nbsp;
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
@stop
@section('css')
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fullcalendar/css/fullcalendar.min.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fullcalendar/css/fullcalendar.print.min.css')}}" media="print"/>
<!--<link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/calendar_custom.css')}}"/>-->
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/chosen/chosen.min.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/form_elements.css')}}"/>
<!--<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2.min.css')}}"/>-->









<style>
.input_field_sections #tags_tagsinput{
    width: 100% !important;
}

</style>
@stop

@section('js')

<!-- Select2 -->
<script type="text/javascript" src="{{asset('assets/vendors/select2/js/select2.full.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('assets/vendors/select2/js/i18n/pt-BR.js')}}"></script> 
<!-- end of plugin scripts -->
<script type="text/javascript" src="{{asset('assets/vendors/chosen/chosen.jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/moment/js/lang/pt-br.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/fullcalendar/js/fullcalendar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/fullcalendar/js/locales-all.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/pluginjs/calendarcustom.js')}}"></script>
















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
    
   
   
  //var defaultCalendarView = $("#calendar_view").val();
  
  
  //$('#calendar_view').on('change',function () {
/*
 $( "#user_filter" ).change(function () {
    var usersCalendarView = $("#user_filter").val();
	alert(defaultCalendarView);
    $('#calendar').fullCalendar('changeView', defaultCalendarView);

   
  });	
  
  */
'use strict';
$(document).ready(function () {
    // Chosen
    $(".hide_search").chosen({disable_search_threshold: 10});
    $(".chzn-select").chosen({allow_single_deselect: true});
    $(".chzn-select-deselect,#select2_sample").chosen();
    // End of chosen  
}); 
  
</script>
<script type="text/javascript" src="{{asset('assets/js/pages/calendar.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/forms.js')}}"></script>
@stop