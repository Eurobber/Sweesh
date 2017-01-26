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
    echo $this->Html->meta('icon'); ?>

    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <?php echo $this->fetch('meta'); ?>

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" type="text/css">
    <!-- STYLESHEET SECTION -->
    <?php
    //Libs CSS
    echo $this->Html->css('../vendor/bootstrap-3.3.7-dist/css/bootstrap');
    echo $this->Html->css('../vendor/font-awesome-4.7.0/css/font-awesome');
    echo $this->Html->css('../vendor/animate/animate');
    echo $this->Html->css('../vendor/magnific-popup/dist/magnific-popup');

    //Theme CSS
    echo $this->Html->css('theme');
    echo $this->Html->css('theme-blog');
    echo $this->Html->css('theme-elements');
    echo $this->Html->css('theme-shop');

    //Current Page CSS
    echo $this->Html->css('../vendor/rs-plugin/css/settings');
    echo $this->Html->css('../vendor/rs-plugin/css/layers');
    echo $this->Html->css('../vendor/rs-plugin/css/navigation');
    echo $this->Html->css('../vendor/circle-flip-slideshow/css/component');

    //Skin css
    echo $this->Html->css('default');
    //Skin Weesh
    echo $this->Html->css('color');
    //Theme custom CSS
    echo $this->Html->css('custom');
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
                            echo $this->Html->image("logo.png", array(
                                "alt" => "Logo",
                                'class' => "logo",
                                'url' => array('controller' => 'sweesh', 'action' => 'index')
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
                                                    echo $this->Html->link('Mes Produits', array('controller' => 'sweesh', 'action' => 'myProducts'), array('class' => 'purple'));
                                                endif; ?>
                                            </li>
                                            <li><?php if (AuthComponent::user()):
                                                    // Logged in, show the my products link
                                                    echo $this->Html->link('Mes Listes', array('controller' => 'sweesh', 'action' => 'myLists'), array('class' => 'purple'));
                                                endif; ?>
                                            </li>
                                            <li><?php if (AuthComponent::user()):
                                                    // Logged in, show the parameters link
                                                    echo $this->Html->link('Paramètres', array('controller' => 'sweesh', 'action' => 'parameters'));
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
                <div class="footer-ribon"><span>Get in Touch</span></div>
                <div class="col-md-3">
                    <h4>Newsletter</h4>
                    <p>Keep up on our always evolving product features and technology. Enter your e-mail and subscribe
                        to our newsletter.</p>
                    <div class="alert alert-success hidden" id="newsletterSuccess"><strong>Success!</strong> You've been
                        added to our email list.
                    </div>
                    <div class="alert alert-error hidden" id="newsletterError"></div>
                    <form class="form-inline" id="newsletterForm" action="#" method="POST">
                        <div class="control-group">
                            <div class="input-append">
                                <input class="col-md-2" placeholder="Email Address" name="email" id="email" type="text">
                                <button class="btn" type="submit">Go!</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <h4>Latest Tweet</h4>
                    <div id="tweet" class="twitter">
                        <p>Please wait...</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-details">
                        <h4>Contact Us</h4>
                        <ul class="contact">
                            <li>
                                <p><i class="icon-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City
                                    Name, United
                                    States</p>
                            </li>
                            <li>
                                <p><i class="icon-phone"></i> <strong>Phone:</strong> (123) 456-7890</p>
                            </li>
                            <li>
                                <p><i class="icon-envelope"></i> <strong>Email:</strong> <a
                                            href="mailto:mail@example.com">mail@example.com</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <h4>Follow Us</h4>
                    <div class="social-icons">
                        <ul class="social-icons">
                            <li class="facebook"><a href="http://www.facebook.com/" target="_blank"
                                                    data-placement="bottom" rel="tooltip" title="Facebook">Facebook</a>
                            </li>
                            <li class="twitter"><a href="https://twitter.com/weesh_io" target="_blank"
                                                   data-placement="bottom" rel="tooltip" title="Twitter">Twitter</a>
                            </li>
                            <li class="linkedin"><a href="http://www.linkedin.com/" target="_blank"
                                                    data-placement="bottom" rel="tooltip" title="Linkedin">Linkedin</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-1">
                        <?php
                        echo $this->Html->image("logo.png", array(
                            "alt" => "Logo",
                            'class' => "logo",
                            'url' => array('controller' => 'sweesh', 'action' => 'index')
                        ));
                        ?>
                    </div>
                    <div class="col-md-7">
                        <p>© Copyright 2017 by Weesh. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-4">
                        <nav id="sub-menu">
                            <ul>
                                <li><a href="page-faq.html">FAQ's</a></li>
                                <li><a href="sitemap.html">Sitemap</a></li>
                                <li><a href="contact-us.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
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
