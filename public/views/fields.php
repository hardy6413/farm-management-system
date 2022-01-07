<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/farms.css">
    <link rel="stylesheet" type="text/css" href="public/css/overview.css">
    <script src="https://kit.fontawesome.com/a781b65e9b.js" crossorigin="anonymous"></script>
    <title>Fields</title>
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
                    <a href="/listWorkers" class="navi-button">
                        workers</a>
                </li>
                <li class="farm-navi-item">
                    <a href="/tasks" class="navi-button">
                        tasks</a>
                </li>
            </ul>
           </header>
           <header class="field-navi">
            <ul class="farm-navi">
                <li class="field-navi-item">
                    <div class="search-field">
                        <form>
                            <input placeholder="search action " >
                        </form>
                    </div>
                    
                </li>
                <li class="field-navi-item">
                    <div class="search-field">
                        <form>
                            <input placeholder="search field " >
                        </form>
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
                         <a href="#" class="field-options">
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