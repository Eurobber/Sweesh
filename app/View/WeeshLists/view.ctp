<div id="content" class="content full">
    <div class="home-intro">
        <div class="container">
            <div class="row justify-content-md-center">
            </div>
        </div>
    </div>
</div>
<?php debug($weeshlist); ?>
<div class="container">
    <div class="row center bloc">
        <p class="col-xs-12">
        <h3><?php echo $weeshlist['WeeshList']['name'] ?></h3></p>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>
                        Id
                    </th>
                    <th>
                        Url
                    </th>
                    <th>
                        Product_id
                    </th>
                    <th>
                        Ean
                    </th>
                    <th>
                        Ibsn
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Details
                    </th>
                    <th>
                        Image
                    </th>
                    <th>
                        Brand
                    </th>
                    <th>
                        Model
                    </th>
                    <th>
                        Original_price
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Sale_price
                    </th>
                    <th>
                        Tags
                    </th>
                    <th>
                        Visiblity
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($items as $value) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $value['id'] ?>
                        </td>
                        <th>
                            <?php echo $value['url'] ?>
                        </th>
                        <td>
                            <?php echo $value['product_id'] ?>
                        </td>
                        <td>
                            <?php echo $value['ean'] ?>
                        </td>
                        <td>
                            <?php echo $value['isbn'] ?>
                        </td>
                        <td>
                            <?php echo $value['title'] ?>
                        </td>
                        <td>
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
                            <?php echo $value['price'] ?>
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
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>