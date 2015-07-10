<?php
    require_once __DIR__ . '/../../configuration.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <br />
    <form method="post" action="<?php echo 'http://' . SITE_NAME . 'LoginController/userAuth'; ?>">
        <label for="email">Email:</label>
        <input type="text" name="email">
        <label for="password">Senha:</label>
        <input type="text" name="password">
        <input type="submit" value="Submit">
    </form>
</body>
</html>