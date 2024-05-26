<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (session()->get('error')): ?>
        <p><?= session()->get('error') ?></p>
    <?php endif; ?>
    <form method="post" action="/loginCheck">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email"><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
