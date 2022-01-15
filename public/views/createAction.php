<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/farms.css">
    <script src="https://kit.fontawesome.com/a781b65e9b.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="/./public/js/action.js" defer></script>
    <title>create action</title>
</head>

<body>
    <div class="base-container">
       <nav>
           <img src="/public/img/logo.svg">
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
           <section class="create-farm-form">
            <form action="<?php if(isset($fieldId)) : ?> <?=$fieldId?> <?php endif ?>" method="POST" ENCTYPE="multipart/form-data" name="action-form">
                <div class="messages">
                </div>
                <select name="action" id="action-select">
                    <option value="ploughing">ploughing</option>
                    <option value="planting">planting</option>
                    <option value="spraying">spraying</option>
                    <option value="harvesting">harvesting</option>
                  </select>
                <textarea name="description" rows=5 placeholder="Action description"></textarea>
                <input name="plant" type="text" placeholder="plant type" id="action-inputs">
                <input name="planting-ratio" type="text" placeholder="planting-ratio kg/h" id="action-inputs">
                <input name="plant-seed-brand" type="text" placeholder="brand of the seed" id="action-inputs">
                <input name="spray-brand" type="text" placeholder="spray-brand" id="action-inputs">
                <input name="spraying-ratio" type="text" placeholder="spraying-ratio L/h" id="action-inputs">
                <input name="harvest-amount" type="text" placeholder="harvest-amount total on field" id="action-inputs">
                <button type="submit">add action</button>
            </form>
           </section>
       </main>
    </div>
</body>