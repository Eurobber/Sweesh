<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>

<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('additional');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
	<body class="custom-back">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">

        <div class="navbar-header">
          <a class="navbar-brand" href="#"><span style="color:#00aaff;">s</span><span style="color:white;">W</span><span style="color:#ff4433;">eesh</span></a>
        </div>

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          	<li> <?php 	if (AuthComponent::user()):
  						// The user is logged in, show the logout link
  							echo $this->Html->link('Bienvenue '.AuthComponent::user()['firstname'].' '.AuthComponent::user()['lastname'], array('controller' => 'sweesh', 'action' => 'account'));
						endif;?></span></li>
            <li><?php 	if (AuthComponent::user()):
  						// The user is logged in, show the logout link
  							echo $this->Html->link('Tableau de Bord', array('controller' => 'sweesh', 'action' => 'overview'));
						endif;?></span></li>
            <li><?php 	if (AuthComponent::user()):
  						// The user is logged in, show the logout link
  							echo $this->Html->link('Paramètres', array('controller' => 'sweesh', 'action' => 'parameters'));
						endif;?></span></li>
            <li><?php 	echo $this->Html->link('À Propos', array('controller' => 'sweesh', 'action' => 'about'));?></li>
            <li> <?php 	if (!AuthComponent::user()):
  						// The user is logged in, show the logout link
  							echo $this->Html->link('Inscription', array('controller' => 'users', 'action' => 'signup'));
						endif;?></span></li>
            <li><?php 	if (AuthComponent::user()):
  						// The user is logged in, show the logout link
  							echo $this->Html->link('Déconnexion', array('controller' => 'users', 'action' => 'logout'));
						else:
  						// The user is not logged in, show login link
  							echo $this->Html->link('Connexion', array('controller' => 'users', 'action' => 'login'));
						endif;?></li>
          </ul>
          <form class="navbar-form navbar-left">
            <input type="text" class="form-control" placeholder="Nom de produit, ISBN, ...">
          </form>
        </div>

      </div>
</nav>

<?php /** CONTENU DE LA PAGE STATIQUE PROPRE A CHAQUE PAGE **/?>

<div id="content">
			<?php echo $this->Flash->render(); ?>
			<?php echo $this->fetch('content'); ?>
</div>

<?php /** FOOTER DE CHAQUE PAGE **/?>

<?php /**echo $this->element('sql_dump'); ?>**/?>