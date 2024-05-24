<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/pico.classless.min.css">
    <title>Steckbrief</title>
</head>
<body>
<main class="container">
    <header>
        <h1>Steckbrief</h1>
    </header>
    <section>
        <form action="process.php" method="post" enctype="multipart/form-data">
            <label for="gender">Geschlecht</label>
            <input type="radio" id="male" name="gender" value="männlich">
            <label for="male">männlich</label>
            <input type="radio" id="female" name="gender" value="weiblich">
            <label for="female">weiblich</label>
            <input type="radio" id="diverse" name="gender" value="divers">
            <label for="diverse">divers</label>
            <label for="firstname">Vorname</label>
            <input type="text" id="firstname" name="firstname">
            <label for="lastname">Nachname</label>
            <input type="text" id="lastname" name="lastname">
            <label for="age">Alter</label>
            <input type="number" id="age" name="age">
            <label for="email">E-Mail</label>
            <input type="email" id="email" name="email">
            <label for="phone">Telefon</label>
            <input type="text" id="phone" name="phone">
            <label for="street">Straße</label>
            <input type="text" id="street" name="street">
            <label for="zip">PLZ</label>
            <input type="text" id="zip" name="zip">
            <label for="city">Ort</label>
            <input type="text" id="city" name="city">
            <label for="image">Bild hochladen</label>
            <input type="file" id="image" name="image" accept="image/*">
            <button type="submit">Save</button>
        </form>
    </section>
</main>
</body>
</html>
