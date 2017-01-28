<?php
echo $this->Flash->render('auth');
$this->assign('title', 'Nous contacter');
?>
<div id="content" class="content full">
    <div class="home-intro">
        <div class="container">
        </div>
    </div>
</div>
<div class="container">
    <div class="col-lg-10 col-lg-offset-1 well top-buffer-plus isRound">
        <div class="col-lg-10 col-lg-offset-1">
            <h3>Listes des sites compatibles :</h3>
            <div class="row">
                <div class="col-md-12">
                    <ul class="portfolio-list">
                        <div class="row">
                            <li class="col-md-2 col-sm-4 col-xs-12">
                                <div class="portfolio-item">
                                    <a href="https://www.amazon.fr/" target="_blank">
                                    <span class="thumb-info thumb-info-lighten">
                                        <span class="thumb-info-wrapper">
                                            <?php echo $this->Html->image('site_partenaire/amazon.jpg', array(
                                                'alt' => 'amazon',
                                                'class' => 'img-responsive sameIcon',
                                            )); ?>
                                        </span>
                                    </span>
                                    </a>
                                </div>
                            </li>
                            <li class="col-md-2 col-sm-4 col-xs-12">
                                <div class="portfolio-item">
                                    <a href="http://www.castorama.fr/store/" target="_blank">
                                    <span class="thumb-info thumb-info-lighten">
                                        <span class="thumb-info-wrapper">
                                            <?php echo $this->Html->image('site_partenaire/castorama.jpg', array(
                                                'alt' => 'castorama',
                                                'class' => 'img-responsive sameIcon'
                                            )); ?>
                                        </span>
                                    </span>
                                    </a>
                                </div>
                            </li>
                            <li class="col-md-2 col-sm-4 col-xs-12">
                                <div class="portfolio-item">
                                    <a href="http://www.cdiscount.com/" target="_blank">
                                    <span class="thumb-info thumb-info-lighten">
                                        <span class="thumb-info-wrapper">
                                            <?php echo $this->Html->image('site_partenaire/cdiscount.png', array(
                                                'alt' => 'cdiscount',
                                                'class' => 'img-responsive sameIcon')); ?>
                                        </span>
                                    </span>
                                    </a>
                                </div>
                            </li>
                            <li class="col-md-2 col-sm-4 col-xs-12">
                                <div class="portfolio-item">
                                    <a href="http://www.darty.com/" target="_blank">
                                    <span class="thumb-info thumb-info-lighten">
                                        <span class="thumb-info-wrapper">
                                            <?php echo $this->Html->image('site_partenaire/darty.png', array(
                                                'alt' => 'darty',
                                                'class' => 'img-responsive sameIcon'
                                            )); ?>
                                            </span>
                                        </span>
                                        </span>
                                    </a>
                                </div>
                            </li>
                            <li class="col-md-2 col-sm-4 col-xs-12">
                                <div class="portfolio-item">
                                    <a href="http://www.fnac.com/" target="_blank">
                                    <span class="thumb-info thumb-info-lighten">
                                        <span class="thumb-info-wrapper">
                                            <?php echo $this->Html->image('site_partenaire/fnac.gif', array(
                                                'alt' => 'fnac',
                                                'class' => 'img-responsive sameIcon')); ?>
                                        </span>
                                    </span>
                                    </a>
                                </div>
                            </li>
                            <li class="col-md-2 col-sm-4 col-xs-12">
                                <div class="portfolio-item">
                                    <a href="https://www.grosbill.com/" target="_blank">
                                    <span class="thumb-info thumb-info-lighten">
                                        <span class="thumb-info-wrapper">
                                            <?php echo $this->Html->image('site_partenaire/grosbill.png', array(
                                                'alt' => 'grosbill',
                                                'class' => 'img-responsive sameIcon')); ?>
                                        </span>
                                    </span>
                                    </a>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="col-md-2 col-sm-4 col-xs-12">
                                <div class="portfolio-item">
                                    <a href="http://www.laredoute.fr/" target="_blank">
                                    <span class="thumb-info thumb-info-lighten">
                                        <span class="thumb-info-wrapper">
                                            <?php echo $this->Html->image('site_partenaire/laredoute.png', array(
                                                'alt' => 'laredoute',
                                                'class' => 'img-responsive sameIcon')); ?>
                                        </span>
                                    </span>
                                    </a>
                                </div>
                            </li>
                            <li class="col-md-2 col-sm-4 col-xs-12">
                                <div class="portfolio-item">
                                    <a href="http://www.ldlc.com/" target="_blank">
                                    <span class="thumb-info thumb-info-lighten">
                                        <span class="thumb-info-wrapper">
                                            <?php echo $this->Html->image('site_partenaire/ldlc.png', array(
                                                'alt' => 'ldlc',
                                                'class' => 'img-responsive sameIcon')); ?>
                                            </span>
                                        </span>
                                        </span>
                                    </a>
                                </div>
                            </li>
                            <li class="col-md-2 col-sm-4 col-xs-12">
                                <div class="portfolio-item">
                                    <a href="http://www.priceminister.com/" target="_blank">
                                    <span class="thumb-info thumb-info-lighten">
                                        <span class="thumb-info-wrapper">
                                            <?php echo $this->Html->image('site_partenaire/priceminister.jpg', array(
                                                'alt' => 'priceminister',
                                                'class' => 'img-responsive sameIcon')); ?>
                                        </span>
                                    </span>
                                    </a>
                                </div>
                            </li>
                            <li class="col-md-2 col-sm-4 col-xs-12">
                                <div class="portfolio-item">
                                    <a href="http://www.rueducommerce.fr/home/index.htm" target="_blank">
                                    <span class="thumb-info thumb-info-lighten">
                                        <span class="thumb-info-wrapper">
                                            <?php echo $this->Html->image('site_partenaire/rueducommerce.png', array(
                                                'alt' => 'rueducommerce',
                                                'class' => 'img-responsive sameIcon')); ?>
                                        </span>
                                    </span>
                                    </a>
                                </div>
                            </li>
                            <li class="col-md-2 col-sm-4 col-xs-12">
                                <div class="portfolio-item">
                                    <a href="http://www.tesco.com/" target="_blank">
                                    <span class="thumb-info thumb-info-lighten">
                                        <span class="thumb-info-wrapper">
                                            <?php echo $this->Html->image('site_partenaire/tesco.jpg', array(
                                                'alt' => 'tesco',
                                                'class' => 'img-responsive sameIcon')); ?>
                                            </span>
                                        </span>
                                        </span>
                                    </a>
                                </div>
                            </li>
                            <li class="col-md-2 col-sm-4 col-xs-12">
                                <div class="portfolio-item">
                                    <a href="http://www.ubaldi.com/accueil/" target="_blank">
                                    <span class="thumb-info thumb-info-lighten">
                                        <span class="thumb-info-wrapper">
                                            <?php echo $this->Html->image('site_partenaire/ubaldi.gif', array(
                                                'alt' => 'ubaldi',
                                                'class' => 'img-responsive sameIcon')); ?>
                                            </span>
                                        </span>
                                        </span>
                                    </a>
                                </div>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-lg-10 col-lg-offset-1 well top-buffer-plus isRound">
        <div class="col-lg-10 col-lg-offset-1">
            <h3 style="text-align:left;">Un site à ajouter ? Vous le voulez, Weesh le fait ! </h3>
            <?php echo $this->Form->create('Contact', array('action' => 'index', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false))); ?>
            <div class="form-group">
                <label for="username" class="col-sm-3 control-label"><span
                            class="pull-left">Site à ajouter<span style="color:red;">*</span></label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('site_name', array('class' => 'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="username" class="col-sm-3 control-label"><span
                            class="pull-left">URL du site</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('site_url', array('class' => 'form-control', 'required' => 'false')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label"><span
                            class="pull-left">Adresse e-mail</label>
                <div class="col-sm-9">
                    <?php
                    if (AuthComponent::user()['email']){
                        echo $this->Form->input('email', array('default' => AuthComponent::user()['email'],'class' => 'form-control', 'required' => 'false'));
                    } else {
                        echo $this->Form->input('email', array('class' => 'form-control', 'required' => 'false'));
                    } ?>
                </div>
            </div>
            <div class="form-group">
                <label for="message" class="col-sm-3 control-label"><span
                            class="pull-left">Votre message</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('message', array('class' => 'form-control', 'type' => 'textarea', 'required' => 'false')); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-2">
                    <?php echo $this->Form->submit('Envoyer', array('class' => 'btn btn-primary btn-orange')) ?>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
            <?php echo $this->Flash->render(); ?>
        </div>
    </div>
</div>