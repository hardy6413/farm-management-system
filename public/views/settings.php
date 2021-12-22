<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/farms.css">
    <link rel="stylesheet" type="text/css" href="public/css/overview.css">
    <script src="https://kit.fontawesome.com/a781b65e9b.js" crossorigin="anonymous"></script>
    <title>Settings</title>
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
            <ul class="settings-navi">
                <li class="settings-navi-item">
                 <a href="#" class="navi-settings-button">
                    <i class="fas fa-moon"></i>
                     dark mode
                     </a>
                     <div>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                          </label>
                    </div>
                     
                </li>
                <li class="settings-navi-item">
                 <a href="#" class="navi-settings-button">
                    <i class="fas fa-globe"></i>
                     language
                 </a>
                 <div>
                    <p id="lang"> EN </p>
                 </div>
                 
                </li>
                <li class="settings-navi-item">
                 <a href="#" class="navi-settings-button"> 
                    <i class="fas fa-ruler-combined"></i>
                     unit of measure</a>
                
                    <div>
                        <i class="fas fa-dot-circle"></i>
                         <p>Hectares</p>
                         <i class="far fa-circle"></i>
                         <p>Acres</p>
                    </div>
                 </li>
                <li class="settings-navi-item">
                 <a href="#" class="navi-settings-button">
                    <i class="fas fa-map-marker-alt"></i>
                      localization tracking</a>
                <div>
                    <i class="fas fa-toggle-on"></i>
                </div>
                </li>
                <li class="settings-navi-item">
                 <a href="#" class="navi-settings-button">
                    <i class="fas fa-info-circle"></i>
                      faq</a>
                      <div>

                      </div>
                </li>
                <li class="settings-navi-item">
                    <a href="#" class="navi-settings-button">
                        <i class="fas fa-question"></i>
                       contact
                    </a>
                    <div>
                        
                    </div>
                </li>
            </ul>
           </section>
       </main>
    </div>
</body>