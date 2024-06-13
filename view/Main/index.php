<?php

$db = new PDO('mysql:host=localhost;dbname=cw-petguardians;charset=utf8', 'root', '');
$newsinfo = [];
$petsinfo = [];

if ($query = $db->query("SELECT * FROM pets")) {
    $petsinfo = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
    print_r($db->errorInfo());
}

if ($query = $db->query("SELECT * FROM news")) {
    $newsinfo = $query->fetchAll(PDO::FETCH_ASSOC);
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
    <link href="/view/Main/style.css" rel="stylesheet">
    <link href="/main-style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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

    <main class="boxed-width">
        <div class="hero-banner cat-dog-photo page-padding">
            <div class="main-text">
                <h1 class="title">PetGuardians</h1>
                <p class="text-title">Ми — команда ентузіастів, які віддані
                    місії допомогти бездомним тваринам знайти свій дім.
                    Тут ви знайдете не лише пухнастого друга, а
                    й можливість змінити життя на краще.</p>
                <button class="main-button">Знайти друга</button>
            </div>
            <figure class="hero-image">
                <img src="/main-page-photo/CatDog.png" alt="hero-image">
            </figure>
        </div>

        <div class="carousell-wrapper page-padding">
            <div class="swiper carousel-js">
                <div class="swiper-wrapper">
                    <div class="swiper-slide animal-teaser black-cat-skin">
                        <img class="our-pets-back" src="/main-page-photo/2017Animals___Cats_Two_cute_little_kitten_112429_.jpg" alt="">
                    </div>
                    <div class="swiper-slide animal-teaser black-cat-skin">
                        <div class="swiper-slide animal-teaser black-cat-skin">
                            <img class="our-pets-back" src="/main-page-photo/Rww.jpg" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide animal-teaser black-cat-skin">
                        <img class="our-pets-back" src="/main-page-photo/R (2).jpg" alt="">
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <div class="animal-teaser tiger-skin">
            <figure class="teaser-ears">
                <div class="ear left-ear"></div>
                <h2 class="teaser-header">Ми піклуємося</h2>
                <div class="ear right-ear"></div>
            </figure>
            <div class="teaser-content page-padding">
                <figure class="teaser-image-wrapper">
                    <img class="our-pets-back" src="/main-page-photo/dog-and-cat.png" alt="">
                </figure>
                <div class="teaser-main-text">
                    <h2>Ми піклуємося</h2>
                    <p>
                        Звір ятка, які шукають свій дім - особливі маленькі
                        друзі, які залишають
                        незабутні враження в серці кожного, хто їх зустрічає.
                        <br><br>
                        У нашому притулку ми надаємо теплу, безпечну обійму для
                        кожного звірятка, поки
                        вони не знайдуть свою постійну родину. Наші тваринки -
                        це не лише безумовна
                        любов і вірність, але й неперевершені компаньйони на
                        кожен день.
                        <br><br>
                        Чи шукаєте ви милого котика? Або можливо вам потрібен
                        вірний песик? Незалежно
                        від вашого вибору, ми впевнені, що в нашому притулку ви
                        зможете обрати та
                        подарувати любов саме тій тваринці, яка буде ідеальним
                        компаньйоном для вас.
                    </p>
                </div>
            </div>
            <button class="our-pets-button">Про притулок</button>
        </div>

        <div class="animal-teaser dog-1-skin">
            <figure class="teaser-ears">
                <div class="ear left-ear"></div>
                <h2 class="teaser-header">Допоможіть тваринкам</h2>
                <div class="ear right-ear"></div>
            </figure>
            <div class="teaser-content page-padding">
                <div class="teaser-main-text">
                    <h2>Обери суму внеску</h2>
                    <div class="buttons-wrapper">
                        <button class="donate-btn">100 UAH</button>
                        <button class="donate-btn">100 UAH</button>
                        <button class="donate-btn">100 UAH</button>

                        <button class="donate-btn">100 UAH</button>
                        <button class="donate-btn">100 UAH</button>
                        <button class="donate-btn">100 UAH</button>
                    </div>
                </div>
                <button class="help-our-pets-button">Внести</button>
                <p class="gray-note">порадуй маленького хвостика</p>
            </div>
        </div>

        <div class="seek-friend-wrapper page-padding">
            <h2 class="seek-friend-header">Знайди друга</h2>
            <div class="seek-friend-card-wrapper">
                <?php foreach ($petsinfo as $data) : ?>
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

        <div class="news-wrapper page-padding">
            <div class="swiper carousel-js">
                <div class="swiper-wrapper">
                    <div class="swiper-slide animal-teaser black-cat-skin">
                        <figure class="teaser-ears">
                            <div class="ear left-ear"></div>
                            <h2 class="teaser-header">Новини притулку</h2>
                            <div class="ear right-ear"></div>
                        </figure>
                        <div class="teaser-content page-padding">
                            <figure class="teaser-image-wrapper">
                                <img class="our-pets-back" src=" <?php echo $newsinfo[0]['photoID']; ?>" alt="">
                            </figure>
                            <div class="teaser-main-content">
                                <div class="teaser-news-text">
                                    <h2><?php echo $newsinfo[0]['theme']; ?> <span class="new-date"><?php echo $newsinfo[0]['date']; ?></span></h2>
                                    <p>
                                        <?php echo $newsinfo[0]['shortInfo']; ?>
                                    </p>
                                </div>
                                <a href="/view/News/"><button class="cta-button"></button></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide animal-teaser black-cat-skin">
                        <figure class="teaser-ears">
                            <div class="ear left-ear"></div>
                            <h2 class="teaser-header">Новини притулку</h2>
                            <div class="ear right-ear"></div>
                        </figure>
                        <div class="teaser-content page-padding">
                            <figure class="teaser-image-wrapper">
                                <img class="our-pets-back" src=" <?php echo $newsinfo[1]['photoID']; ?>" alt="">
                            </figure>
                            <div class="teaser-main-content">
                                <div class="teaser-news-text">
                                    <h2><?php echo $newsinfo[1]['theme']; ?> <span class="new-date"><?php echo $newsinfo[1]['date']; ?></span></h2>
                                    <p>
                                        <?php echo $newsinfo[1]['shortInfo']; ?>
                                    </p>
                                </div>
                                <a href="/view/News/"><button class="cta-button"></button></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide animal-teaser black-cat-skin">
                        <figure class="teaser-ears">
                            <div class="ear left-ear"></div>
                            <h2 class="teaser-header">Новини притулку</h2>
                            <div class="ear right-ear"></div>
                        </figure>
                        <div class="teaser-content page-padding">
                            <figure class="teaser-image-wrapper">
                                <img class="our-pets-back" src=" <?php echo $newsinfo[2]['photoID']; ?>" alt="">
                            </figure>
                            <div class="teaser-main-content">
                                <div class="teaser-news-text">
                                    <h2><?php echo $newsinfo[2]['theme']; ?> <span class="new-date"><?php echo $newsinfo[2]['date']; ?></span></h2>
                                    <p>
                                        <?php echo $newsinfo[2]['shortInfo']; ?>
                                    </p>
                                </div>
                                <a href="/view/News/"> <button class="cta-button"></button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

        <div class="contact-us-wrapper">
            <div class="contact-us-back-wrapper page-padding">
                <h1 class="text-align-center">Контакти</h1>
                <div class="contact-us-back">
                    <div class="animal-teaser dog-2-skin">
                        <figure class="teaser-ears">
                            <div class="ear left-ear"></div>
                            <div class="ear right-ear"></div>
                        </figure>
                        <div class="teaser-content">
                            <div class="teaser-main-content">
                                <div class="teaser-news-text">
                                    <p class="text-align-center">Контакти<br><br></p>
                                    <p>+380 50 337 89 35<br>
                                        pet.guardians.club@gmail.com</p>
                                    <p class="text-align-center"><br>Наші соціальні мережі<br></p>
                                    <div class="follow-us-links">
                                        <a href="https://web.telegram.org/"><img class="follow-icon tg" src="/main-page-photo/telegram.png" alt=""></a>
                                        <a href="https://www.facebook.com/"><img class="follow-icon fb" src="/main-page-photo/facebook.png" alt=""></a>
                                        <a href="https://www.instagram.com/"><img class="follow-icon ig" src="/main-page-photo/social.png" alt=""></a>
                                    </div>
                                    <p class="text-align-center"><br>Адреса<br><br></p>
                                    <p>вул. Волі 145, проспект Влади, офіс № 15</p>
                                </div>
                                <a href="https://www.bing.com/maps?osid=dda06dda-e2b9-4e52-9a8b-63b140e82c50&cp=50.245325~28.632753&lvl=16&pi=0&v=2&sV=2&form=S00027"><button class="help-our-pets-button">Геолокація</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="animal-teaser cat-2-skin">
                        <figure class="teaser-ears">
                            <div class="ear left-ear"></div>
                            <div class="ear right-ear"></div>
                        </figure>
                        <div class="teaser-content">
                            <div class="teaser-main-content">
                                <p class="text-align-center">Залишились запитання - залиште заявку і ми зв’яжемось з вами<br><br></p>
                                <form action="/controllers/post-mail/mail.php" method="post" class="form-styles">
                                    <input type="text" placeholder="Введіть повне ім'я" name="fullname" id="fullname" />
                                    <input type="tel" placeholder="Введіть телефон" name="phone" id="phone" />
                                    <input type="email" placeholder="Введіть пошту" name="email" id="email" />
                                    <textarea placeholder="Введіть текст повідомлення" name="comment" id="comment"></textarea>
                                    <button class="submit-button help-our-pets-button" type="submit" value="Надіслати" name="submit">Надіслати</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>

</html>