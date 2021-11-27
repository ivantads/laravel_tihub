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
                                <i class="fa fa-bell-o"></i> Novos contatos via SITE
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body padding">
                                <div class="feed">
                                  <ul>
								  @forelse($contatosLista as $contato)
                                    <li style="cursor:pointer" data-toggle="tooltip" data-placement="top" title="Clique para assumir esse contato!" onClick="confirm('Tem certeza que deseja assumir esse contato?\n{{ $contato->AssuntoX }}: {{ $contato->NomeCompleto }} - {{ $contato->NomeFarmacia }}');">
                                      <span>
                                        <img src="../images/mail.png" alt="text_image" class="rounded-circle img-fluid adjust_feeds_img"/>
                                      </span>
                                      <h5>{{ $contato->AssuntoX }}: {{ $contato->NomeCompleto }} - {{ $contato->NomeFarmacia }}</h5>
                                      <p><strong>Melhor hor&aacute;rio para contato:</strong> {{ $contato->MelhorHorario }} <strong>| Telefone:</strong> {{ $contato->Telefone }} <strong>| E-mail:</strong> {{ $contato->Email }} </p>
                                      <i>{{ $contato->Tempo }}</i>
                                    </li>
								  @empty
								    <li>
									  <p>Nenhum novo contato por aqui</p>
									</li>
								  @endforelse
								  </ul>		
								</div>			
                              </div>
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>					
            </div>
        <!--</div>-->
	
			

@stop
@section('css')
 <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/contato.css')}}"/>
 <!--<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/tipso/css/tipso.min.css')}}"/>-->
  <style>
  .adjust_feeds_img {
      width: 35px;
      height: 35px;
  }
  </style>
@stop

@section('js')
 <!--<script type="text/javascript" src="{{asset('assets/vendors/tipso/js/tipso.min.js')}}"></script>-->
@stop