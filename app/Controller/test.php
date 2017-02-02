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
            <h1>Votre panier de souhaits</h1> </p>
         <div style=" margin-bottom: 0px" class="list-group">
             <div class="container">
                 <div class="row">
                     <div class="col-md-2">
                         <div class="form-group">
                             <?php $i = 0; foreach ($weeshlist as $value) { $i++; ?>
                                 <a href="<?php echo $value['url'] ?>" target="_blank" class="list-group-item list-group-item-action  align-items-start hide_border">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">  <?php echo $value['title'] ?>
                            <div class="text-center">
                                <img src="<?php echo $value['image'] ?>" class="rounded mx-auto d-block"  width="100" height="100">
                            </div></h5> <b><?php echo $value['price'] ?></b> </div>
                    <p class="mb-1">
                                         <?php echo $value['description'] ?>
                                     </p>
                                 </a>
                         </div>
                     </div>
                     <div class="col-md-5 ">
                         <form class="btn btn-lg btn-primary btn-orange" data-toggle="modal" data-target="#<?php echo 'modalDetail'.$i?>">Plus d'informations</form>
                     </div>
                     <div class="col-md-4">
                         <?php echo $this->Form->create('Item', array('action' => 'moveToWeeshlist')); ?>
                             <?php echo $this->Form->input('item_id', array('type' => 'hidden', 'value' => $value['id'])); ?>
                                <?php echo $this->Form->input('old_weesh_list_id', array('type' => 'hidden', 'value' => $current_weeshlist_id)); ?>
                                <?php echo $this->Form->input('new_weesh_list_id', array('type' => 'select', 'options' => array($weeshlists_names))); ?>
                                <?php echo $this->Form->submit('Déplacer vers un autre weeshlist', array('class' => 'btn btn-lg btn-primary btn-orange')); ?>
                                <?php echo $this->Form->end(); ?>
                            </div>
                            <div class="col-md-4" style="float: right; margin-top:3%;">
                                <?php echo $this->Form->create('Item', array('action' => 'removeFromWeeshlist')); ?>
                                <?php echo $this->Form->input('item_id', array('type' => 'hidden', 'value' => $value['id'])); ?>
                                <?php echo $this->Form->input('weesh_list_id', array('type' => 'hidden', 'value' => $current_weeshlist_id)); ?>
                                <?php echo $this->Form->submit('Supprimer de la weeshlist', array('class' => 'btn btn-lg btn-primary btn-orange')); ?>
                                <?php echo $this->Form->end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php
    $i = 0;
    $j = -1;
    foreach ($weeshlist as $value) { $i++;
                                    $j++;
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
                    <?php if($value['description'] != null) { ?>
                    <p> Description:
                        <?php echo $value['description'] ?>
                    </p>
                    <?php } if($value['brand'] != null) { ?>
                    <p> Marque:
                        <?php echo $value['brand'] ?>
                    </p>
                    <?php } if($value['model'] != null) { ?>
                    <p> Modèle:
                        <?php echo $value['model'] ?>
                    </p>
                    <?php } ?>
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
                    <h4 class="modal-title center">Autres fournisseurs</h4> </div>
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
                            
                            <?php 
        
                                $x = 0;
                                
                                foreach ($comparator[$j] as $arrayValue) { $x++;
                                    
                            ?>
                        <tr>
                            <td> <a href="<?php  ?>" target="_blank">
                                    <?php echo $arrayValue['ItemInstance']['seller']; ?>
                                </a> </td>
                            <td>
                                <a href="<?php  ?>" target="_blank">
                                    <?php echo $arrayValue['ItemInstance']['price']; ?> </a>
                            </td>
                            <td> <a href="<?php  ?>" target="_blank"><i class=" fa fa-leaf icon" aria-hidden="true "></i></a></td>
                        </tr>
                           <?php
                                // }                               
                                } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    
    }  ?>
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