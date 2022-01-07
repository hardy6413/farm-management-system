
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/farms.css">
    <script src="https://kit.fontawesome.com/a781b65e9b.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/EmptyFormValidation.js" defer></script>
    <title>add task</title>
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
           <header>
                <div class ="search-bar">
                    <i class="fas fa-search"></i>
                    <div>
                        <input placeholder="search tasks " >
                    </div>

                </div>
                <div class="create-farm">
                    <a href="/addTask" class="navi-button">
                        add task</a>
                </div>
           </header>
           <section class="create-farm-form">
            <form action="addTask" method="POST" ENCTYPE="multipart/form-data" name="standard-form">
                <div class="messages">
                    <?php if(isset($messages)){
                        foreach ($messages as $message){
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <textarea name="description" rows=5 placeholder="Please provide task Description"></textarea>

                <button type="submit">add task</button>
            </form>
               
           </section>
       </main>
    </div>
</body>