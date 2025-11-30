<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<h2>All Products</h2>
<div class="row">
    <?php
    $stmt = $pdo->query("SELECT * FROM products");
    while ($product = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <div class="col-md-4 mb-4">
        <div class="card">
            <img src="assets/images/<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $product['name']; ?></h5>
                <p class="card-text">$<?php echo $product['price']; ?></p>
                <p class="card-text"><?php echo substr($product['description'], 0, 100); ?>...</p>
                <a href="product-detail.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">View Details</a>
                <?php if(is_logged_in()): ?>
                    <a href="cart.php?action=add&id=<?php echo $product['id']; ?>" class="btn btn-success">Add to Cart</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<?php include 'includes/footer.php'; ?>