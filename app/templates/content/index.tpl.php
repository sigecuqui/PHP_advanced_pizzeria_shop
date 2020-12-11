<h1 class="header header--main"><?php print $data['title']; ?></h1>
<section class="product__section">

    <?php foreach ($data['products'] as $product) : ?>

        <div class="item">
            <img src="<?php print $product['image']; ?>" alt="image">
            <div>
                <h3><?php print $product['name']; ?></h3>
                <p><?php print $product['price']; ?> EUR</p>
            </div>
            <div>
                <?php print $product['order']; ?>
                <?php print $product['link']; ?>
                <?php print $product['delete']; ?>
            </div>
        </div>

    <?php endforeach; ?>
</section>

<?php print $data['redirect']; ?>
<?php print $data['discount']; ?>
