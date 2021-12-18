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
                <a href="/profileOverview" class="button">
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
                <a href="#" class="button"> 
                    <i class="far fa-comment"></i>
                     messages</a>
               </li>
               <li>
                <a href="#" class="button"><i class="fas fa-bell"></i>
                     notifications</a>
               </li>
               <li class="settings">
                <a href="/settings" class="button"><i class="fas fa-cog"></i>
                     settings</a>
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
                   <img src="public/img/farms/farm 1.jpg"  id="farmhouse">
                   <div>
                       <h2 class="description">title </h2>
                       <p class="description"> description</p>
                   </div>
                </div>
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