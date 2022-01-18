<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/farms.css">
    <link rel="stylesheet" type="text/css" href="public/css/overview.css">
    <script src="https://kit.fontawesome.com/a781b65e9b.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/public/js/NavigationDisplaying.js" defer></script>
    <title>Overview</title>
</head>

<body>
    <div class="base-container">
        <?php include('leftNavi.php')?>
       <main>
           <?php include('upperNavi.php')?>
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