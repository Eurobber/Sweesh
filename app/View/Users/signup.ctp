<?php
echo $this->Flash->render('auth');
$this->assign('title', 'Ajouter Utilisateur');
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
    <div class="col-lg-12 well top-buffer-plus isRound">
        <div class="col-lg-12">
            <h1>Rejoindre la communauté Weesh</span></h1>
            <?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'inputDefaults' => array('label' => false))); ?>
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label"><span class="pull-left">Identifiant</label>
                <div class="col-sm-3">
                    <?php echo $this->Form->input('username', array('class' => 'form-control')); ?>
                </div>

                <label for="password" class="col-sm-3 control-label"><span
                            class="pull-left">Mot de passe</label>
                <div class="col-sm-3">
                    <?php echo $this->Form->input('password', array('class' => 'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label"><span class="pull-left">Prénom</label>
                <div class="col-sm-3">
                    <?php echo $this->Form->input('firstname', array('class' => 'form-control')); ?>
                </div>

                <label for="lastname" class="col-sm-3  control-label"><span class="pull-left">Nom de famille</label>
                <div class="col-sm-3">
                    <?php echo $this->Form->input('lastname', array('class' => 'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="gender" class="col-sm-2 control-label"><span class="pull-left">Genre</label>
                <div class="col-sm-3">
                    <?php echo $this->Form->input('gender', array('class' => 'form-control', 'options' => array('male' => 'Homme', 'female' => 'Femme'))) ?>
                </div>

                <label for="street" class="col-sm-3 control-label"><span
                            class="pull-left">Adresse</label>
                <div class="col-sm-3">
                    <?php echo $this->Form->input('street', array('class' => 'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="city" class="col-sm-2 control-label"><span class="pull-left">Ville</label>
                <div class="col-sm-3">
                    <?php echo $this->Form->input('city', array('class' => 'form-control')); ?>
                </div>

                <label for="zipcode" class="col-sm-3 control-label"><span
                            class="pull-left">Code postal</label>
                <div class="col-sm-3">
                    <?php echo $this->Form->input('zipcode', array('class' => 'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label"><span class="pull-left">E-mail</label>
                <div class="col-sm-3">
                    <?php echo $this->Form->input('email', array('class' => 'form-control')); ?>
                </div>

                <label for="birthdate" class="col-sm-3 control-label"><span class="pull-left">Date de naissance</label>
                <div class="col-sm-4">
                    <div class="form-inline">
                        <?php echo $this->Form->input('birthdate', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 90, 'maxYear' => date('Y') - 18, 'class' => 'form-control')); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2" style="margin-top:5%;">
                    <?php echo $this->Form->submit('Créer mon compte Weesh et commencer à comparer', array('class' => 'btn btn-lg btn-primary ', 'controller' => 'sweesh', 'action' => 'overview')) ?>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
            <span style="color:red;"><?php echo $this->Session->flash(); ?></span>
        </div>
    </div>