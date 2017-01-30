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
            <h3> BONJOUR</h3> </p>
        <div class="list-group">
            <?php
                foreach ($items as $value) {
                    ?>
                <a href="<?php echo $value['url'] ?>" target="_blank" class="list-group-item list-group-item-action flex-column align-items-start ">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">  <?php echo $value['title'] ?></h5> <small><?php echo $value['price'] ?>€</small> </div>
                    <p class="mb-1">
                        <?php echo $value['description'] ?>
                    </p>
                    <div class="form-group">
                        <div class="col-sm-2" style=" margin-top:5%;">
                            <?php echo $this->Form->submit("Plus d'informations", array('class' => 'btn btn-lg btn-primary btn-orange', 'controller' => 'weesh', 'action' => 'overview')) ?>
                        </div>
                        <div class="col-sm-2 pull-right" style="padding-right:200px; margin-top:5%;">
                            <?php echo $this->Form->submit('Ajouter à une wishlist', array('class' => 'btn btn-lg btn-primary btn-orange', 'controller' => 'weesh', 'action' => 'overview')) ?>
                        </div>
                    </div>
                </a>
                <?php } ?>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
        </div>
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