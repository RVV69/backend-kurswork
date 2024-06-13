<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PetGuardians</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/model/Change-News/style.css" rel="stylesheet">
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
    <main class="page-padding">
        <div class="table-scroll-wrapper">
        <table class="change-table" border="1">
            <tr>
                <th>Фото</th>
                <th>ID</th>
                <th>Тема новини</th>
                <th>Дата</th>
                <th>Інформація</th>
                <th>Опис</th>
                <th>Дії</th>
            </tr>
            <?php

            $pdo = new PDO('mysql:host=localhost;dbname=cw-petguardians;charset=utf8', 'root', '');

            $sql = "SELECT * FROM news";
            $stmt = $pdo->query($sql);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['photoID']) . "</td>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['theme']) . "</td>";
                echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                echo "<td><div class='news-info-short'>" . htmlspecialchars($row['info']) . "</div></td>";
                echo "<td><div class='news-info-short'>" . htmlspecialchars($row['shortInfo']) . "</div</td>";
                echo "<td><a href='/controllers/change-info/change-news/edit.php?id=" . $row['id'] . "'>Редагувати</a> |
                    <a href='/controllers/change-info/delete-news/delete.php?id=" . $row['id'] . "'>Видалити</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
        </div>
        <br>
        <a href="/controllers/change-info/add-news/add.php">Додати новий запис</a><br>
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
