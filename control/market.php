<?php
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

$result = mysqli_query($mysql, "SELECT * FROM pizza");

if (!$result) {
    die("Ошибка выполнения запроса: " . mysqli_error($mysql));
}
$mysql->close();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./styles/marketStyle.css">
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
            <table class="styled-table">
            
            <?php
                while($name = mysqli_fetch_assoc($result)){
            ?>
                <tr>
                <td class="filters__img">
                    <img title="<?php echo $name['name'];?>" src="./<?php echo $name['img'];?>" width="400" height="400" />
                </td>
                <td>
                    <h4><?php echo $name['name'];?></h4>
                    <p class = "desc"><?php echo $name['description'];?></p>
                        <form action="description.php" method="GET">
                            <input type="hidden" name="product_id" value="<?php echo $name['id']?>">
                            <button type="submit">Подробнее</button>
                        </form>
                        <form action="addToBasket.php" method="GET">
                            <input type="hidden" name="id" value="<?php echo $name['id']?>">
                            <button type="submit">Добавить в корзину</button>
                        </form>
                    </td>
                </tr>    
                <?php } ?>
            </table>

        <section id="contact">
            <h2>Контакты</h2>
            <p>Вы можете связаться с нами по телефону: +7 (123) 456-78-90 или посетить наш магазин по адресу: ул. Пиццерийная, 10.</p>
        </section>
        
        <footer>
            &copy; 2024 Магазин Пиццы. Все права защищены.
        </footer>
        
        </body>
        </html>