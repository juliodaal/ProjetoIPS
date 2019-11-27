<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Login | SGA</title>
</head>
<body class="body-login">
    <form class="form-signin" action="" method="post">
        <div class="container-logotype-h1-form">
            <img src="../assets/image/Logótipo_do_Instituto_Politécnico_de_Setúbal.png" alt="logotype IPS" width="72" height="72">
            <h1 class="">SGA</h1>
        </div>
        <div class="container-inputs-labels-form">
            <h2>Login.</h2>
            <div>
                <input type="email" id="inputEmail"placeholder="Email" maxlength="35" name="email" require>
                <i class="fa">&#xf0e0;</i>
            </div>
            <div>
                <input type="password" id="inputPassword" class="" placeholder="Password" maxlength="15" name="password" require>
                <i class="fa">&#xf023;</i>
            </div>
            <button type="submit" id="button">Sign in</button>
            <a href="cursos.php">Exemplo</a>
        </div>
    </form>
</body>
</html>