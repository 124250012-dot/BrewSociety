<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form action="" method="post">
        <label>Role</label>
        <select name="role" required>
            <option value="customer">Customer</option>
            <option value="admin">Admin</option>
        </select><br><br>

        <label>Username</label>
        <input type="text" id="username" name="username" required><br><br>

        <label>Password</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
