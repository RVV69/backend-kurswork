<?php
$pdo = new PDO('mysql:host=localhost;dbname=cw-petguardians;charset=utf8', 'root', '');
if(isset($_GET['id'])) {
$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM pets WHERE id = ?");
$stmt->execute([$id]);
header("Location: /model/Change-Pets");
exit;
} else {
echo "ID не вказано.";
}
?>
