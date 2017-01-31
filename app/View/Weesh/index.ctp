<div id="content" class="content full">
    <div class="home-intro">
        <div class="container">
            <div class="row justify-content-md-center"> </div>
        </div>
    </div>
</div>

<?php if (!AuthComponent::user()) { ?>
    <div class="container">
        <div class="row center bloc">
            <p class="col-md-12">
            <h3>Vous n'êtes pas connecté, veuillez vous identifier pour utiliser Weesh.</h3></p>
            <div class="col-md-4 col-md-offset-2">
                <?php echo $this->Html->link('Me connecter à mon espace Weesh', array('controller' => 'users', 'action' => 'login'), array('class' => 'btn btn-large btn-primary btn-orange')); ?>
            </div>
            <div class="col-md-4">
                <?php echo $this->Html->link('Je ne possède pas de compte Weesh', array('controller' => 'users', 'action' => 'signup'), array('class' => 'btn btn-large btn-primary btn-orange')); ?>
            </div>
        </div>
    </div>
<?php } ?>