<?php 
$entity = $entityRevision;
$action = "single";
?>

<?php $this->applyTemplateHook('breadcrumb','begin'); ?>

<?php $this->part('singles/breadcrumb', ['entity' => $entity,'entity_panel' => 'agents','home_title' => 'entities: My Agents']); ?>

<?php $this->applyTemplateHook('breadcrumb','end'); ?>

<div id="editable-entity" class="clearfix sombra editable-entity-single" data-action="single" data-entity="entityRevision" data-id="<?php echo $entity->id ?>">
    <?php $this->part('editable-entity-logo') ?>
    <div class="controles">
        <a class="btn btn-warning" href="<?php echo $app->createUrl('panel',$entity->controller_id . 's'); ?>"><?php \MapasCulturais\i::_e("Cancelar");?></a>
    </div>
</div>

<article class="main-content agent">
    <?php $this->applyTemplateHook('main-content','begin'); ?>
    <header class="main-content-header">    
        <?php $this->applyTemplateHook('header-image','before'); ?>

        <div class="header-image js-imagem-do-header"></div>
        
        <?php $this->applyTemplateHook('header-image','after'); ?>

        <?php $this->applyTemplateHook('entity-status','before'); ?>
        <div class="alert info"><?php echo \MapasCulturais\i::__("As informações deste registro é histórico gerado em " .$entity->createTimestamp->format('d/m/Y H:i:s').".");?></div>
        <?php $this->applyTemplateHook('entity-status','after'); ?>

        <div class="header-content">
            <?php $this->applyTemplateHook('header-content','begin'); ?>

            <?php $this->applyTemplateHook('avatar','before'); ?>
            <div class="avatar">
               <img class="js-avatar-img" src="'img/avatar--agent.png'" />
            </div>
            <!--.avatar-->
            <?php $this->applyTemplateHook('avatar','after'); ?>

            <?php $this->applyTemplateHook('type','before'); ?>
            <div class="entity-type <?php echo $entity->controller_id ?>-type">
                <div class="icon icon-<?php echo $entity->controller_id ?>"></div>
                <a href="#" class='' data-original-title="<?php \MapasCulturais\i::esc_attr_e("Tipo");?>" data-emptytext="<?php \MapasCulturais\i::esc_attr_e("Selecione um tipo");?>" data-entity='<?php echo $entity->controller_id ?>' data-value='<?php echo $entity->_type ?>'>
                    <?php $entity_types = $app->getRegisteredEntityTypes($entity->entityClassName);?>
                    <?php echo $entity_types[$entity->_type]->name; ?>
                </a>
            </div>
            <!--.entity-type-->
            <?php $this->applyTemplateHook('type','after'); ?>

            <?php $this->applyTemplateHook('name','before'); ?>
            <h2><span class="" data-edit="name" data-original-title="<?php \MapasCulturais\i::esc_attr_e("Nome de exibição");?>" data-emptytext="<?php \MapasCulturais\i::esc_attr_e("Nome de exibição");?>"><?php echo $entity->name; ?></span></h2>
            <?php $this->applyTemplateHook('name','after'); ?>

            <?php $this->applyTemplateHook('header-content','end'); ?>
        </div>
        <!--.header-content-->
        <?php $this->applyTemplateHook('header-content','after'); ?>
    </header>
    <!--.main-content-header-->
    <?php $this->applyTemplateHook('header','after'); ?>

    <?php $this->applyTemplateHook('tabs','before'); ?>
    <ul class="abas clearfix clear">
        <?php $this->applyTemplateHook('tabs','begin'); ?>
        <li class="active"><a href="#sobre"><?php \MapasCulturais\i::_e("Sobre");?></a></li>
        <?php $this->applyTemplateHook('tabs','end'); ?>
    </ul>
    <?php $this->applyTemplateHook('tabs','after'); ?>

    <div class="tabs-content">
        <?php $this->applyTemplateHook('tabs-content','begin'); ?>
        <div id="sobre" class="aba-content">
            <?php $this->applyTemplateHook('tab-about','begin'); ?>
            <div class="ficha-spcultura">
                <p>
                    <span class="js-editable" data-edit="shortDescription" data-original-title="<?php \MapasCulturais\i::esc_attr_e("Descrição Curta");?>" data-emptytext="<?php \MapasCulturais\i::esc_attr_e("Insira uma descrição curta");?>" data-showButtons="bottom" data-tpl='<textarea maxlength="400"></textarea>'><?php echo nl2br($entity->shortDescription); ?></span>
                </p>
                <?php $this->applyTemplateHook('tab-about-service','before'); ?>
                <div class="servico">
                    <?php $this->applyTemplateHook('tab-about-service','begin'); ?>

                    <?php if(isset($entity->site)): ?>
                        <p><span class="label"><?php \MapasCulturais\i::_e("Site");?>:</span>
                        <a class="url" href="<?php echo $entity->site; ?>"><?php echo $entity->site; ?></a>
                    <?php endif; ?>

                    <?php if(isset($entity->nomeCompleto)): ?>
                        <p class="privado"><span class="icon icon-private-info"></span><span class="label"><?php \MapasCulturais\i::_e("Nome");?>:</span> <span class="js-editable" data-edit="nomeCompleto" data-original-title="<?php \MapasCulturais\i::esc_attr_e("Nome Completo ou Razão Social");?>" data-emptytext="<?php \MapasCulturais\i::esc_attr_e("Insira seu nome completo ou razão social");?>"><?php echo $entity->nomeCompleto; ?></span></p>
                    <?php endif; ?>

                    <?php if(isset($entity->documento)): ?>
                        <p class="privado"><span class="icon icon-private-info"></span><span class="label"><?php \MapasCulturais\i::_e("CPF/CNPJ");?>:</span> <span class="js-editable" data-edit="documento" data-original-title="<?php \MapasCulturais\i::esc_attr_e("CPF/CNPJ");?>" data-emptytext="<?php \MapasCulturais\i::esc_attr_e("Insira o CPF ou CNPJ com pontos, hífens e barras");?>"><?php echo $entity->documento; ?></span></p>
                    <?php endif;?>

                    <?php if(isset($entity->dataDeNascimento)): ?>
                        <p class="privado"><span class="icon icon-private-info"></span><span class="label"><?php \MapasCulturais\i::_e("Data de Nascimento/Fundação");?>:</span>
                            <span class="js-editable" data-type="date" data-edit="dataDeNascimento" data-viewformat="dd/mm/yyyy" data-showbuttons="false" data-original-title="<?php \MapasCulturais\i::esc_attr_e("Data de Nascimento/Fundação");?>" data-emptytext="<?php \MapasCulturais\i::esc_attr_e("Insira a data de nascimento ou fundação do agente");?>">
                                <?php $dtN = (new DateTime)->createFromFormat('Y-m-d', $entity->dataDeNascimento); echo $dtN ? $dtN->format('d/m/Y') : ''; ?>
                            </span>
                        </p>
                    <?php endif;?>

                    <?php if(isset($entity->genero)): ?>
                        <p class="privado"><span class="icon icon-private-info"></span><span class="label"><?php \MapasCulturais\i::_e("Gênero");?>:</span> <span class="js-editable" data-edit="genero" data-original-title="<?php \MapasCulturais\i::esc_attr_e("Gênero");?>" data-emptytext="<?php \MapasCulturais\i::esc_attr_e("Selecione o gênero se for pessoa física");?>"><?php echo $entity->genero; ?></span></p>
                    <?php endif;?>

                    <?php if(isset($entity->orientacaoSexual)):?>
                        <p class="privado"><span class="icon icon-private-info"></span><span class="label"><?php \MapasCulturais\i::_e("Orientação Sexual");?>:</span> <span class="js-editable" data-edit="orientacaoSexual" data-original-title="<?php \MapasCulturais\i::esc_attr_e("Orientação Sexual"); ?>" data-emptytext="<?php \MapasCulturais\i::esc_attr_e("Selecione a orientação sexual se for pessoa física");?>"><?php echo $entity->orientacaoSexual; ?></span></p>
                    <?php endif;?>

                    <?php if(isset($entity->raca)):?>
                        <p class="privado"><span class="icon icon-private-info"></span><span class="label"><?php \MapasCulturais\i::_e("Raça/Cor");?>:</span> <span class="js-editable" data-edit="raca" data-original-title="<?php \MapasCulturais\i::esc_attr_e("Raça/cor");?>" data-emptytext="<?php \MapasCulturais\i::esc_attr_e("Selecione a raça/cor se for pessoa física");?>"><?php echo $entity->raca; ?></span></p>
                    <?php endif;?>

                    <?php if(isset($entity->emailPrivado)): ?>
                        <p class="privado"><span class="icon icon-private-info"></span><span class="label"><?php \MapasCulturais\i::_e("Email Privado");?>:</span> <span class="js-editable <?php echo ($entity->isPropertyRequired($entity,"emailPrivado") && $editEntity? 'required': '');?>" data-edit="emailPrivado" data-original-title="<?php \MapasCulturais\i::esc_attr_e("Email Privado");?>" data-emptytext="<?php \MapasCulturais\i::esc_attr_e("Insira um email que não será exibido publicamente");?>"><?php echo $entity->emailPrivado; ?></span></p>
                    <?php endif;?>

                    <?php if(isset($entity->emailPublico)): ?>
                        <p><span class="label"><?php \MapasCulturais\i::_e("Email");?>:</span> <span class="js-editable" data-edit="emailPublico" data-original-title="<?php \MapasCulturais\i::esc_attr_e("Email Público");?>" data-emptytext="<?php \MapasCulturais\i::esc_attr_e("Insira um email que será exibido publicamente");?>"><?php echo $entity->emailPublico; ?></span></p>
                    <?php endif; ?>

                    <?php if(isset($entity->telefonePublico)): ?>
                        <p><span class="label"><?php \MapasCulturais\i::_e("Telefone Público");?>:</span> <span class="js-editable js-mask-phone" data-edit="telefonePublico" data-original-title="<?php \MapasCulturais\i::esc_attr_e("Telefone Público");?>" data-emptytext="<?php \MapasCulturais\i::esc_attr_e("Insira um telefone que será exibido publicamente");?>"><?php echo $entity->telefonePublico; ?></span></p>
                    <?php endif; ?>

                    <?php if(isset($entity->telefone1)): ?>
                        <p class="privado"><span class="icon icon-private-info"></span><span class="label"><?php \MapasCulturais\i::_e("Telefone 1");?>:</span> <span class="js-editable js-mask-phone" data-edit="telefone1" data-original-title="<?php \MapasCulturais\i::esc_attr_e("Telefone Privado");?>" data-emptytext="<?php \MapasCulturais\i::esc_attr_e("Insira um telefone que não será exibido publicamente");?>"><?php echo $entity->telefone1; ?></span></p>
                    <?php endif;?>

                    <?php if(isset($entity->telefone2)): ?>
                        <p class="privado"><span class="icon icon-private-info"></span><span class="label"><?php \MapasCulturais\i::_e("Telefone 2");?>:</span> <span class="js-editable js-mask-phone" data-edit="telefone2" data-original-title="<?php \MapasCulturais\i::esc_attr_e("Telefone Privado");?>" data-emptytext="<?php \MapasCulturais\i::esc_attr_e("Insira um telefone que não será exibido publicamente");?>"><?php echo $entity->telefone2; ?></span></p>
                    <?php endif; ?>
                    <?php $this->applyTemplateHook('tab-about-service','end'); ?>
                </div>
                <?php $this->applyTemplateHook('tab-about-service','after'); ?>

                <?php $this->part('singles/location', ['entity' => $entity]); ?>

            </div>
            <!--.ficha-spcultura-->

            <?php if(isset($entity->longDescription)): ?>
                <h3><?php \MapasCulturais\i::_e("Descrição");?></h3>
                <span class="descricao js-editable" data-edit="longDescription" data-original-title="<?php \MapasCulturais\i::esc_attr_e("Descrição do Agente");?>" data-emptytext="<?php \MapasCulturais\i::esc_attr_e("Insira uma descrição do agente");?>" ><?php echo nl2br($entity->longDescription); ?></span>
            <?php endif; ?>
            <!--.descricao-->
            <!-- Video Gallery BEGIN -->


            <?php if (isset($entity->videos)): ?>
                <h3><?php \MapasCulturais\i::_e("Vídeos");?></h3>
                <a name="video"></a>
                <div id="video-player" class="video" ng-non-bindable>
                    <iframe id="video_display" width="100%" height="100%" src="" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
                <ul class="clearfix js-videogallery" ng-non-bindable>
                    <?php foreach($entity->videos as $video): ?>
                        <li id="video-<?php echo $video->id ?>">
                            <a class="js-metalist-item-display" data-videolink="<?php echo $video->value;?>" title="<?php echo $video->title;?>">
                                <img src="<?php $this->asset('img/spinner_192.gif'); ?>" alt="" class="thumbnail_med_wide"/>
                                <h1 class="title"><?php echo $video->title;?></h1>
                            </a>
                        </li>
                    <?php endforeach;?>
                </ul>
            <?php endif;?>
            <!-- Video Gallery END -->

            <?php $this->applyTemplateHook('tab-about','end'); ?>
        </div>
        <!-- #sobre -->

        <?php $this->applyTemplateHook('tabs-content','end'); ?>
    </div>
    <!-- .tabs-content -->
    <?php $this->applyTemplateHook('tabs-content','after');?>

    <?php $this->applyTemplateHook('main-content','end'); ?>
