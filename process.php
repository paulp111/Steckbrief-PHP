<?php
require 'functions.php';

$errors = [];
$valid = true;

$gender = $_POST['gender'] ?? '';
$firstname = $_POST['firstname'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$age = $_POST['age'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$street = $_POST['street'] ?? '';
$zip = $_POST['zip'] ?? '';
$city = $_POST['city'] ?? '';
$image = $_FILES['image'] ?? null;

if (empty($gender)) {
    $errors['gender'] = 'Geschlecht ist erforderlich';
    $valid = false;
}
if (empty($firstname) || !is_string($firstname)) {
    $errors['firstname'] = 'Vorname ist erforderlich';
    $valid = false;
}
if (empty($lastname) || !is_string($lastname)) {
    $errors['lastname'] = 'Nachname ist erforderlich';
    $valid = false;
}
if (empty($age) || !filter_var($age, FILTER_VALIDATE_INT, ["options" => ["min_range" => 12, "max_range" => 100]])) {
    $errors['age'] = 'Alter muss zwischen 12 und 100 liegen';
    $valid = false;
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Ungültige E-Mail-Adresse';
    $valid = false;
}
if (empty($phone) || !preg_match('/^\+?\d+$/', $phone)) {
    $errors['phone'] = 'Ungültige Telefonnummer';
    $valid = false;
}
if (empty($street) || !is_string($street)) {
    $errors['street'] = 'Straße ist erforderlich';
    $valid = false;
}
if (empty($zip) || !is_string($zip)) {
    $errors['zip'] = 'PLZ ist erforderlich';
    $valid = false;
}
if (empty($city) || !is_string($city)) {
    $errors['city'] = 'Ort ist erforderlich';
    $valid = false;
}
if ($image && $image['size'] > 4 * 1024 * 1024) {
    $errors['image'] = 'Bild darf nicht größer als 4MB sein';
    $valid = false;
}

echo "<!doctype html>";
echo "<html lang='de'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>";
echo "<meta http-equiv='X-UA-Compatible' content='ie=edge'>";
echo "<link rel='stylesheet' href='css/pico.classless.min.css'>";
echo "<link rel='stylesheet' href='css/styles.css'>";
echo "<title>Steckbrief</title>";
echo "</head>";
echo "<body>";
echo "<main class='container'>";

if ($valid) {
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . time() . '_' . $_FILES['image']['name'];
    move_uploaded_file($image['tmp_name'], $uploadFile);

    echo "<h1>Steckbrief</h1>";
    echo "<div class='profile-container'>";
    echo "<div class='image'>";
    echo "<img src='$uploadFile' alt='Profilbild'>";
    echo "</div>";
    echo "<div class='details'>";
    echo "<h2>Persönliche Daten</h2>";
    echo "<ul>";
    echo "<li>Vorname: " . e($firstname) . "</li>";
    echo "<li>Nachname: " . e($lastname) . "</li>";
    echo "<li>Geschlecht: " . e($gender) . "</li>";
    echo "<li>Alter: " . e($age) . "</li>";
    echo "<li>Email: " . e($email) . "</li>";
    echo "<li>Telefon: " . e($phone) . "</li>";
    echo "<li>Straße: " . e($street) . "</li>";
    echo "<li>PLZ: " . e($zip) . "</li>";
    echo "<li>Ort: " . e($city) . "</li>";
    echo "</ul>";
    echo "</div>";
    echo "</div>";
} else {
    echo "<h1>Fehler</h1>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>" . e($error) . "</li>";
    }
    echo "</ul>";
}

echo "</main>";
echo "</body>";
echo "</html>";
?>
