<?php
$pdo = new PDO('mysql:host=localhost;dbname=cw-petguardians;charset=utf8', 'root', '');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $requiredFields = ['id', 'theme', 'date', 'info'];
    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field])) {
            echo "Поле $field не було передано.";
            exit;
        }
    }

    $id = $_POST['id'];
    $theme = $_POST['theme'];
    $date = $_POST['date'];
    $info = $_POST['info'];
    $shortInfo = $_POST['shortInfo'];

    $photoPath = null;
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $photoTmpPath = $_FILES['photo']['tmp_name'];
        $photoName = basename($_FILES['photo']['name']);
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/news-photo/';

        if (!file_exists($uploadDir)) {
            if (!mkdir($uploadDir, 0777, true)) {
                echo "Не вдалося створити директорію $uploadDir.";
                exit;
            }
        }

        $photoPath = $uploadDir . time() . '_' . $photoName;

        if (move_uploaded_file($photoTmpPath, $photoPath)) {
            $photoPath = '/news-photo/' . time() . '_' . $photoName;
        } else {
            echo "Помилка завантаження фото.";
            exit;
        }
    }

    try {
        if ($photoPath) {
            $stmt = $pdo->prepare("UPDATE news SET theme = ?, date = ?, info = ?, shortInfo = ?, photoID = ? WHERE id = ?");
            $stmt->execute([$theme, $date, $info, $shortInfo, $photoPath, $id]);
        } else {
            $stmt = $pdo->prepare("UPDATE news SET theme = ?, date = ?, info = ?, shortInfo = ?, WHERE id = ?");
            $stmt->execute([$theme, $date, $info, $shortInfo, $id]);
        }

        if ($stmt->rowCount()) {
            header("Location: /model/Change-News");
        } else {
            echo "Помилка при оновленні запису або зміни не були внесені.";
        }
    } catch (PDOException $e) {
        echo "Помилка при оновленні запису: " . $e->getMessage();
    }
    exit;
} else {
    echo "Запит має бути POST.";
    exit;
}
?>