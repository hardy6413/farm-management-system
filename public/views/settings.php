<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/farms.css">
    <link rel="stylesheet" type="text/css" href="public/css/overview.css">
    <link rel="stylesheet" type="text/css" href="/public/css/hideUpperNaviOnLinkedViews.css">
    <script src="https://kit.fontawesome.com/a781b65e9b.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/public/js/NavigationDisplaying.js" defer></script>
    <title>Settings</title>
</head>

<body>
    <div class="base-container">
        <?php include('leftNavi.php')?>
       <main>
           <?php include('upperNavi.php')?>
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