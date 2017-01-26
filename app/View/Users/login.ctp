<?php 
	echo $this->Flash->render('auth'); 	
	$this->assign('title', 'Connexion à sWeesh');
?>

<div class="col-lg-6 col-lg-offset-3 well top-buffer-plus isRound">
          <div class="col-lg-10 col-lg-offset-1">
                <h1 class="page-header">Me connecter à <span style="color:#00aaff;">s</span><span style="color:#aaa;">W</span><span style="color:#ff4433;">eesh</span></h1>
                    <?php echo $this->Form->create('User',array('class'=>'form-horizontal','inputDefaults'=>array('label'=>false)));?>
                          <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                              <?php echo $this->Form->input('username',array('class'=>'form-control'));?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                               <?php echo $this->Form->input('password',array('class'=>'form-control'));?>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-2">
                              	<?php echo $this->Form->submit('Login',array('class'=>'btn btn-primary '))?>
                            </div>                            
                          </div>
                    <?php echo $this->Form->end();?>
                    <span style="color:red;"><?php echo $this->Session->flash(); ?></span>
                </div>

                
          </div>
	</div>


