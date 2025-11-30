<?php include 'includes/config.php'; ?>

<?php
if (!isset($_GET['id'])) {
    redirect('products.php');
}

$product_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$product_id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    redirect('products.php');
}
?>

<?php include 'includes/header.php'; ?>

<div class="row">
    <div class="col-md-6">
        <img src="assets/images/<?php echo $product['image']; ?>" class="img-fluid" alt="<?php echo $product['name']; ?>">
    </div>
    <div class="col-md-6">
        <h2><?php echo $product['name']; ?></h2>
        <p class="h4 text-primary">$<?php echo $product['price']; ?></p>
        <p><?php echo $product['description']; ?></p>
        <p><strong>Stock: </strong><?php echo $product['stock']; ?> available</p>
        
        <?php if(is_logged_in()): ?>
            <form action="cart.php" method="POST" class="mt-3">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" max="<?php echo $product['stock']; ?>" class="form-control" style="width: 100px;">
                </div>
                <button type="submit" name="add_to_cart" class="btn btn-primary btn-lg">Add to Cart</button>
            </form>
        <?php else: ?>
            <a href="login.php" class="btn btn-primary">Login to Purchase</a>
        <?php endif; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>