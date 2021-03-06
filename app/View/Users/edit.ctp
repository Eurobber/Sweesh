<?php
echo $this->Flash->render('auth');
$this->assign('title', 'Mes paramètres');
?>
    <div id="content" class="content full">
        <div class="home-intro">
            <div class="container">
                <div class="row justify-content-md-center"> </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-12 well top-buffer-plus bloc">
            <div class="col-lg-12">
                <h1>Mes paramètres</span></h1>
                <?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'inputDefaults' => array('label' => false))); ?>
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label"><span class="pull-left">Mot de passe</label>
                <div class="col-sm-3">
                    <?php echo $this->Form->input('password1', array('class' => 'form-control', 'type' => 'password')); ?>
                </div>

                <label for="password" class="col-sm-3 control-label"><span
                        class="pull-left">Confirmation du mot de passe</label>
                <div class="col-sm-3">
                    <?php echo $this->Form->input('password2', array('class' => 'form-control', 'type' => 'password')); ?>
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
                <label for="birthdate" class="col-sm-2 control-label"><span class="pull-left">Date de naissance</label>
                <div class="col-sm-4">
                    <div class="form-inline">
                        <?php echo $this->Form->input('birthdate', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 90, 'maxYear' => date('Y') - 18, 'class' => 'form-control')); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2" style="margin-top:5%;">
                    <?php echo $this->Form->submit('Modifier vos informations', array('class' => 'btn btn-lg btn-primary btn-orange', 'controller' => 'weesh', 'action' => 'overview')) ?>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
            <?php echo $this->Session->flash(); ?>
        </div>
    </div>