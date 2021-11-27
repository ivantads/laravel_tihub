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
                              <div class="card-header bg-white">
                                <i class="fa fa-comments-o"></i> Atendimentos da plataforma Huggy
                              </div>
                              <!-- /.card-header -->
							  {{ csrf_field() }}
                              <div class="card-body">


<div class="panel-body"> 

  <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-12">

        <a href="{{ route('export.file',['type'=>'xls']) }}">Download Excel xls</a> |

        <a href="{{ route('export.file',['type'=>'xlsx']) }}">Download Excel xlsx</a> |

        <a href="{{ route('export.file',['type'=>'csv']) }}">Download CSV</a>

      </div>

   </div>     

       {!! Form::open(array('route' => 'import.file','method'=>'POST','files'=>'true')) !!}

        <div class="row">

           <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    {!! Form::label('sample_file','Select File to Import:',['class'=>'col-md-3']) !!}

                    <div class="col-md-9">

                    {!! Form::file('sample_file', array('class' => 'form-control')) !!}

                    {!! $errors->first('sample_file', '<p class="alert alert-danger">:message</p>') !!}

                    </div>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            {!! Form::submit('Upload',['class'=>'btn btn-primary']) !!}

            </div>

        </div>

       {!! Form::close() !!}

 </div>


{{-- 
<div class="container">
	@if($message = Session::get('success'))
		<div class="alert alert-info alert-dismissible fade in" role="alert">
	      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	        <span aria-hidden="true">×</span>
	      </button>
	      <strong>Success!</strong> {{ $message }}
	    </div>
	@endif
	{!! Session::forget('success') !!}
	<br />
	<a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
	<a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
	<a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>
	<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="file" name="import_file" />
		<button class="btn btn-primary">Import File</button>
	</form>
</div>

							  ---
<div class="panel-body">
                        <form class="form-horizontal" method="POST" action=" {{route('import_parse') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">
                                <label for="csv_file" class="col-md-4 control-label">CSV file to import</label>

                                <div class="col-md-6">
                                    <input id="csv_file" type="file" class="form-control" name="csv_file" required>

                                    @if ($errors->has('csv_file'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('csv_file') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="header" checked> Arquivo cont&eacute;m linha de cabe&ccedil;alho?
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Parse CSV
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
							  --}}










							  </div>	
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>					
            </div>
@stop	

@section('css')
 <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">	

@stop
@section('js')
<!-- Select2 -->
 <script type="text/javascript" src="{{asset('assets/vendors/select2/js/select2.full.min.js')}}"></script> 


@stop	