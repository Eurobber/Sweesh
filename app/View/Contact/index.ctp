<?php
echo $this->Flash->render('auth');
$this->assign('title', 'Nous contacter');
?>
<div id="content" class="content full">
    <div class="home-intro">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="span12">
                    <p>"Make your <em>Weesh </em> come true"</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-lg-10 col-lg-offset-1 well top-buffer-plus isRound">
        <div class="col-lg-10 col-lg-offset-1">
            <h1 class="">Vous voulez que nous ajoutons votre site e-commerce favori ? Dites le nous : </h1>
            <?php echo $this->Form->create('Contact', array('class' => 'form-horizontal', 'inputDefaults' => array('label' => false))); ?>
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Nom du site*</label>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('site_name', array('class' => 'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">URL du site</label>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('site_url', array('class' => 'form-control', 'required' => 'false')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Votre email</label>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('email', array('class' => 'form-control', 'required' => 'false')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="message" class="col-sm-2 control-label">Votre message</label>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('message', array('class' => 'form-control', 'required' => 'false')); ?>
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