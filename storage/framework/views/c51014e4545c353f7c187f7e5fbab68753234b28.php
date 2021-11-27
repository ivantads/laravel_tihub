<?php $__env->startSection('title'); ?>
ADMIN
##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


<!--End of global styles-->
<!--Page level styles-->
<div class="outer">
    <div class="inner bg-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-white">
                        Projetos
                        <a href="<?php echo e(route('Projetos.create')); ?>" class="btn btn-success float-right" role="button"
                            aria-pressed="true">Adicionar Projetos</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive m-t-35">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 1%">Id</th>
                                        <th style="width: 30%">Empresas</th>
                                        <th style="width: 15%">Responsavel Loja:</th>
                                        <th style="width: 15%">Analista:</th>
                                        <th style="width: 15%">Agente Comercial:</th>
                                        <th style="width: 15%">Data Produção:</th>
                                        <th style="width: 9%" class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $projetosLista ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-toggle="modal" data-target="#modal_projetos<?php echo e($registro->id_projetos); ?>"
                                        style="cursor:pointer">
                                        <td><?php echo e($registro->id_projetos); ?></td>
                                        <td><?php echo e($registro->NomeFantasia); ?>

                                            <br />
                                            <small>
                                                <?php echo e($registro->Cidade); ?>

                                            </small>
                                        </td>
                                        <td>
                                            <?php echo e(isset($registro->responsavel_implantacao) ? $registro->responsavel_implantacao : ''); ?>

                                        </td>
                                        <td><?php echo e($registro->analista); ?></td>
                                        <td><?php echo e($registro->agente_comercial); ?></td>

                                        <td>
                                            Inicio: <?php echo e(date('d/m/Y' , strtotime($registro->data_inicio))); ?>

                                            <br>
                                            Fim: <?php echo e(date('d/m/Y' , strtotime($registro->data_fim))); ?>

                                        </td>
                                        <td>
                                            <?php if($registro->status=='aguardando'): ?>
                                            <button type="button"
                                                class="btn btn-block btn-danger btn-flat">Aguardando</button>
                                            <?php elseif($registro->status=='pre'): ?>
                                            <button type="button"
                                                class="btn btn-block btn-info btn-flat">Pre-Implantacao</button>
                                            <?php elseif($registro->status=='producao'): ?>
                                            <button type="button"
                                                class="btn btn-block btn-primary btn-flat">Em-Implantacao</button>
                                            <?php elseif($registro->status=='acompanhamento'): ?>
                                            <button type="button"
                                                class="btn btn-block btn-primary btn-flat">Acompanhamento</button>
                                            <?php elseif($registro->status=='finalizado'): ?>
                                            <button type="button"
                                                class="btn btn-block btn-success btn-flat">Finalizado</button>
                                            <?php endif; ?>
                                        </td>





                                        <!-- Button trigger modal -->


                                        <!-- Modal -->
                                        <div class="modal fade" id="modal_projetos<?php echo e($registro->id_projetos); ?>"
                                            tabindex="-1" role="dialog" aria-labelledby="modal_projetos_label"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modal_projetos_label"> O que deseja
                                                            fazer?</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Projeto: <?php echo e($registro->NomeFantasia); ?>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <a class="btn btn-labeled btn-primary"
                                                            href="<?php echo e(route('Projetos.edit',$registro->id_projetos)); ?>">
                                                            <span class="btn-label">
                                                                <i class="fa fa-edit"></i> Editar
                                                            </span>
                                                        </a>
                                                        <form
                                                            action="<?php echo e(route('Projetos.update',$registro->id_projetos)); ?>"
                                                            method="post">
                                                            <input type="hidden" name="status" value="pre">
                                                            <input type="hidden" name="_method" value="PUT">
                                                            <input type="hidden" name="_token"
                                                                value="<?php echo e(csrf_token()); ?>">


                                                            <button class="btn btn-labeled btn-danger" type="submit">
                                                                <i class="fa fa-bookmark"></i> Excluir
                                                            </button>
                                                        </form>



                                                        <form
                                                            action="<?php echo e(route('Projetos.update',$registro->id_projetos)); ?>"
                                                            method="post">
                                                            <input type="hidden" name="status" value="pre">
                                                            <input type="hidden" name="_method" value="PUT">
                                                            <input type="hidden" name="_token"
                                                                value="<?php echo e(csrf_token()); ?>">


                                                            <button class="btn btn-labeled btn-success" type="submit">
                                                                <i class="fa fa-bookmark"></i> Liberar Pré
                                                            </button>
                                                        </form>
                                                       
                                                        <a class="btn btn-labeled btn-primary"
                                                            href="<?php echo e(route('Projetos.proposta',$registro->id_projetos)); ?>">
                                                            <span class="btn-label">
                                                                <i class="fa fa-edit"></i> Proposta
                                                            </span>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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


<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<!-- dataTable.net -->
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet">


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<!-- dataTable.net -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>

<script src="<?php echo e(asset('assets/vendors/slimscroll/js/jquery.slimscroll.min.js')); ?>"></script>

<script>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tihub/laravel/resources/views/projetos/index.blade.php ENDPATH**/ ?>