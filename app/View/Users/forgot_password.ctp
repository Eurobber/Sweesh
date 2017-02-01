<div id="content" class="content full">
    <div class="home-intro">
        <div class="container">
            <div class="row justify-content-md-center"> </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-lg-8 col-lg-offset-2 well top-buffer-plus isRound bloc">
        <div class="col-lg-10">
            <h1>Enter Your Username</h1>
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label"><span class="pull-left">Identifiant</label>
                <div class="col-sm-3">
                    <?php echo $this->Form->input('username', array('class' => 'form-control')); ?>
                </div>    
                </div>
                   
                <div class="form-group">
                <div style="margin-top:5%;">
                            <?php echo $this->Form->submit('Send Password Reset Instructions', array('class' => 'btn btn-lg btn-primary btn-orange', 'controller' => 'weesh', 'action' => 'forgot_password')); ?>
                        </div>
                    </div>
            </div>
            <?php echo $this->Form->end(); ?>
            <?php echo $this->Session->flash(); ?>
        </div>
    </div>