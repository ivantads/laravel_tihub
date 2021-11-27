<?php $__env->startSection('title'); ?>
ADMIN
##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


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
                                    <?php $__currentLoopData = $linksLista ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <th scope="row"><?php echo e($registro->id); ?></th>
                                        <td><?php echo e($registro->descricao); ?></td>
                                        <div id="<?php echo e($registro->id); ?>" style="display:none;">
                                            <?php echo e($registro->link); ?></div>
                                        <td>
                                            <a href="<?php echo e($registro->link); ?>" target="_blank" class="btn btn-success"
                                                role="button" aria-pressed="true">Acessar</a>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary"
                                                onclick="copyToClipboard('#<?php echo e($registro->id); ?>')">Obter
                                                Link</button>
                                        </td>


                                       
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                   
                                                        <form action="<?php echo e(route('Links.store')); ?>" method="post">
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
                                                                value="<?php echo e(csrf_token()); ?>">




                                                    </div>
                                                    <div class="modal-footer">

                                                        <button class="btn btn-labeled btn-success" type="submit">
                                                            <i class="fa fa-bookmark"></i> Salvar
                                                        </button>
                                                        </form>
                                                        <?php echo Form::close(); ?>



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


<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<!-- dataTable.net -->
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/css/pages/widgets.css')); ?>" />






<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<!-- dataTable.net -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js/pages/widget1.js')); ?>"></script>
<script>
< script type = "text/javascript"
src = "<?php echo e(asset('assets/vendors/slimscroll/jquery.slimscroll.min.js')); ?>" >
</script>

<script type="text/javascript" src="<?php echo e(asset('assets/vendors/raphael/js/raphael.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/vendors/Buttons/js/scrollto.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/vendors/Buttons/js/buttons.js')); ?>"></script>

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
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tihub/laravel/resources/views/links.blade.php ENDPATH**/ ?>