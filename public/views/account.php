<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/farms.css">
    <link rel="stylesheet" type="text/css" href="public/css/overview.css">
    <link rel="stylesheet" type="text/css" href="/public/css/hideUpperNaviOnLinkedViews.css">
    <script src="https://kit.fontawesome.com/a781b65e9b.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="/public/js/NavigationDisplaying.js" defer></script>
    <title>Accounts</title>
</head>

<body>
    <div class="base-container">
        <?php include('leftNavi.php')?>
       <main>
           <?php include('upperNavi.php')?>
           <section class="farms-background">
               <? if (isset($worker)) : ?>
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
                        <?= $worker->getFirstName()." ".$worker->getLastName(); ?>
                    </h2>
                </div>
               <?php endif; ?>
           </section>
       </main>
    </div>
</body>