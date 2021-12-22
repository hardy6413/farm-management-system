<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/farms.css">
    <link rel="stylesheet" type="text/css" href="public/css/overview.css">
    <script src="https://kit.fontawesome.com/a781b65e9b.js" crossorigin="anonymous"></script>
    <title>Accounts</title>
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
           
           <section class="farms-background">
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
                        Marc Johnson
                    </h2>
                </div>
           </section>
       </main>
    </div>
</body>