</article>
<div class="sidebar-left sidebar agent">
    <!-- Related Seals BEGIN -->
    <?php if(isset($entity->_seals)):?>
        <div class="sidebar-left sidebar agent">
            <div class="selos-add">
            <div class="widget">
                <h3 text-align="left" vertical-align="bottom"><?php \MapasCulturais\i::_e("Selos Aplicados");?> 
                <div class="selos clearfix">
                <?php foreach($entity->_seals as $seal):?>
                    <div class="avatar-seal ng-scope">
                        <a href="<?php echo $app->createUrl('seal','single',[$seal->id]);?>" class="ng-binding">
                            <img ng-src="<?php echo $seal->url;?>">
                        </a>
                        <div class="descricao-do-selo">
                            <h1><a href="<?php echo $app->createUrl('seal','single',[$seal->id]);?>" class="ng-binding"><?php echo $seal->name;?></a></h1>
                        </div>
                    </div>
                <?php endforeach;?>
                </div>
            </div>
        </div>
    <?php endif;?>
    <!-- Related Seals END -->

    <?php if(isset($entity->_terms) && isset($entity->_terms->area)):?>
        <div class="widget">
        <h3><?php $this->dict('taxonomies:area: name') ?></h3>
            <?php foreach($entity->_terms->area as $area): ?>
                <a class="tag tag-<?php echo $entity->controller_id ?>">
                    <?php echo $area ?>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif;?>

    <?php if(isset($entity->_terms) && isset($entity->_terms->tag)): ?>
    <div class="widget">
        <h3><?php \MapasCulturais\i::_e("Tags");?></h3>
        <?php foreach($entity->_terms->tag as $tag): ?>
            <a class="tag tag-<?php echo $this->controller_id ?>" href="">
                <?php echo $tag; ?>
            </a>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>
