<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/farms.css">
    <link rel="stylesheet" type="text/css" href="public/css/overview.css">
    <link rel="stylesheet" type="text/css" href="public/css/field.css">
    <link rel="stylesheet" type="text/css" href="public/css/overview.css">
    <script src="https://kit.fontawesome.com/a781b65e9b.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>FarmList</title>
</head>

<body>
    <div class="base-container">
       <nav>
           <img src="public/img/logo.svg">
           <ul>
               <li>
                   <a href="#" class="button">
                       <i class="fas fa-home"></i>
                       myFarm
                   </a>
               </li>
               <li>
                   <a href="/account" class="button">
                       <i class="fas fa-user-circle"></i>
                       account
                   </a>
               </li>
               <li>
                   <a href="#" class="button"><i class="fas fa-bell"></i>
                       notifications</a>
               </li>
               <li>
                   <form class="logout-form" action="logout" method="POST">
                       <button type="submit"  class="logout-button">log out</button>
                   </form>
               </li>
               <li class="settings">
                   <a href="/settings" class="button"><i class="fas fa-cog"></i>
                       settings</a>
               </li>
           </ul>
        
       </nav>
       <main>
        <header>
            <div class ="search-bar">
                <i class="fas fa-search"></i>
                <form>
                    <input placeholder="search farm" >
                </form>

            </div>
            <div class="create-farm">
                <i class="fas fa-plus"></i>
                <a class="create-farm-button" href="/createFarm" > create farm </a>
            </div>
       </header>
           <section class="farms-list-background">
            <ul class="farms-list">
                    <?php foreach ($farms as $farm): ?>
                <li class="farms-item-container">
                    <img id="farm-picture" src="public/uploads/<?= $farm->getImage(); ?>" >
                    <div>
                        <h2 class="farm-data-info" id="desc"><?= $farm->findOwner()->__toString(); ?></h2>
                        <p class="farm-data-info" id="desc"><?= $farm->getName(); ?></p>
                        <div class="farm-data-info" id="desc"><?= $farm->getFarmAddress()->__toString(); ?></div>
                    </div>
                </li>
                    <?php endforeach; ?>
            </ul>
           </section>
       </main>
    </div>
</body>

<template id="farm-template">
    <li class="farms-item-container">
        <img id="farm-picture" src="">
        <div>
            <h2 class="farm-data-info" id="desc">owner</h2>
            <p class="farm-data-info" id="desc">name</p>
            <h3 class="farm-data-info" id="desc">address</h3>
        </div>
    </li>
</template>
