<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/farms.css">
    <link rel="stylesheet" type="text/css" href="public/css/overview.css">
    <script src="https://kit.fontawesome.com/a781b65e9b.js" crossorigin="anonymous"></script>
    <title>Workers</title>
</head>

<body>
    <div class="base-container">
        <?php include('leftNavi.php')?>
       <main>
           <?php include('upperNavi.php')?>
           <section class="farms-background">
            <ul class="workers-list">
                <?php if (isset($workers))foreach ($workers as $worker): ?>
                <li class="workers-list-item">
                    <img src="public/img/placeholder.svg" class="worker-picture">
                    <h2 class="picture-description" >
                        <?= $worker->getFirstName()." ".$worker->getLastName(); ?>
                    </h2>
                 <a href="#" class="worker-activity">
                     offline
                     </a>
                     <i class="fas fa-ellipsis-h" id="options"></i>
                </li>
                <?php endforeach; ?>
            </ul>
           </section>
       </main>
    </div>
</body>