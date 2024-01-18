<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/headerstyling.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body class="bg-dark p-5 text-white">
<div class="container ">
    <div class="d-flex flex-column justify-content-center align-items-center " style="min-height: 100vh;">
        <h1>Welcome to Taste Book</h1>
        <br>
        <h2>You have to Log in first to visit the website</h2>
        <br>
        <form method="post" action="/loginAction">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input class="form-control" name="username" id="username" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <button type="submit" class="btn btn-success">Login</button>
            <button type="button" class="btn btn-info" onclick="location.href='signup'">Sign Up</button>
        </form>
        <br>
        <p><?php echo isset($loginError) ? htmlspecialchars($loginError) : ""; ?></p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>


