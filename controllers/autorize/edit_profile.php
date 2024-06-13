<?php
session_start();
include '/wamp64/www/CW-BackEnd/core/bd.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];
    $hashed_password = $password;

    $stmt = $conn->prepare("UPDATE user SET name = ?, password = ? WHERE id = ?");
    $stmt->bind_param("ssi", $username, $hashed_password, $user_id);
    if ($stmt->execute()) {
        header("Location: /view/Main/");
    } else {
        header("Location: /view/Main/");
    }

    $stmt->close();
} else {
    $stmt = $conn->prepare("SELECT name FROM user WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($username);
    $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="uk">
<head>
<meta charset="UTF-8">
<title>Edit profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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

    <main class="page-padding page-vertical-padding">
    <h2>Редагування профілю<br><br></h2>
    <form class="form-styles" method="post" action="">
        Логін: <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
        Пароль: <input type="password" name="password" required>
        <input type="submit" value="Оновити">
    </form>
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
                        <li><a href="#">Головна</a></li>
                        <li><a href="#">Хочу друга</a></li>
                        <li><a href="#">Хочу допомогти</a></li>
                        <li><a href="#">Про нас</a></li>
                    </ul>
            </div>

            <div class="follow-us-section">
                <h4>Зв’яжись з нами</h4>
                <div class="follow-us-links">
                    <a href="#"><img class="follow-icon tg" src="/main-page-photo/telegram.png" alt=""></a>
                    <a href="#"><img class="follow-icon fb" src="/main-page-photo/facebook.png" alt=""></a>
                    <a href="#"><img class="follow-icon ig" src="/main-page-photo/social.png" alt=""></a>
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
<?php
    $stmt->close();
}
?>
