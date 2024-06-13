<?php
$pdo = new PDO('mysql:host=localhost;dbname=cw-petguardians;charset=utf8', 'root', '');
if(isset($_GET['id'])) {
$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM news WHERE id = ?");
$stmt->execute([$id]);
header("Location: /model/Change-News");
exit;
} else {
echo "ID не вказано.";
}
?>
