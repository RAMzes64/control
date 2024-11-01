<?php
$menuItems = [
    ["title" => "Главная", "link" => "index.php"],
    ["title" => "Продукция", "link" => "market.php"],
    ["title" => "Контакты", "link" => "contact.php"],
    ["title" => "Корзина", "link" => "basket.php"]
];

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./styles/descStyle.css">
    <title>Simple web page Template</title>
</head>
    <body>
        <nav class = "navbar">
            <ul class = "navList">
                <?php foreach ($menuItems as $item): ?>
                <li><a href="<?php echo $item['link']; ?>"><?php echo $item['title']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <?php 
        if (empty($_GET['list'])) {
            echo "<h2>Ваша корзина пуста</h2>";
        } else {
            echo "<table>";
            echo "<tr><th>Товар ID</th><th>Количество</th><th>Удалить</th></tr>";

            foreach ($_GET['list'] as $id => $quantity) {
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$quantity</td>";
                echo "<td><a href='remove.php?id=$id'>Удалить</a></td>"; // Файл для удаления товара
                echo "</tr>";
            }
            echo "</table>";
        }?>
        <section id="contact">
            <h2>Контакты</h2>
            <p>Вы можете связаться с нами по телефону: +7 (123) 456-78-90 или посетить наш магазин по адресу: ул. Пиццерийная, 10.</p>
        </section>
        
        <footer>
             2024 Магазин Пиццы. Все права защищены.
        </footer>        
    </body>
</html>