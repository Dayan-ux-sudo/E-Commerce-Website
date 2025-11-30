<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to Our Store!</h1>
            <p class="lead">Discover amazing products at great prices.</p>
            <a class="btn btn-primary btn-lg" href="products.php" role="button">Shop Now</a>
        </div>
    </div>
</div>

<h2>Featured Products</h2>
<div class="row">
    <?php
    $stmt = $pdo->query("SELECT * FROM products LIMIT 4");
    while ($product = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <div class="col-md-3 mb-4">
        <div class="card">
            <img src="assets/images/<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $product['name']; ?></h5>
                <p class="card-text">$<?php echo $product['price']; ?></p>
                <a href="product-detail.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">View Details</a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<?php include 'includes/footer.php'; ?>