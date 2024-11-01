<?php
$menuItems = [
    ["title" => "Главная", "link" => "index.php"],
    ["title" => "Продукция", "link" => "market.php"],
    ["title" => "Контакты", "link" => "contact.php"]
];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/styles/indexStyle.css">
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
        <p>Вы можете связаться с нами по телефону: +7 (123) 456-78-90 или посетить наш магазин по адресу: ул. Пиццерийная, 10.</p>
        <footer>
            &copy; 2024 Магазин Пиццы. Все права защищены.
        </footer>        
    </body>
</html>