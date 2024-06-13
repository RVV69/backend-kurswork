<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pdo = new PDO('mysql:host=localhost;dbname=cw-petguardians;charset=utf8', 'root', '');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo '<pre>';
    print_r($_FILES);
    print_r($_POST);
    echo '</pre>';

    $theme = $_POST['theme'] ?? null;
    $date = $_POST['date'] ?? null;
    $info = $_POST['info'] ?? null;
    $shortInfo = $_POST['shortInfo'] ?? null;

    $photoPath = null;
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $photoTmpPath = $_FILES['photo']['tmp_name'];
        $photoName = basename($_FILES['photo']['name']);
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/news-photo/';

        if (!file_exists($uploadDir)) {
            if (!mkdir($uploadDir, 0777, true)) {
                header("Location: /model/Change-News");
            }
        }

        $photoPath = $uploadDir . time() . '_' . $photoName;

        if (move_uploaded_file($photoTmpPath, $photoPath)) {
            $photoPath = '/news-photo/' . time() . '_' . $photoName;
        } else {
            header("Location: /model/Change-News");
        }
    } else {
        header("Location: /model/Change-News");
    }

    try {
        if ($photoPath) {
            $stmt = $pdo->prepare("INSERT INTO news (theme, date, info, shortInfo, photoID) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$theme, $date, $info, $shortInfo, $photoPath]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO news (theme, date, info, shortInfo) VALUES (?, ?, ?, ?)");
            $stmt->execute([$theme, $date, $info, $shortInfo]);
        }

        if ($stmt->rowCount()) {
            header("Location: /model/Change-News");
        } else {
            header("Location: /model/Change-News");
        }
    } catch (PDOException $e) {
        header("Location: /model/Change-News");
    }
    exit;
} else {
    echo "Запит має бути POST.";
    exit;
}
?>