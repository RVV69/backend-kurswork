<?php

$db = new PDO('mysql:host=localhost;dbname=cw-petguardians;charset=utf8', 'root', '');
$information = [];

if ($query = $db->query("SELECT * FROM pets")) {
    $information = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
    print_r($db->errorInfo());
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PetGuardians</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="/view/ChooseFriend/style.css" rel="stylesheet">
    <link href="/main-style.css" rel="stylesheet">
</head>

<body>
<header>
        <figure class="site-logo">
            <img class="logo-img" src="/main-page-photo/label.png" alt="site-logo">
        </figure>

        <div class="site-controls">
            <div class="main-menu-wrapper">
                <nav class="main-navigation">
                    <ul class="header-menu">
                        <li><a href="/view/Main/">Головна</a></li>
                        <li><a href="/view/ChooseFriend/">Хочу друга</a></li>
                        <li><a href="/view/HowHelp/">Хочу допомогти</a></li>
                        <li><a href="/view/InterestingInfo/">Про нас</a></li>
                        <li class="dropdown">
                            <a href="/model/Account-Login">Акаунт</a>
                            <ul class="dropdown-content">
                                <li><a href="/controllers/autorize/register.php">Реєстрація</a></li>
                                <li><a href="/model/Account-Login">Вхід</a></li>
                            </ul>
                        </li>
                    </ul>

                </nav>
                <button class="burger-toggle-btn">
                </button>
            </div>
        </div>

    </header>
    <main>
        <div class="hero-banner сhoose-friend-banner page-padding">
            <div class="main-text">
                <h1 class="title">Тут можна знайти свого чотирилапого друга</h1>
                <p class="text-title">У притулку знайдуться друзі будь-кому до душі – великі, маленькі, охоронці,
                    компаньйони, лінивці та непосидьки.</p>
            </div>
            <figure class="hero-image">
                <img src="/main-page-photo/cat-dog-hero-img.png" alt="hero-image">
            </figure>
        </div>

        <div class="seek-friend-wrapper page-padding">
            <h2 class="seek-friend-header">Знайди друга</h2>
            <div class="seek-friend-card-wrapper">
                <?php foreach ($information as $data) : ?>
                    <div class="cards-wrapper">
                        <div class="cards">
                            <img class="card-img" src="<?php echo $data['photoID']; ?>" alt="card-img">
                            <div class="card-content">
                                <h3><?php echo $data['name']; ?></h3>
                                <p>Стать: <?php echo $data['sex']; ?> <br>Вік: <?php echo $data['age']; ?></p>
                                
                                <button class="cards-button" data-id="<?php echo $data['id']; ?>">Переглянути</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <form id="hiddenForm" action="/view/PetCards/index.php" method="POST" style="display:none;">
            <input type="hidden" name="pet_id" id="hiddenInput">
        </form>

        <div class="rules-wrapper page-padding">
            <h2 class="text-align-center">Основні правила адопції</h2>
            <div class="rules-about">
                <img class="rules-about-photo" src="/main-page-photo/cat.jpg" alt="">
                <p class="rules-about-text">✓Тварини віддаються лише майбутнім
                    господарям<br>
                    ✓Всі Тварини віддаються як друзі та компаньйони для сімейного
                    життя<br>
                    ✓Всі Тварини віддаються на умовах Договору<br>
                    ✓Обов'язкова стерилізація за віком
                    <br> <br>
                    Для котів: <br>
                    ✓Наявність сіток на вікнах (антикот)<br>
                    ✓Якщо у вас є інші тварини будинку, вони повинні бути щеплені та
                    стерилізовані
                    <br> <br>
                    ❗Тварини НЕ віддаються на подарунок, як іграшки, родичам або
                    знайоми<br>
                    ❗Тварини НЕ віддаються на підприємства, на ланцюг, охорону,
                    полювання<br>
                    ❗Тварини НЕ віддаються особам молодше 21 року та старше 65-70
                    років<br>
                </p>
            </div>
            <h3 class="text-align-center">Більше інформації ви отримаєте, коли зв’яжетесь з нами!</h3>
        </div>
        </div>
    </main>

    <footer>
        <div class="footer-top-part page-padding">
            <div class="footer-logo-section">
                <div class="footer-logo-wrapper">
                    <img class="footer-logo-img" src="/main-page-photo/label.png" alt="">
                    <h3 class="footer-logo-heading">Піклуємося<br>
                        любимо<br>
                        даруємо радість!</h3>
                </div>
                <p class="footer-logo-label">PetGuardians - бережемо братів
                    наших менших!</p>
            </div>

            <div class="footer-links-wrapper">
                <nav class="footer-navigation">
                    <h4>Навігація</h4>
                    <ul class="footer-menu">
                        <li><a href="/view/Main/">Головна</a></li>
                        <li><a href="/view/ChooseFriend/">Хочу друга</a></li>
                        <li><a href="/view/HowHelp/">Хочу допомогти</a></li>
                        <li><a href="/view/InterestingInfo/">Про нас</a></li>
                    </ul>
            </div>

            <div class="follow-us-section">
                <h4>Зв’яжись з нами</h4>
                <div class="follow-us-links">
                    <a href="https://web.telegram.org/"><img class="follow-icon tg" src="/main-page-photo/telegram.png" alt=""></a>
                    <a href="https://www.facebook.com/"><img class="follow-icon fb" src="/main-page-photo/facebook.png" alt=""></a>
                    <a href="https://www.instagram.com/"><img class="follow-icon ig" src="/main-page-photo/social.png" alt=""></a>
                </div>
            </div>
        </div>

        <div class="footer-bootom-part page-padding">
            <p class="bottom-text site-info">©2024 ztu_edu_ua_kw</p>
            <a class="bottom-text email" href="mailto:pet.guardians.club@gmail.com">pet.guardians.club@gmail.com</a>
            <a class="bottom-text phone" href="tel:+380503378935">+380 50 337 89
                35</p>
        </div>
    </footer>

    <script src="/script.js"></script>


</body>

</html>