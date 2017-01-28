<?php
echo $this->Html->docType();
?>
<html>
<head>
    <!-- Basic -->
    <?php echo $this->Html->charset(); ?>
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <title>
        <?php echo $this->fetch('title'); ?>
    </title>
    <meta name="keywords" content="Weesh"/>
    <meta name="description" content="Weesh">
    <meta name="author" content="Weesh">
    <?php //<!-- Favicons -->
    echo $this->Html->meta('favicon.ico', '/img/favicon.ico', array (
    'type' => 'icon' 
    ) ); ?>

    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <?php echo $this->fetch('meta'); ?>

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Pattaya" rel="stylesheet" type="text/css">
    <!-- STYLESHEET SECTION -->
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <?php
    // Libs CSS
    echo $this->Html->css('../vendor/bootstrap-3.3.7-dist/css/bootstrap');
    echo $this->Html->css('../vendor/animate/animate');
    echo $this->Html->css('../vendor/magnific-popup/dist/magnific-popup');

    // Theme CSS
    echo $this->Html->css('theme');
    echo $this->Html->css('theme-blog');
    echo $this->Html->css('theme-elements');
    echo $this->Html->css('theme-shop');

    // Current Page CSS
    echo $this->Html->css('../vendor/rs-plugin/css/settings');
    echo $this->Html->css('../vendor/rs-plugin/css/layers');
    echo $this->Html->css('../vendor/rs-plugin/css/navigation');
    echo $this->Html->css('../vendor/circle-flip-slideshow/css/component');

    // Skin css
    echo $this->Html->css('default');
    // Skin Weesh
    echo $this->Html->css('color');
    // CSS custom
    echo $this->Html->css('custom');
    // Icones réseaux sociaux
    echo $this->Html->css('socialicons');
    ?>
    <!-- Material design https://github.com/FezVrasta/bootstrap-material-design -->
    <?php echo $this->fetch('css'); ?>
    <!-- END STYLESHEET SECTION -->
