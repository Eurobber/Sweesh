<div id="content" class="content full">
    <div class="home-intro">
        <div class="container">
            <div class="row justify-content-md-center">
            </div>
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
<?php } elseif (!empty($lists)) { ?>
    <div class="container">
        <div class="col-lg-12 well top-buffer-plus bloc">

            <p class="col-md-12">
            <div class="container">
                <h1>Vous avez actuellement <?php echo $nb ?> Weeshlists</h1>
        <div id="main_area">
                <!-- Slider -->
                <div class="row">
                    <div class="col-lg-12" id="slider">
                        <!-- Top part of the slider -->
                        <div class="row">
                            <div class="col-lg-8" id="carousel-bounding-box">
                                <div class="carousel slide" id="myCarousel">
                                
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="active item" data-slide-number="0">
                                            <?php
                                            echo $this->Html->image("biglogo.jpg", array("alt" => "Logo", "class"=>"centerImg"));
                                                ?></div>

                                        
                                        <?php

                                        $i = 0;
                                        foreach ($lists as $value) {
                                            
                                            foreach ($value as $item) {
                                                $i++;
                                                
                                                if($i<$nb){
                                                    echo "<div class=\"item\" data-slide-number=\"".$i."\">\n"; 
                                                    $lnk = $i+295;
                                                    echo "<img class=\"centerImg\" src=\"https://unsplash.it/$lnk/$lnk\"></div>\n";
                                                }                                               
                                            }
                                        }  ?>
                                    </div><!-- Carousel nav -->
                                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>                                       
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>                                       
                                    </a>                                
                                    </div>
                            </div>

                            <div class="col-sm-3" id="carousel-text"></div>

                            <div id="slide-content" style="display: none;">
                                <?php
                                    $i = -1;
                                        foreach ($lists as $value) {
                                            
                                            foreach ($value as $item) {
                                                $i++;
                                    if($i<$nb){echo "<div id=\"slide-content-$i\">\n"; 
                                    echo "<h3>".$lists[$i]['WeeshList']['name']."</h3>\n"; 
                                    echo "<p>".$lists[$i]['WeeshList']['description']."</p>\n";                                     
                                    echo "</div>\n";
                                    }
                                    
                                    }
                                }  ?>
                            </div>
                        </div>
                    </div>
                </div><!--/Slider-->

                <div class="row hidden-xs" id="slider-thumbs">
                        <!-- Bottom switcher of slider -->
                        <ul class="hide-bullets">
                        <?php
                                $i = -1;
                                    foreach ($lists as $value) {
                                        
                                        foreach ($value as $item) {
                                            $i++;
                                            if($i==0){
                                                echo "<li class=\"col-sm-2\">\n"; 
                                                echo "<a class=\"thumbnail\" id=\"carousel-selector-$i\">".$this->Html->image("biglogo.jpg", array("alt" => "Logo"))."</a>\n"; 
                                                echo "</li>\n";
                                            }
                                            else if($i<$nb){
                                                echo "<li class=\"col-sm-2\">\n"; 
                                                $lnk = $i+295;
                                                echo "<a class=\"thumbnail\" id=\"carousel-selector-$i\"><img src=\"https://unsplash.it/$lnk/$lnk\"></a>\n"; 
                                                echo "</li>\n";
                                            }
                                        }
                                }  ?>                            
                        </ul>                 
                </div>
        </div>
</div>
        </div>
    </div>
<?php }; ?>
<?php if (AuthComponent::user()) { ?>
    <div class="container">
        <div class="col-lg-12 well top-buffer-plus bloc">
            <div class="col-lg-12">
                <h3>Ajouter une Weeshlist</span></h3>
                <?php echo $this->Form->create('WeeshList', array('controller' => 'weesh_lists', 'action' => 'add', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false))); ?>
                <div class="form-group">
                    <label for="name" class="col-sm-2 col-sm-offset-2 control-label"><span class="pull-left">Titre</label>
                    <div class="col-sm-4">
                        <?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
                    </div>
                    </div>
                <div class="form-group">
                    <label for="visibility" class="col-sm-2 col-sm-offset-2 control-label"><span class="pull-left">Visibilité</label>
                    <div class="col-sm-4">
                        <?php echo $this->Form->input('visibility', array('class' => 'form-control', 'type' => 'select', 'options' => array('public' => 'public', 'private' => 'private'))); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-sm-2 col-sm-offset-2 control-label"><span class="pull-left">Description</label>
                    <div class="col-sm-4">
                        <?php echo $this->Form->input('description', array('class' => 'form-control')); ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-4" style="margin-top:5%;">
                        <?php echo $this->Form->submit('Ajouter la Weeshlist', array('class' => 'btn btn-lg btn-primary btn-orange')) ?>
                    </div>
                </div>
                    <?php echo $this->Form->end(); ?>
                    <?php echo $this->Session->flash(); ?>
            </div>
        </div>
    </div>
<?php }; ?>
<?php $this->start('script'); ?>
<script type="text/javascript">
    $('.carousel-indicators').children().first().addClass("active")
    $(".item").first().addClass("active");
</script>
<?php $this->end(); ?>

