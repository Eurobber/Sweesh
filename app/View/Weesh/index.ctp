<div id="content" class="content full">
    <div class="home-intro">
        <div class="container">
            <div class="row justify-content-md-center">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row center bloc">
    <?php if (!AuthComponent::user()): ?>
        <p class="col-md-12"> Vous n'êtes pas connecté, veuillez vous identifier pour utiliser Weesh.</p>
        <div class="col-md-3 col-md-offset-2">
                <?php echo $this->Html->link('Connexion', array('controller' => 'users', 'action' => 'login'), array('class' => 'btn btn-large btn-primary btn-orange')); ?>
        </div>
        <div class="col-md-3 col-md-offset-2">
                <?php echo $this->Html->link('Créer un compte', array('controller' => 'users', 'action' => 'signup'), array('class' => 'btn btn-large btn-primary btn-orange')); ?>
    </div>
    <?php else: ?>
        <p class="col-md-12"><?php echo 'Bienvenue ' . AuthComponent::user()['firstname'] . ' ' . AuthComponent::user()['lastname'] ?></p>
    <?php endif; ?>
    </div>
</div>