<?php
    $title = "Jacket Shop";
    include "../templates/header.php";

    require_once '../data/db_connection.php';

    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
?>

<main id="shop">
    <h2>Jackets For Everyone</h2>
    <ul id="products">
        <?php if ($result->num_rows > 0):            
            foreach ($result as $product): ?>
                <article class="product">
                    <a href="../public/product/<?= $product['id'] ?>">
                        <img src="../public/images/<?= $product['image'] ?>" alt="<?= $product['title'] ?>">
                        <div class="product-content">
                            <h3><?= $product['title'] ?></h3>
                            <p class="product-price"><?= $product['price'] ?>€</p>
                        </div>
                    </a>
                </article>
            <?php endforeach;
        else:
            echo "No products found.";
        endif;?>
    </ul>
</main>

<?php
include "../templates/footer.php";
?>