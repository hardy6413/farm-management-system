<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/farms.css">
    <link rel="stylesheet" type="text/css" href="public/css/overview.css">
    <link rel="stylesheet" type="text/css" href="public/css/tasks.css">
    <script src="https://kit.fontawesome.com/a781b65e9b.js" crossorigin="anonymous"></script>
    <title>Farms</title>
</head>

<body>
    <div class="base-container">
        <?php include('leftNavi.php')?>
       <main>
           <header>
                <div class ="search-bar">
                    <i class="fas fa-search"></i>
                    <div>
                        <input placeholder="search farm" >
                    </div>

                </div>
                <div class="create-farm">
                    <i class="fas fa-plus"></i>
                    <a class="create-farm-button" href="/createFarm"  > create farm </a>
                </div>
           </header>
           <div>Farms around you</div>
           <section class="farms">
               <div id="farm-1">
                   <img src="public/img/farms/farm 1.jpg" >
                   <div>
                       <h2>title</h2>
                       <p> description</p>
                   </div>
                </div>
                <div id="farm-2">
                    <img src="public/img/farms/farm 1.jpg" >
                    <div>
                        <h2>title</h2>
                        <p> description</p>
                    </div>
                 </div>
                 <div id="farm-3">
                    <img src="public/img/farms/farm 1.jpg" >
                    <div>
                        <h2>title</h2>
                        <p> description</p>
                    </div>
                 </div>
                 <div id="farm-4">
                    <img src="public/img/farms/farm 1.jpg" >
                    <div>
                        <h2>title</h2>
                        <p> description</p>
                    </div>
                 </div>
           </section>
           <button id="select">select</button>
       </main>
    </div>
</body>