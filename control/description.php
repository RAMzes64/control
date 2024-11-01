<?php

if(isset($_GET['product_id'])){ $id = $_GET['product_id'];}

$menuItems = [
    ["title" => "Главная", "link" => "index.php"],
    ["title" => "Продукция", "link" => "market.php"],
    ["title" => "Контакты", "link" => "contact.php"],
    ["title" => "Корзина", "link" => "basket.php"]
];

define('DB_HOST', 'localhost'); //Адрес
define('DB_USER', 'root'); //Имя пользователя
define('DB_PASSWORD', ''); //Пароль
define('DB_NAME', 'control'); //Имя БД
$mysql = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    
if ($mysql->connect_error) {
    die("Ошибка подключения: " . $mysql->connect_error);
}

$result = mysqli_query($mysql, "SELECT * FROM pizza WHERE id =".$id);

if (!$result) {
    die("Ошибка выполнения запроса: " . mysqli_error($mysql));
}
$mysql->close();

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
        <?php foreach ($result as $item):?>
        <div class="product">
            <div class="filters__img">
                <img title="<?php echo $item['name'];?>" src="./<?php echo $item['img'];?>" width="400" height="400" />
            </div>
            <div class="product-details">
                <h4><?php echo $item['name'];?></h4>
                <p class="desc"><?php echo $item['description'];?></p>
                <form action="addToBasket.php" method="POST">
                    <input type="hidden" name="product_id" value="1">
                    <button type="submit">Добавить в корзину</button>
                </form>
            </div>
            <?php endforeach; ?>
        </div> 
        <section id="contact">
            <h2>Контакты</h2>
            <p>Вы можете связаться с нами по телефону: +7 (123) 456-78-90 или посетить наш магазин по адресу: ул. Пиццерийная, 10.</p>
        </section>
        
        <footer>
             2024 Магазин Пиццы. Все права защищены.
        </footer>        
    </body>
</html>