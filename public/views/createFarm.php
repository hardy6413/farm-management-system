
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/farms.css">
    <script src="https://kit.fontawesome.com/a781b65e9b.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/EmptyFormValidation.js" defer></script>
    <title>createFarm</title>
</head>

<body>
    <div class="base-container">
        <?php include('leftNavi.php')?>
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
                   <a class="create-farm-button" href="/createFarm"  > create farm </a>
               </div>
           </header>
           <section class="create-farm-form">
            <form action="createFarm" method="POST" ENCTYPE="multipart/form-data" name="standard-form">
                <div class="messages">
                    <?php if(isset($messages)){
                        foreach ($messages as $message){
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="name" type="text" placeholder="name">
                <input name="street" type="text" placeholder="street">
                <input name="city" type="text" placeholder="city">
                <input name="postal-code" type="text" placeholder="postal-code">
                <input name="building-number" type="text" placeholder="building-number">

                <input type="file" name="file"/><br/>
                <button type="submit">create farm</button>
            </form>
               
           </section>
       </main>
    </div>
</body>