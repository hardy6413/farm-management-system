<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/farms.css">
    <link rel="stylesheet" type="text/css" href="public/css/overview.css">
    <script src="https://kit.fontawesome.com/a781b65e9b.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/public/js/NavigationDisplaying.js" defer></script>
    <script type="text/javascript" src="/./public/js/searchFields.js" defer></script>
    <title>Fields</title>
</head>

<body>
    <div class="base-container">
       <?php include('leftNavi.php')?>
       <main>
           <?php include('upperNavi.php')?>
           <header class="field-navi">
            <ul class="farm-navi">
                <li class="field-navi-item">
                    <div class="search-field">
                        <div>
                            <input placeholder="search action" >
                        </div>
                    </div>
                    
                </li>
                <li class="field-navi-item">
                    <div class="search-field">
                        <div>
                            <input placeholder="search field" >
                        </div>
                    </div>
                </li>
                <li class="field-navi-item">
                 <a href="/addField" class="navi-button">
                      add field</a>
                </li>
            </ul>
           </header>
           <section class="farms-background">
            <ul class="fields-list">
                <?php if (isset($fields))foreach ($fields as $field): ?>
                <li class="fields-list-item">
                    <img src="public/uploads/<?= $field->getImage(); ?>" class="field-picture">
                    <div class="field-description-container">
                        <h2 class="field-info">
                            <?= $field->__toString(); ?>
                        </h2>
                     <a href="#" class="field-options">
                          Inspect on map
                         </a>
                         <a href="/fieldOverview/<?= $field->getId(); ?>" class="field-options" >
                            Past actions and notes
                           </a>
                    </div>
                    <a href="#" class="delete-icon">
                        <i class="fas fa-trash"  id="delete-field"></i>
                    </a>
                    
                </li>
                <?php endforeach; ?>
            </ul>
           </section>
       </main>
    </div>
</body>


<template id="field-template">
    <li class="fields-list-item">
        <img src="" class="field-picture">
        <div class="field-description-container">
            <h2 class="field-info">
                field info
            </h2>
            <a href="#" class="field-options">
                Inspect on map
            </a>
            <a href="" class="field-options" id="field-overview-id">
                Past actions and notes
            </a>
        </div>
        <a href="#" class="delete-icon">
            <i class="fas fa-trash"  id="delete-field"></i>
        </a>

    </li>
</template>