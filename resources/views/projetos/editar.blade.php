@extends('layouts/default')

{{-- Page title --}}
@section('title')
    ADMIN 
    @parent
@stop

{{-- Page content --}}
@section('content')
  <section class="outer">
    <div class="inner bg-container">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
		  @if(count($errors))
		      <div class="alert alert-danger">
		  	      <strong>Whoops!</strong> Houve alguns problemas ao salvar este formul&acute;rio.
		  	      <br/>
		      </div>
		  @endif
		  @if (session()->has('success'))
		      <div class="alert alert-success">
		          @if(is_array(session()->get('success')))
		          <ul>
		              @foreach (session()->get('success') as $message)
		                  <li>{{ $message }}</li>
		              @endforeach
		          </ul>
		          @else
		              {{ session()->get('success') }}
		          @endif
		      </div>
		  @endif
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Dados da Empresa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
			
            {!! Form::open(['route' => ['Projetos.update',$projetosDados->id_projetos], 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
                    @method('PUT')
                    @include('projetos._form')
			{!! Form::close() !!}
          </div>
          <!-- /.general form elements -->
        </div>
        <!-- /.left column -->
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@stop
 