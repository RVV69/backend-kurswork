<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $pdo = new PDO('mysql:host=localhost;dbname=cw-petguardians;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error connecting to the database: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo '<pre>';
    print_r($_FILES);
    print_r($_POST);
    echo '</pre>';

    $name = $_POST['name'] ?? null;
    $species = $_POST['species'] ?? null;
    $age = $_POST['age'] ?? null;
    $sex = $_POST['sex'] ?? null;
    $info = $_POST['info'] ?? null;

    if (!$name || !$species || !$age || !$sex || !$info) {
        echo "Будь ласка, заповніть всі поля форми.";
        exit;
    }

    $photoPath = null;
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $photoTmpPath = $_FILES['photo']['tmp_name'];
        $photoName = time() . '_' . basename($_FILES['photo']['name']);
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/pets-photo/';

        if (!file_exists($uploadDir)) {
            if (!mkdir($uploadDir, 0777, true)) {
                echo "Не вдалося створити директорію $uploadDir.";
                exit;
            }
        }

        $photoPath = $uploadDir . $photoName;

        if (move_uploaded_file($photoTmpPath, $photoPath)) {
            $photoPath = '/pets-photo/' . $photoName;
        } else {
            echo "Помилка завантаження фото.";
            exit;
        }
    } elseif (isset($_FILES['photo']) && $_FILES['photo']['error'] != UPLOAD_ERR_NO_FILE) {
        echo "Файл не був завантажений або сталася помилка. Код помилки: " . $_FILES['photo']['error'];
        exit;
    }

    try {
        $pdo->beginTransaction();

        $id = $_POST['id'] ?? null;
        if ($id) {
            if ($photoPath) {
                $stmt = $pdo->prepare("UPDATE pets SET name = ?, species = ?, age = ?, sex = ?, info = ?, photoID = ? WHERE id = ?");
                $stmt->execute([$name, $species, $age, $sex, $info, $photoPath, $id]);
            } else {
                $stmt = $pdo->prepare("UPDATE pets SET name = ?, species = ?, age = ?, sex = ?, info = ? WHERE id = ?");
                $stmt->execute([$name, $species, $age, $sex, $info, $id]);
            }
        } else {
            if ($photoPath) {
                $stmt = $pdo->prepare("INSERT INTO pets (name, species, age, sex, info, photoID) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$name, $species, $age, $sex, $info, $photoPath]);
            } else {
                $stmt = $pdo->prepare("INSERT INTO pets (name, species, age, sex, info) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$name, $species, $age, $sex, $info]);
            }
        }

        if ($stmt->rowCount()) {
            $pdo->commit();
            header("Location: /model/Change-Pets");
        } else {
            $pdo->rollBack();
            echo "Помилка при створенні запису.";
        }
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Помилка при створенні запису: " . $e->getMessage();
    }
    exit;
} else {
    echo "Запит має бути POST.";
    exit;
}
?>