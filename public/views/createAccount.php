
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/farms.css">
    <script src="https://kit.fontawesome.com/a781b65e9b.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <script type="text/javascript" src="./public/js/EmptyFormValidation.js" defer></script>
    <title>Register</title>
</head>

<body>
<div class="base-container">
    <main class="main-container">
        <img src="public/img/logo.svg">
        <section class="create-account-form">
            <form action="signUp" method="POST" name="standard-form">
                <div class="messages">
                    <?php if(isset($messages)){
                        foreach ($messages as $message){
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="email" type="text" placeholder="email">
                <input name="password" type="password" placeholder="password">
                <input name="confirmedPassword" type="password" placeholder="confirm password">
                <input name="name" type="text" placeholder="name">
                <input name="lastname" type="text" placeholder="last name">
                <input name="street" type="text" placeholder="street">
                <input name="city" type="text" placeholder="city">
                <input name="postal-code" type="text" placeholder="postal-code">
                <input name="building-number" type="text" placeholder="building-number">
                <button type="submit">create account</button>
            </form>

        </section>
    </main>
</div>
</body>