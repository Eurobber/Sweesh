<?php
echo $this->Flash->render('auth');
$this->assign('title', 'Connexion à sWeesh');
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
    <div class="col-lg-8 col-lg-offset-2 well top-buffer-plus isRound">
        <div class="col-lg-10 col-lg-offset-1">
            <h1 class="">Me connecter à sWeesh : </h1>
            <?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'inputDefaults' => array('label' => false))); ?>
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Nom d'utilisateur</label>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('username', array('class' => 'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Mot de passe</label>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('password', array('class' => 'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-2">
                    <?php echo $this->Form->submit('Login', array('class' => 'btn btn-primary btn-orange')) ?>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
            <span style="color:red;"><?php echo $this->Session->flash(); ?></span>
        </div>
    </div>
</div>