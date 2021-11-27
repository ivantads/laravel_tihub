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
                    <strong>Whoops!</strong> Houve alguns problemas ao salvar este formul&atilde;rio.
                    <br />
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
                        <h5 class="card-title">Dados do Projeto</h5>
                    </div>



                    
                    <!-- /card-header -->
                    <!-- form start -->
                    {!! Form::open(['route' => 'Projetos.store', 'role' => 'form', 'enctype' =>
                    'multipart/form-data']) !!}
                    @include('projetos._form')
                    {!! Form::close() !!}
               
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