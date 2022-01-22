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
        <?php include('leftNavi.php')?>
       <main>
        <header>
            <div class ="search-bar">
                <i class="fas fa-search"></i>
                <div>
                    <input placeholder="search farm" >
                </div>

            </div>
            <div class="create-farm">
                <i class="fas fa-plus"></i>
                <a class="create-farm-button" href="/createFarm" > create farm </a>
            </div>
       </header>
           <section class="farms-list-background">
               <div class="messages" id="farms-list-message" >
                   <?php if(isset($messages)){
                       foreach ($messages as $message){
                           echo $message;
                       }
                   }
                   ?>
               </div>
            <ul class="farms-list">
                    <?php if (isset($farms))foreach ($farms as $farm): ?>
                <li class="farms-item-container">
                    <img id="farm-picture" src="public/uploads/<?= $farm->getImage(); ?>" >
                    <div>
                        <h2 class="farm-data-info" id="desc"><?= $farm->findOwner()->__toString(); ?></h2>
                        <p class="farm-data-info" id="desc"><?= $farm->getName(); ?></p>
                        <div class="farm-data-info" id="desc"><?= $farm->getFarmAddress()->__toString(); ?></div>
                        <form id="joinFarmForm" action="joinFarm" method="POST">
                            <label for="<?= $farm->getId(); ?>">
                                <input name="code" type="text" placeholder="enter code">
                            </label>
                            <button id="join-button"  type="submit">join farm</button>
                        </form>
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
