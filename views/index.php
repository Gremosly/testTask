<!DOCTYPE html>
<html>
<head>
	<title>Test Task</title>
	<link rel="stylesheet" type="text/css" href="../views/style.css">
	<meta charset="UTF-8">
</head>
<body>

<?php foreach ($productList as $productItem): ?>
	<div class="product_item">
		<p>Название : <?php echo $productItem['productName']; ?></p>
		<p>Цена : <?php echo products::checkPriceByProductId($productItem['productId']); ?></p>
		<p>Описание : <?php echo $productItem['description']; ?></p>
	</div>
<?php endforeach ?>

<p1><?php echo date('Y-m-d'); ?></p1>

</body>
</html>