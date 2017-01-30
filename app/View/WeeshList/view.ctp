<div id="content" class="content full">
    <div class="home-intro">
        <div class="container">
            <div class="row justify-content-md-center">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row center bloc">
        <p class="col-md-12">
        <h3><?php echo $weeshlist['WeeshList']['name'] ?></h3></p>
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
                foreach ($value as $item){
                    debug($item);
                ?>
            <tr>
                <td>
                    <?php $item['id'] ?>
                </td>
                <td>
                    <?php $item['product_id'] ?>
                </td>
                <td>
                    <?php $item['ean'] ?>
                </td>
                <td>
                    <?php $item['ibsn'] ?>
                </td>
                <td>
                    <?php $item['title'] ?>
                </td>
                <td>
                    <?php $item['description'] ?>
                </td>
                <td>
                    <?php $item['details'] ?>
                </td>
                <td>
                    <?php $item['image'] ?>
                </td>
                <td>
                    <?php $item['brand'] ?>
                </td>
                <td>
                    <?php $item['model'] ?>
                </td>
                <td>
                    <?php $item['original_price'] ?>
                </td>
                <td>
                    <?php $item['price'] ?>
                </td>
                <td>
                    <?php $item['sale_price'] ?>
                </td>
                <td>
                    <?php $item['tags'] ?>
                </td>
                <td>
                    <?php $item['visiblity'] ?>
                </td>
            </tr>
            <?php }} ?>
            </tbody>
        </table>
    </div>
</div>