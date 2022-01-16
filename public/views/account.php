<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/farms.css">
    <link rel="stylesheet" type="text/css" href="public/css/overview.css">
    <script src="https://kit.fontawesome.com/a781b65e9b.js" crossorigin="anonymous"></script>
    <title>Accounts</title>
</head>

<body>
    <div class="base-container">
        <?php include('leftNavi.php')?>
       <main>
           
           <section class="farms-background">
            <ul class="account-navi">
                <li class="farm-navi-item">
                 <a href="#" class="navi-button">
                     change password
                     </a>
                     
                </li>
                <li class="farm-navi-item">
                 <a href="#" class="navi-button">
                     change token id
                 </a>
                </li>
                <li class="farm-navi-item">
                 <a href="#" class="navi-button"> 
                     change email</a>
                </li>
                <li class="farm-navi-item">
                 <a href="#" class="navi-button">
                      create support ticket</a>
                </li>
                <li class="farm-navi-item">
                 <a href="#" class="navi-button">
                      change profile picture</a>
                </li>
                <li class="farm-navi-item">
                    <a href="#" class="navi-button">
                        leave farm
                    </a>
                </li>
                <li class="farm-navi-item">
                    <a href="#" class="navi-button">
                        delete account
                    </a>
                </li>
            </ul>
                <div class="profile-picture">
                    <img src="public/img/placeholder.svg" id=picture-placeholder>
                    <h2 class="picture-description">
                        Marc Johnson
                    </h2>
                </div>
           </section>
       </main>
    </div>
</body>