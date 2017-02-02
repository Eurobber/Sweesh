<div id="content" class="content full">
    <div class="home-intro">
        <div class="container">
            <div class="row justify-content-md-center"> </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-lg-8 col-lg-offset-2 well top-buffer-plus bloc center">
        <div class="col-lg-10">
            <h1>Mot de passe perdu</span></h1>
            <?php echo $this->Form->create('User', array('action' => 'forgot_password', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false))); ?>
                <div class="form-group">
                    <label for="username" class="col-sm-2 control-label"><span class="pull-left">Identifiant</label>
                <div class="col-sm-4">
                    <?php echo $this->Form->input('username', array('class' => 'form-control')); ?>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                        <?php echo $this->Form->submit('Récupérer mon mot de passe', array('class' => 'btn btn-lg btn-primary btn-orange', 'controller' => 'users', 'action' => 'forgot_password')); ?>
                          </div>
                     </div>
                     <div class="row col-sm-6 col-sm-offset-2">
                        <span style="color:red;"><?php echo $this->Session->flash(); ?></span>
                     </div>
                </div>
            <?php echo $this->Form->end(); ?>
             </div>
        </div>
    </div>
</div>