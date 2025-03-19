<?php
// index.php
require_once 'db.php';

$query = "SELECT id, name, brand, capacity, price FROM air_conditioners";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Грешка в заявката: " . mysqli_error($connection));
}
?>
<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <title>Списък с климатици</title>
    <!-- Линк към CSS файл (ако е style.css в същата папка) -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Климатици</h1>
    
    <!-- Вместо <ul> може да ползвате <div>, тъй като ще направим бутон-стил -->
    <div class="ac-list">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <a 
                class="ac-button" 
                href="details.php?id=<?php echo $row['id']; ?>"
            >
                <!-- Име и бранд -->
                <?php echo $row['name'] . " - " . $row['brand']; ?>
                <span class="ac-info">
                    (<?php echo $row['capacity']; ?> / <?php echo $row['price']; ?> лв.)
                </span>
            </a>
        <?php endwhile; ?>
    </div>

</body>
</html>

