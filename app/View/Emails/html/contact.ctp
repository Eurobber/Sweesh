<?php echo "Nous avons bien reçu votre demande pour :<br><br>Nom du site :" . h($site_name) . "<br><br>"?>
<?php if($site_url){ echo 'Url du site : ' . (h($site_url)) . '<br><br>'; }?>
<?php if($email){ echo 'Votre email : ' . (h($email)) . '<br><br>'; }?>
<?php if($message){ echo 'Votre message : ' .  nl2br(h($message)) . '<br><br>'; }?>
<?php echo "Nous allons l'ajouter dans les plus bref délais.<br>Nous vous tiendrons informé." ?>