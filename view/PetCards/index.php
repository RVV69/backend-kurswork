<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $db = new PDO('mysql:host=localhost;dbname=cw-petguardians;charset=utf8', 'root', '');

    $petId = $_POST['pet_id'];
    $petsinfo = [];
    if ($query = $db->query("SELECT * FROM pets")) {
        $petsinfo = $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        print_r($db->errorInfo());
    }

    $pageTitle = "Моя удивительная статья";
    $pageUrl = "http://example.com/my-amazing-article";

    // URL для кнопок поделиться
    $facebookShareUrl = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode($pageUrl);
    $twitterShareUrl = "https://twitter.com/intent/tweet?url=" . urlencode($pageUrl) . "&text=" . urlencode($pageTitle);
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
    <link href="/view/PetCards/style.css" rel="stylesheet">
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

    <div class="pet-wrapper page-padding">
        <div class="pet-card">
            <div class="image-col">
                <div class="bread-crisp">Хочу друга/<?php echo $petsinfo[$petId - 1]['name']; ?></div>
                <figure>
                    <img class="pet-img" src="<?php echo $petsinfo[$petId - 1]['photoID']; ?>" alt="">
                </figure>
                <p class="share-pet">Розкажи про мене друзям і допоможи знайти
                    мою <span class="group-wrap">людину:<a href="<?php echo htmlspecialchars($twitterShareUrl); ?>" target="_blank" class="share-button twitter"><img class="share" src="/main-page-photo/Share.png" alt=""></span></a>
                </p>
            </div>
            <div class="info-col">
                <h2 class="pet-name"> <?php echo $petsinfo[$petId - 1]['name']; ?></h2>
                <p class="age-and-gender"><?php echo $petsinfo[$petId - 1]['sex']; ?>, <?php echo $petsinfo[$petId - 1]['age']; ?></p>
                <a href="/view/HowHelp"><button class="pet-adopt">Взяти в сім’ю</button></a>
                <h3 class="pet-info-heading">Про мене:</h3>
                <p class="pet-text"><?php echo $petsinfo[$petId - 1]['info']; ?></p>
            </div>
        </div>
    </div>

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