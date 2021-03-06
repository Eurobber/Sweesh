<?php
echo $this->Flash->render('auth');
$this->assign('title', 'Connectez-vous à Weesh !');
?>
    <div id="content" class="content full">
        <div class="home-intro">
            <div class="container">
                <div class="row justify-content-md-center"> </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-8 col-lg-offset-2 well top-buffer-plus bloc">
            <div class="col-lg-10">
                <h1 class="">Me connecter à Weesh</h1>
                <?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'inputDefaults' => array('label' => false))); ?>
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label"><span class="pull-left">Identifiant</span></label>
                        <div class="col-sm-9">
                            <?php echo $this->Form->input('username', array('class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label"><span class="pull-left">Mot de passe</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('password', array('class' => 'form-control')); ?>
                </div>
            </div>
     
            <div class="form-group">
                <div class="col-sm-2" style="margin-top:5%;">
                    <?php echo $this->Form->submit('Accéder à mon espace Weesh', array('class' => 'btn btn-lg btn-primary btn-orange')) ?>
                </div>
                <div class="col-sm-6 col-sm-offset-4">
                    <span style="color:red;"><?php echo $this->Session->flash(); ?></span> 
                </div>
            </div>
            <div class="form-group">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                     <small style="display:inline;"> <?php echo $this->Html->link('Mot de passe oublié?', array('controller' => 'users', 'action' => 'forgot_password')); ?></small>
                             </div>
                         </div>
                    </div>
                </div>
            <?php echo $this->Form->end(); ?>
       
            </div>
        </div>