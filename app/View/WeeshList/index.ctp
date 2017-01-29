<div id="content" class="content full">
    <div class="home-intro">
        <div class="container">
            <div class="row justify-content-md-center">
            </div>
        </div>
    </div>
</div>

<?php if (!AuthComponent::user()): ?>
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
<?php else: ?>
    <div class="container">
        <div class="row center bloc">
            <p class="col-md-12">
            <h3><?php echo 'Vos listes les plus récentes' ?></h3></p>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <?php echo $this->Html->image('testCarousel/ubaldi_90356.jpg', ['alt' => 'Light', 'class' => 'sameImg']); ?>
                        <div class="carousel-caption">
                            <h3>Chania</h3>
                            <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
                        </div>
                    </div>

                    <div class="item">
                        <?php echo $this->Html->image('testCarousel/ubaldi_90356.jpg', ['alt' => 'Light', 'class' => 'sameImg']); ?>
                        <div class="carousel-caption">
                            <h3>Chania</h3>
                            <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
                        </div>
                    </div>

                    <div class="item">
                        <?php echo $this->Html->image('testCarousel/ubaldi_660670.jpg', ['alt' => 'Light', 'class' => 'sameImg']); ?>
                        <div class="carousel-caption">
                            <h3>Flowers</h3>
                            <p>Beatiful flowers in Kolymbari, Crete.</p>
                        </div>
                    </div>

                    <div class="item">
                        <?php echo $this->Html->image('testCarousel/ubaldi_660670.jpg', ['alt' => 'Light', 'class' => 'sameImg']); ?>
                        <div class="carousel-caption">
                            <h3>Flowers</h3>
                            <p>Beatiful flowers in Kolymbari, Crete.</p>
                        </div>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Faire une if, si pas de weeshlist ne pas afficher le caroussel -->
<div class="container">
    <div class="row center bloc">
        <p class="col-md-12">
        <h3><?php echo 'Vous voulez ajouter une weeshlist ?' ?></h3></p>
        <?php echo $this->Form->create('WeeshList', array('url' => array('controller' => 'weeshlist', 'action' => 'add'), 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false))); ?>
        <div class="form-group">
            <label for="username" class="col-sm-2 control-label"><span class="pull-left">Nom</label>
            <div class="col-sm-3">
                <?php echo $this->Form->input('name', array('class' => 'form-control', 'type' => 'text')); ?>
            </div>

            <label for="password" class="col-sm-3 control-label"><span
                        class="pull-left">Visibilité</label>
            <div class="col-sm-3">
                <?php echo $this->Form->input('visibility', array('class' => 'form-control', 'type' => 'select', 'options' => array('public' => 'public', 'private' => 'private'))); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2" style="margin-top:5%;">
                <?php echo $this->Form->submit('Créer', array('class' => 'btn btn-lg btn-primary btn-orange', 'controller' => 'WeeshList', 'action' => 'add')) ?>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
        <?php echo $this->Session->flash(); ?>
    </div>
</div>
<?php endif; ?>
