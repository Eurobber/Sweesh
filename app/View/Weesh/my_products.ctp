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
                foreach ($items as $value) {
                    ?>
                <a href="<?php echo $value['url'] ?>" target="_blank" class="list-group-item list-group-item-action flex-column align-items-start ">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">  <?php echo $value['title'] ?> 
                <div class="text-center">
                      <img src="<?php echo $value['image'] ?>" class="rounded mx-auto d-block"  width="150" height="150">
                 </div></h5> <small><?php echo $value['price'] ?>€</small> </div>
                    <p class="mb-1">
                        <?php echo $value['description'] ?>
                    </p>
                </a>
                <div class="form-group">
                    <div class="col-sm-2" style=" margin-top:5%;">
                        <form class="btn btn-lg btn-primary btn-orange" data-toggle="modal" data-target="#myModal">Plus d'informations</form>
                    </div>
                    <div class="col-sm-2 pull-right" style="padding-right:200px; margin-top:5%;">
                        <?php echo $this->Form->submit('Ajouter à une wishlist', array('class' => 'btn btn-lg btn-primary btn-orange', 'controller' => 'weesh', 'action' => 'overview')) ?>
                    </div>
                </div>
                <?php } ?>
        </div>
    </div>
    <?php
                foreach ($items as $value) { echo $value
                    ?>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title center" id="myModalLabel">Détails sur votre produit</h4> </div>
                    <div class="modal-body">
                        <div class="text-center"> <img src="<?php echo $value['image'] ?>" class="rounded mx-auto d-block" width="150" height="150">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">  <?php echo $value['title'] ?> <div class="portfolio-item">
                
                    </div></h5> <small><?php echo $value['price'] ?>€</small> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }  ?>
            <!--        <td>
                            <?php echo $value['description'] ?>
                        </td>
                        <td>
                            <?php echo $value['details'] ?>
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
                            <?php echo $value['original_price'] ?>
                        </td>
                        <td>
                            <?php echo $value['sale_price'] ?>
                        </td>
                        <td>
                            <?php echo $value['tags'] ?>
                        </td>
                        <td>
                            <?php echo $value['visibility'] ?>
                        </td>
                        </tr>-->