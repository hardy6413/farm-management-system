<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/farms.css">
    <link rel="stylesheet" type="text/css" href="public/css/overview.css">
    <link rel="stylesheet" type="text/css" href="public/css/field.css">
    <link rel="stylesheet" type="text/css" href="public/css/overview.css">
    <script src="https://kit.fontawesome.com/a781b65e9b.js" crossorigin="anonymous"></script>
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
                <a href="#" class="button">
                    <i class="fas fa-user-circle"></i>
                    account
                </a>
               </li>
               <li>
                <a href="#" class="button"> 
                    <i class="far fa-comment"></i>
                     messages</a>
               </li>
               <li>
                <a href="#" class="button"><i class="fas fa-bell"></i>
                     notifications</a>
               </li>
               <li class="settings">
                <a href="#" class="button"><i class="fas fa-cog"></i>
                     settings</a>
               </li>
           </ul>
        
       </nav>
       <main>
        <header>
            <div class ="search-bar">
                <i class="fas fa-search"></i>
                <form>
                    <input placeholder="search farm " >
                </form>

            </div>
            <div class="create-farm">
                <i class="fas fa-plus"></i>
                create farm
            </div>
       </header>
           <section class="farms-list-background">
            <ul class="fields-list">
                <li class="farms-item-container">
                    <img id="farm-picture" src="public/uploads/<?= $farm->getImage() ?>" >
                    <div>
                        <h2 class="farm-data-info"><?= $farm->getName(); ?></h2>
                        <h2 class="farm-data-info"> <?= $farm->getFarmAddres()->__toString(); ?></h2>
                    </div>
                </li>
            </ul>
           </section>
       </main>
    </div>
</body>