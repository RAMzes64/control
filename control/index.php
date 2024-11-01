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
    <link rel="stylesheet" href="./styles/indexStyle.css">
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
        <section id="about">
            <h2>О нас</h2>
            <p>Мы - лучший магазин пиццы в городе! Наша команда готовит пиццу с любовью и заботой о каждом клиенте. Мы используем только свежие ингредиенты и традиционные рецепты, чтобы предложить вам невероятный вкус.</p>
        </section>
        
        <section id="products">
            <h2>Наша продукция</h2>
            <p>Пицца — это не просто еда, это целая культура, которая имеет свои корни в Италии. Первые упоминания о подобном блюде относятся к древним временам, когда на лепешки из теста выкладывали различные ингредиенты. Современная пицца, как мы ее знаем, появилась в Неаполе в XVIII веке.</p>        
        </section>
        
        <section id="contact">
            <h2>Контакты</h2>
            <p>Вы можете связаться с нами по телефону: +7 (123) 456-78-90 или посетить наш магазин по адресу: ул. Пиццерийная, 10.</p>
        </section>
        
        <footer>
            &copy; 2024 Магазин Пиццы. Все права защищены.
        </footer>
        
        </body>
        </html>