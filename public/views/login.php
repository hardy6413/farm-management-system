<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>LOGIN PAGE</title>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="public/img/logo.svg">
        </div>
        <div class="entry-container">
            <div class="login-container">
                <form class="login" action="login" method="POST">
                    <div class="messages">
                        <?php if(isset($messages)){
                            foreach ($messages as $message){
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <input name=" email " type="text " placeholder="email@email.com ">
                    <input name="password " type="text " placeholder="password ">
                    <div class="login-buttons-container">
                        <button type="submit" class="sign-up-button">log in</button>
                        <a href="/createAccount" class="sign-up-button">sign up</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>