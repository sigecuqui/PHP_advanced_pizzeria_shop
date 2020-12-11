<h1 class="header header--main"><?php print $data['title']; ?></h1>
<section class="product__section">

    <?php foreach ($data['products'] as $product) : ?>

        <div class="item <?php print ($product['discount'] ?? false) ? 'price_discount' : ''; ?>">
            <img src="<?php print $product['image']; ?>" alt="image">
                <h3><?php print $product['name']; ?></h3>
                <?php if (isset($product['discount'])): ?>

                    <p class="price_first"><?php print $product['price_different']; ?></p>

                <?php endif; ?>
            <p><?php print $product['price']; ?></p>
            <div>
                <?php print ($product['order'] ?? false) ? $product['order'] : ''; ?>
                <?php print ($product['link'] ?? false) ? $product['link'] : ''; ?>
                <?php print ($product['delete'] ?? false) ? $product['delete'] : ''; ?>
            </div>
        </div>

    <?php endforeach; ?>
</section>

<?php print $data['buttons']['redirect']; ?>
<?php print $data['buttons']['add_discount']; ?>