<div class="sidebar agent sidebar-right">
    <!-- Related Agents BEGIN -->
    <?php if(isset($entity->_agents)):?>
        <div class="agentes-relacionados">
            <?php foreach($entity->_agents as $group => $agents): ?>
            <div class="widget">
                <h3><?php echo $group;?></h3>
                <div class="agentes clearfix">
                    <?php foreach($agents as $agent): ?>
                        <div class="avatar">
                            <a href="">
                                <img ng-src="" />
                            </a>
                            <div class="descricao-do-agente">
                                <h1><a href=""><?php echo $agent->name;?></a></h1>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    <?php endif;?>
    <!-- Related Agents END -->

    <!-- Spaces BEGIN -->
    <?php if(isset($entities->_spaces)): ?>
        <div class="widget">
            <h3><?php $this->dict('entities: Spaces of the agent'); ?></h3>
            <ul class="widget-list js-slimScroll">
                <?php foreach($entities->_spaces as $space): ?>
                    <li class="widget-list-item"><a href=""><span><?php echo $space->name; ?></span></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <!-- Spaces END -->

    <!-- Projects BEGIN -->
    <?php if(isset($entities->_projects)): ?>
        <div class="widget">
            <h3><?php $this->dict('entities: Projects of the agent'); ?></h3>
            <ul class="widget-list js-slimScroll">
                <?php foreach($entities->_projects as $project): ?>
                    <li class="widget-list-item"><a href=""><span><?php echo $project->name; ?></span></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <!-- Projects END -->

    <!-- Agents BEGIN -->
    <?php if(isset($entities->_children)): ?>
        <div class="widget">
            <h3><?php $this->dict('entities: Agent children'); ?></h3>
            <ul class="widget-list js-slimScroll">
                <?php foreach($entities->_children as $agent): ?>
                    <li class="widget-list-item"><a href=""><span><?php echo $agent->name; ?></span></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <!-- Agents END -->

    <!-- Link List BEGIN -->
    <?php if (isset($entity->links)): ?>
        <div class="widget">
            <h3><?php \MapasCulturais\i::_e("Links");?></h3>
            <ul class="js-metalist widget-list js-slimScroll">
                <?php foreach($entity->links as $link): ?>
                    <li id="link-<?php echo $link->id ?>" class="widget-list-item" >
                        <a class="js-metalist-item-display" href="<?php echo $link->value;?>"><span><?php echo $link->title;?></span></a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endif; ?>
    <!-- Link List END -->
</div>