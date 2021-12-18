
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/farms.css">
    <script src="https://kit.fontawesome.com/a781b65e9b.js" crossorigin="anonymous"></script>
    <title>createFarm</title>
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
           <header>
                <div class ="search-bar">
                    <i class="fas fa-search"></i>
                    <form>
                        <input placeholder="search tasks " >
                    </form>

                </div>
                <div class="create-farm">
                    <i class="fas fa-plus"></i>
                    add task
                </div>
           </header>
           <section class="create-farm-form">
            <form action="createFarm" method="POST" ENCTYPE="multipart/form-data">
                <div class="messages">
                    test
                </div>
                <textarea name="address" rows=5 placeholder="Please provide task Description"></textarea>

                <button type="submit">add task</button>
            </form>
               
           </section>
       </main>
    </div>
</body>