</head>
<body>
<div class="body">
    <header id="header" class="header-narrow"
            data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 0, "stickySetTop": "0"}'>
        <div class=" header-body">
            <div class="header-container container">
                <div class="header-row">
                    <div class="header-column">
                        <div class="header-logo">
                            <?php
                            echo $this->Html->image("wsh.png", array(
                                "alt" => "Logo",
                                "class" => "logo",
                                "url" => array('controller' => 'weesh', 'action' => 'index')
                            ));
                            ?>
                        </div>
                    </div>
                    <div class="header-column">
                        <div class="header-row">
                            <div class="header-nav">
                                <button class="btn header-btn-collapse-nav" data-toggle="collapse"
                                        data-target=".header-nav-main"><i class="fa fa-bars"></i></button>
                                <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                                    <nav>
                                        <ul class="nav nav-pills nav-main" id="mainNav">
                                            <li><?php if (AuthComponent::user()):
                                                    // Logged in, show the my products link
                                                    echo $this->Html->link('Mes Produits', array('controller' => 'weesh', 'action' => 'myProducts'), array('class' => 'purple'));
                                                endif; ?>
                                            </li>
                                            <li><?php if (AuthComponent::user()):
                                                    // Logged in, show the my products link
                                                    echo $this->Html->link('Mes Listes', array('controller' => 'weeshlist', 'action' => 'index'), array('class' => 'purple'));
                                                endif; ?>
                                            </li>
                                            <li><?php if (AuthComponent::user()):
                                                    // Logged in, show the parameters link
                                                    echo $this->Html->link('Paramètres', array('controller' => 'weesh', 'action' => 'parameters'));
                                                endif; ?>
                                            </li>
                                            <li> <?php if (!AuthComponent::user()):
                                                    // Not logged in, show the register link
                                                    echo $this->Html->link('Inscription', array('controller' => 'users', 'action' => 'signup'), array('class' => 'purple'));
                                                endif; ?>
                                            </li>
                                            <li>
                                                <?php if (AuthComponent::user()):
                                                    // Logged in, show the logout link
                                                    echo $this->Html->link('Déconnexion', array('controller' => 'users', 'action' => 'logout'), array('class' => 'purple'));
                                                else:
                                                    // Not logged in, show login link
                                                    echo $this->Html->link('Connexion', array('controller' => 'users', 'action' => 'login'), array('class' => 'purple'));
                                                endif; ?>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-row">
                </div>
            </div>
        </div>
    </header>

    <div id="main"><!-- old class="content" -->
        <?php
        // CONTENT FOR CHILD
        echo $this->Flash->render();
        echo $this->fetch('content');
        ?>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="footer-ribon"><span style="font-family: 'Pattaya', sans-serif;">Plus d'informations</span></div>
                
                <div class="col-md-4">
                    <h4>Nous sommes sur @Twitter</h4>
                    <a class="twitter-timeline" data-lang="fr" data-width="320" data-height="200" data-theme="light" href="https://twitter.com/Weesh_io">Tweets by Weesh_io</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
                <div class="col-md-4">
                    <h4>Inscrivez-vous à la newsletter</h4>
                    <p>Renseignez votre adresse e-mail et nous vous tiendrons au courant des nouvelles fonctionnalités supportées, 
                    des nouveaux sites parcourus et des évolutions prévues.</p>
                    <?php echo $this->Form->create('NewsLetter', array( 'url' => array('controller' => 'contacts', 'action' => 'registerNewsLetter'), 'class' => 'form-inline',
                        'inputDefaults' => array('label' => false))); ?>
                        <div class="control-group">
                            <div class="input-append">
                                <?php
                                if (AuthComponent::user()['email']){
                                    echo $this->Form->input('email', array('default' => AuthComponent::user()['email'],'class' => 'col-md-8', 'placeholder' => 'Votre adresse email'));
                                } else {
                                    echo $this->Form->input('email', array('class' => 'col-md-8', 'placeholder' => 'Votre adresse email'));
                                } ?>
                                <button class="btn-sm btn-primary col-md-offset-1" type="submit">Go!</button>
                            </div>
                        </div>
                    <?php echo $this->Form->end(); ?>
                    </form>
                    <p style="margin-top:15px;">Cliquez sur "Contact" (en bas 
                    de la page) pour nous suggérer un nouveau site à supporter.</p>
                    <div class="alert alert-success hidden" id="newsletterSuccess"><strong>Success!</strong> You've been
                        added to our email list.
                    </div>
                    <div class="alert alert-error hidden" id="newsletterError"></div>
                    
                </div>
                <div class="col-md-4">
                    <div class="contact-details">
                        <h4>Nous contacter</h4>
                            <p style="margin:0;"><strong>Adresse : </strong>37, Quai de Grenelle 75015 Paris</p>
                            <p style="margin:0;"><strong>Téléphone : </strong>01 44 39 06 00</p>
                            <p style="margin:0;"></i> <strong>E-mail : </strong>weesh.io.contact@gmail.com</p>
                    </div>
                    <h4 style="margin-top:4%;">Nous suivre</h4>                  
                        <div class="col-md-11 row social-btns">
                            <ul class="social-icons list-inline">
                            <li>
                                <p><a class="btn facebook" href="https://www.facebook.com/Weesh.io/"><i class="fa fa-facebook"></i></a></p>
                            </li>
                            <li>
                                <a class="btn twitter" href="https://twitter.com/weesh_io"><i class="fa fa-twitter"></i></a>
                            </li>
                        </ul>         

                        </div>
                </div>
        </div>
        <div class="footer-copyright">
                    <div class="col-md-4 col-md-offset-4">
                            <ul class="list-inline">
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Plan du site</a></li>
                                <li><?php echo $this->Html->link('Contact', array('controller' => 'contacts', 'action' => 'index')); ?>
                                </li>
                            </ul>
                    </div>
                    <div class="col-md-4">
                        <p>© Copyright 2017 Weesh.io | All Rights Reserved.</p>
                    </div>
        </div>
    </footer>
    <!-- SCRIPT SECTION -->

    <!-- END SCRIPT SECTION -->
    <?php
    // Vendor
    echo $this->Html->script('../vendor/jquery/jquery-3.1.1.min');
    echo $this->Html->script('../vendor/jquery.appear/jquery.appear');
    echo $this->Html->script('../vendor/jquery.easing/jquery.easing');
    echo $this->Html->script('../vendor/jquery-cookie/jquery-cookie');
    echo $this->Html->script('../vendor/bootstrap-3.3.7-dist/js/bootstrap');
    echo $this->Html->script('../vendor/common/common');
    echo $this->Html->script('../vendor/jquery.validation/jquery.validation');
    echo $this->Html->script('../vendor/jquery.easy-pie-chart/jquery.easy-pie-chart');
    echo $this->Html->script('../vendor/jquery.gmap/jquery.gmap');
    echo $this->Html->script('../vendor/isotope/jquery.isotope');
    echo $this->Html->script('../vendor/magnific-popup/dist/jquery.magnific-popup');
    echo $this->Html->script('../vendor/vide/vide');

    // Head Lib
    echo $this->Html->script('../vendor/modernizr/modernizr.min');

    // Theme Base, Components and Settings
    echo $this->Html->script('theme');

    // Current Page Vendor and Views
    echo $this->Html->script('../vendor/rs-plugin/js/jquery.themepunch.tools.min');
    echo $this->Html->script('../vendor/rs-plugin/js/jquery.themepunch.revolution.min');
    echo $this->Html->script('../vendor/circle-flip-slideshow/js/jquery.flipshow');

    // Theme Custom
    echo $this->Html->script('custom');
    // Theme Initialization Files
    echo $this->Html->script('theme.init');
    ?>

    <!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-12345678-1', 'auto');
        ga('send', 'pageview');
    </script>
        -->
    <!-- END SECTION SCRIPT -->
    <?php echo $this->fetch('script'); ?>

    <?php /** DEBUG
     * echo $this->element('sql_dump'); ?>
     **/ ?>
</body>
</html>