<?php
require_once 'db.php';

if (!isset($_GET['id'])) {
    echo "Липсва параметър 'id'.";
    exit;
}

$ac_id = (int)$_GET['id'];

// Подготвяме заявка
$stmt = mysqli_prepare($connection, 
    "SELECT id, name, brand, capacity, price, description, image_url 
     FROM air_conditioners 
     WHERE id = ?"
);
mysqli_stmt_bind_param($stmt, "i", $ac_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Взимаме ред
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "Няма намерен климатик с такова ID.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <title>Детайли за климатик</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="details-container">
    <h1><?php echo $row['name']; ?> (<?php echo $row['brand']; ?>)</h1>

    <!-- Секция за снимка (ако имате image_url) -->
    <?php if (!empty($row['image_url'])): ?>
    <div class="image-wrap">
        <img src="<?php echo $row['image_url']; ?>" 
             alt="Снимка на <?php echo $row['name']; ?>">
    </div>
    <?php endif; ?>

    <p><strong>Капацитет:</strong> <?php echo $row['capacity']; ?></p>
    <p><strong>Цена:</strong> <?php echo $row['price']; ?> лв.</p>
    <p><strong>Описание:</strong> <?php echo $row['description']; ?></p>

    <!-- Линк за връщане назад -->
    <a class="back-link" href="index.php">Обратно към списъка</a>
</div>

</body>
</html>
