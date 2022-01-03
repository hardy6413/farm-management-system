<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/farms.css">
    <link rel="stylesheet" type="text/css" href="public/css/overview.css">
    <script src="https://kit.fontawesome.com/a781b65e9b.js" crossorigin="anonymous"></script>
    <title>Overview</title>
</head>

<body>
    <div class="base-container">
       <nav>
           <img src="public/img/logo.svg">
           <ul>
               <li>
                   <div class="navi-button-container">
                       <a href="/profileOverview" class="left-navi-button">
                           <i class="fas fa-home"></i>
                           myFarm
                       </a>
                   </div>

               </li>
               <li>
                   <div class="navi-button-container">
                       <a href="/account" class="left-navi-button">
                           <i class="fas fa-user-circle"></i>
                           account
                       </a>
                   </div>
               </li>
               <li>
                   <div class="navi-button-container">
                       <a href="#" class="left-navi-button"><i class="fas fa-bell"></i>
                           notifications</a>
                   </div>
               </li>
               <li>
                   <form class="logout-form" action="logout" method="POST">
                       <button type="submit"  class="logout-button"> <i class="fas fa-sign-out-alt"></i>
                           logout
                       </button>
                   </form>
               </li>
               <li class="settings">
                   <div class="navi-button-container">
                       <a href="/settings" class="button"><i class="fas fa-cog"></i>
                           settings</a>
                   </div>
               </li>
           </ul>
        
       </nav>
       <main>
           <header class="navi-header">
            <ul class="farm-navi">
                <li class="farm-navi-item">
                    <a href="/profileOverview" class="navi-button">
                        overview
                    </a>
                </li>
                <li class="farm-navi-item">
                    <a href="/fields" class="navi-button">
                        fields
                    </a>
                </li>
                <li class="farm-navi-item">
                    <a href="/workers" class="navi-button">
                        workers</a>
                </li>
                <li class="farm-navi-item">
                    <a href="/tasks" class="navi-button">
                        tasks</a>
                </li>
            </ul>
           </header>
           <section class="farms-background">
               <div class="farm-picture-container">
                   <? if (isset($farm) && isset($worker)) : ?>
                   <img src="public/uploads/<?= $farm->getImage(); ?>"  id="farmhouse">
                   <div>
                       <h2 class="description"><?= $farm->getName(); ?> </h2>
                       <p class="description"> Owner <?= $farm->findOwner()->__toString(); ?></p>
                   </div>
                </div>
                <div class="profile-picture">
                    <img src="public/img/placeholder.svg" id=picture-placeholder>
                    <h2 class="picture-description">
                        <?= $worker->getFirstName()." ".$worker->getLastName(); ?>
                    </h2>
                    <?php endif; ?>
                </div>
           </section>
       </main>
    </div>
</body>