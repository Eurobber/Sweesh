<div id="content" class="content full">
    <div class="home-intro">
        <div class="container">
            <div class="row justify-content-md-center"> </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row center bloc">
        <p class="col-xs-12">
            <h3>Vos produits</h3> </p>
        <div class="list-group">
            <?php
    $i = 0;
                foreach ($items as $value) { $i++;
                    ?>
                <a href="<?php echo $value['url'] ?>" target="_blank" class="list-group-item list-group-item-action flex-column align-items-start ">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">  <?php echo $value['title'] ?> 
                <div class="text-center">
                      <img src="<?php echo $value['image'] ?>" class="rounded mx-auto d-block"  width="150" height="150">
                 </div></h5> <b><?php echo $value['price'] ?>€</b> </div>
                    <p class="mb-1">
                        <?php echo $value['description'] ?>
                    </p>
                </a>
                <div class="container">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-4" style=" float:left; margin-top:3%;">
                                <form class="btn btn-lg btn-primary btn-orange" data-toggle="modal" data-target="#<?php echo 'modalDetail'.$i?>">Plus d'informations</form>
                            </div>
                            <div class="col-md-4" style="float: right;  margin-top:3%;">
                                <?php echo $this->Form->submit('Ajouter à une wishlist', array('class' => 'btn btn-lg btn-primary btn-orange', 'controller' => 'weesh', 'action' => 'overview')) ?>
                            </div>
                            <div class="col-md-4 " style=" display: inline-block; margin-top:3%;">
                                <form class="btn btn-lg btn-primary btn-orange" data-toggle="modal" data-target="#<?php echo 'modalComparator'.$i?>">Autres fournisseurs (6)</form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
        </div>
    </div>
    <?php
    $i = 0;
                foreach ($items as $value) { $i++;
                    ?>
        <!-- Modal détails -->
        <div class="modal fade" id="<?php echo 'modalDetail'.$i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title center" id="myModalLabel">Détails sur votre produit</h4> </div>
                    <div class="modal-body">
                        <div class="text-center"> <img src="<?php echo $value['image'] ?>" class="rounded mx-auto d-block" width="150" height="150">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">  <?php echo $value['title'] ?></h5> <b>Prix: <?php echo $value['price'] ?>€</b> </div>
                        </div>
                        <hr>
                        <p> Description:
                            <?php echo $value['description'] ?>
                        </p>
                        <p> Marque:
                            <?php echo $value['brand'] ?>
                        </p>
                        <p> Modèle:
                            <?php echo $value['model'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal comparator -->
        <div class="modal fade" id="<?php echo 'modalComparator'.$i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title center">Autre fournisseur</h4> </div>
                    <div class="modal-body">
                        <div class="text-center"> <img src="<?php echo $value['image'] ?>" class="rounded mx-auto d-block" width="150" height="150">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">  <?php echo $value['title'] ?></h5> <b>Meilleur prix: <?php echo $value['price'] ?>€</b> </div>
                        </div>
                        <table href="<?php echo $value['url'] ?>" class="table  table-responsive table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>Fournisseurs</th>
                                    <th>Prix</th>
                                    <th>Note écologique</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <a href="<?php echo $value['url'] ?>" target="_blank">
                                            Amazon
                                        </a> </td>
                                    <td>
                                        <a href="<?php echo $value['url'] ?>" target="_blank">
                                            <?php echo $value['price'] ?>€ </a>
                                    </td>
                                    <td> <a href="<?php echo $value['url'] ?>" target="_blank"><i class=" fa fa-leaf icon" aria-hidden="true "></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php }  ?>
    <!-- A enlever en version finale       <td>
                            <?php echo $value['description'] ?>
                        </td>
                       
                        <td>
                            <?php echo $value['image'] ?>
                        </td>
                        <td>
                            <?php echo $value['brand'] ?>
                        </td>
                        <td>
                            <?php echo $value['model'] ?>
                        </td>
                  
                        <td>
                            <?php echo $value['tags'] ?>
                        </td>
                        <td>
                            <?php echo $value['visibility'] ?>
                        </td>
                        </tr>-->