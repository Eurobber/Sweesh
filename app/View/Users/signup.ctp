<head> 
  <title><? echo $title_for_layout ?></title> 
  <!-- more code here ... --> 
</head> 
 
<?php  
  echo $this->Flash->render('auth');    
  $this->assign('title', 'Ajouter Utilisateur'); 
?> 
 
<div class="col-lg-6 col-lg-offset-3 well top-buffer-plus isRound"> 
          <div class="col-lg-10 col-lg-offset-1"> 
                <h1 class="page-header">Rejoindre la communauté <span style="color:#00aaff;">s</span><span style="color:#aaa;">W</span><span style="color:#ff4433;">eesh</span></h1> 
                    <?php echo $this->Form->create('User',array('class'=>'form-horizontal','inputDefaults'=>array('label'=>false)));?> 
                          <div class="form-group"> 
                            <label for="username" class="col-sm-2 control-label">Identifiant</label> 
                            <div class="col-sm-10"> 
                              <?php echo $this->Form->input('username',array('class'=>'form-control'));?> 
                            </div> 
                          </div> 
                          <div class="form-group"> 
                            <label for="password" class="col-sm-2 control-label">Mot de passe</label> 
                            <div class="col-sm-10"> 
                               <?php echo $this->Form->input('password',array('class'=>'form-control'));?> 
                            </div> 
                          </div> 
                          <div class="form-group"> 
                            <label for="firstname" class="col-sm-2 control-label">Prénom</label> 
                            <div class="col-sm-10"> 
                               <?php echo $this->Form->input('firstname',array('class'=>'form-control'));?> 
                            </div> 
                          </div> 
                          <div class="form-group"> 
                            <label for="lastname" class="col-sm-2 control-label">Nom de famille</label> 
                            <div class="col-sm-10"> 
                               <?php echo $this->Form->input('lastname',array('class'=>'form-control'));?> 
                            </div> 
                          </div> 
                          <div class="form-group"> 
                            <label for="gender" class="col-sm-2 control-label">Genre</label> 
                            <div class="col-sm-10"> 
                               <?php echo $this->Form->input('gender',array('class' =>'form-control', 'options' => array('male' => 'Homme', 'female' => 'Femme')))?> 
                            </div> 
                          </div> 
                          <div class="form-group"> 
                            <label for="street" class="col-sm-2 control-label">Adresse</label> 
                            <div class="col-sm-10"> 
                               <?php echo $this->Form->input('street',array('class'=>'form-control'));?> 
                            </div> 
                          </div> 
                          <div class="form-group"> 
                            <label for="city" class="col-sm-2 control-label">Ville</label> 
                            <div class="col-sm-10"> 
                               <?php echo $this->Form->input('city',array('class'=>'form-control'));?> 
                            </div> 
                          </div> 
                          <div class="form-group"> 
                            <label for="zipcode" class="col-sm-2 control-label">Code postal</label> 
                            <div class="col-sm-10"> 
                               <?php echo $this->Form->input('zipcode',array('class'=>'form-control'));?> 
                            </div> 
                          </div> 
                          <div class="form-group"> 
                            <label for="email" class="col-sm-2 control-label">Adresse e-mail</label> 
                            <div class="col-sm-10"> 
                               <?php echo $this->Form->input('email',array('class'=>'form-control'));?> 
                            </div> 
                          </div> 
                          <div class="form-group"> 
                            <label for="birthdate" class="col-sm-2 control-label">Date de naissance</label> 
                            <div class="col-sm-10"> 
                              <div class="form-inline"> 
                                   <?php echo $this->Form->input('birthdate', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 90, 'maxYear' => date('Y') - 18, 'class'=>'form-control'));?> 
                                 </div> 
                            </div> 
                          </div> 



                          <div class="form-group"> 
                            <div class="col-sm-offset-5 col-sm-2"> 
                                <?php echo $this->Form->submit('Signup', array('class'=>'btn btn-primary ', 'controller'=>'sweesh', 'action'=>'overview'))?> 
                            </div>                             
                          </div> 
                    <?php echo $this->Form->end();?> 
                    <span style="color:red;"><?php echo $this->Session->flash(); ?></span> 
                </div> 
 
                 
</div>