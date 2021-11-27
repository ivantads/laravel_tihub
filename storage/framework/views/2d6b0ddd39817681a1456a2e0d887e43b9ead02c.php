		    	<!-- #menu -->
                    <ul id="menu" ><!--class="bg-blue dker"-->
                        <li <?php echo (Request::is('/')? 'class="active"':""); ?>>
                            <a href="<?php echo e(URL::to('/')); ?> ">
                                <i class="fa fa-home"></i>
                                <span class="link-title menu_hide">&nbsp;Dashboard</span>
                            </a>
                        </li>
                        <li <?php echo (Request::is('indicadores/suporte')? 'class="active"':""); ?>>
                            <a href="<?php echo e(URL::to('indicadores/suporte')); ?> ">
                                <i class="fa fa-dashboard"></i>
                                <span class="link-title menu_hide">&nbsp;Indicadores</span>
                            </a>
                        </li>
                        <li <?php echo (Request::is('contatos')? 'class="active"':""); ?>>
                            <a href="<?php echo e(URL::to('contatos/index')); ?> ">
                                <i class="fa fa-bell"></i>
                                <span class="link-title menu_hide">&nbsp;Contato Site</span>
								<span class="badge badge-pill badge-primary float-right menu_hide">new</span>
                            </a>
                        </li>						
                        <li <?php echo (Request::is('cadastros/clientes')? 'class="active"':""); ?>>
                            <a href="<?php echo e(URL::to('cadastros/clientes')); ?> ">
                                <i class="fa fa-building"></i>
                                <span class="link-title menu_hide">&nbsp;Clientes</span>
                            </a>
                        </li>					
                        <li <?php echo (Request::is('crm')? 'class="active"':""); ?>>
                            <a href="<?php echo e(URL::to('crm/index')); ?> ">
                                <i class="fa fa-thumbs-o-up"></i>
                                <span class="link-title menu_hide">&nbsp;Empresas</span>
                            </a>
                        </li>
                        <li <?php echo (Request::is('Projetos')? 'class="active"':""); ?>>
                            <a href="<?php echo e(URL::to('Projetos')); ?> ">
                                <i class="fa fa-tasks"></i>
                                <span class="link-title menu_hide">&nbsp;Projetos</span>
                            </a>
                        </li>
                        <li <?php echo (Request::is('calendario/index')? 'class="active"':""); ?>>
                            <a href="<?php echo e(URL::to('calendario/index')); ?> ">
                                <i class="fa fa-calendar"></i>
                                <span class="link-title menu_hide">&nbsp;Calend&aacute;rio</span>
                            </a>
                        </li>
                        <li <?php echo (Request::is('downloads/versoes')|| Request::is('downloads/aplicativos') ? 'class="active"' : ''); ?>> <!--'class="dropdown_menu"' : 'class="dropdown_menu"'-->
                            <a href="javascript:;">
                                <i class="fa fa-cloud-download"></i>
                                <span class="link-title menu_hide">&nbsp; Downloads</span>
                                <span class="fa arrow menu_hide"></span>
                            </a>
                            <ul>
                                <li <?php echo (Request::is('downloads/versoes') ? 'class="active"' : ''); ?>>
                                    <a href="<?php echo e(URL::to('downloads/versoes')); ?>">
                                        <i class="fa fa-heartbeat"></i>
                                        &nbsp; Vers&otilde;es Inovafarma
                                    </a>
                                </li>
                                <li <?php echo (Request::is('downloads/aplicativos') ? 'class="active"' : ''); ?>>
                                    <a href="<?php echo e(URL::to('downloads/aplicativos')); ?>">
                                        <i class="fa fa-download"></i>
                                        &nbsp; Aplicativos
                                    </a>
                                </li>								
							</ul>
						</li>
                        <li <?php echo (Request::is('config/contratos') ? 'class="active"' : ''); ?>>
                            <a href="javascript:;">
                                <i class="fa fa-cogs"></i>
                                <span class="link-title  menu_hide">&nbsp; Configura&ccedil;&otilde;es</span>
                                <span class="fa arrow menu_hide"></span>
                            </a>
                            <ul>
                                <li <?php echo (Request::is('config/contratos') ? 'class="active"' : ''); ?>>
                                    <a href="<?php echo e(URL::to('config/contratos')); ?>">
                                        <i class="fa fa-edit"></i>
                                        &nbsp; Contratos
                                    </a>
                                </li>
							</ul>
						</li>
                        <li <?php echo (Request::is('huggy/atendimentos') ? 'class="active"' : ''); ?>>
                            <a href="javascript:;">
                                <i class="fa fa-soundcloud"></i>
                                <span class="link-title menu_hide">&nbsp; Huggy</span>
                                <span class="fa arrow menu_hide"></span>
                            </a>
                            <ul>
                                <li <?php echo (Request::is('huggy/atendimentos') ? 'class="active"' : ''); ?>>
                                    <a href="<?php echo e(URL::to('huggy/atendimentos')); ?>">
                                        <i class="fa fa-comments-o"></i>
                                        &nbsp; Atendimentos Clientes
                                    </a>
                                </li>
							</ul>
						</li>
                        <li <?php echo (Request::is('inovafarma/chamados')|| Request::is('inovafarma/erroversoes')|| Request::is('inovafarma/scripts') ? 'class="active"' : ''); ?>>
                            <a href="javascript:;">
                                <i class="fa fa-anchor"></i>
                                <span class="link-title  menu_hide">&nbsp; Inovafarma</span>
                                <span class="fa arrow menu_hide"></span>
                            </a>
                            <ul>
                                <li <?php echo (Request::is('inovafarma/chamados') ? 'class="active"' : ''); ?>>
                                    <a href="<?php echo e(URL::to('inovafarma/chamados')); ?>">
                                        <i class="fa fa-angle-right"></i>
                                        &nbsp; Chamados
                                    </a>
                                </li>
                                <li <?php echo (Request::is('inovafarma/erroversoes') ? 'class="active"' : ''); ?>>
                                    <a href="<?php echo e(URL::to('inovafarma/erroversoes')); ?>">
                                        <i class="fa fa-angle-right"></i>
                                        &nbsp; Erros de Vers&otilde;es
                                    </a>
                                </li>
                                <li <?php echo (Request::is('inovafarma/scripts') ? 'class="active"' : ''); ?>>
                                    <a href="<?php echo e(URL::to('inovafarma/scripts')); ?>">
                                        <i class="fa fa-angle-right"></i>
                                        &nbsp; Scripts
                                    </a>
                                </li>								
							</ul>
						</li>
                        <li <?php echo (Request::is('Links')? 'class="active"':""); ?>>
                            <a href="<?php echo e(URL::to('Links')); ?> ">
                                <i class="fa fa-link"></i>
                                <span class="link-title  menu_hide">&nbsp;Links Diversos</span>
                            </a>
                        </li>						
					</ul>
                <!-- /#menu -->	
<?php /**PATH /home/tihub/laravel/resources/views/layouts/menu.blade.php ENDPATH**/ ?>