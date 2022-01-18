<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/farms.css">
    <link rel="stylesheet" type="text/css" href="public/css/overview.css">
    <link rel="stylesheet" type="text/css" href="public/css/tasks.css">
    <script src="https://kit.fontawesome.com/a781b65e9b.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/public/js/NavigationDisplaying.js" defer></script>
    <title>Tasks</title>
</head>

<body>
    <div class="base-container">
        <?php include('leftNavi.php')?>
       <main>
           <?php include('upperNavi.php')?>
           <header class="field-navi">
            <ul class="farm-navi">
                <li class="field-navi-item">
                    <div class="search-field">
                        <form>
                            <input placeholder="search tasks " >
                        </form>
                    </div>
                    
                </li>
                <li class="field-navi-item">
                    <a href="#" class="navi-button"> 
                         delete task</a>
                   </li>
                <li class="field-navi-item">
                 <a href="/addTask" class="navi-button">
                      add task</a>
                </li>
            </ul>
           </header>
           <section class="task-background">
               <ul class="task-list">
                   <li class="task-list-item" id="completed-item">
                    <div id="completed">
                        completed
                    </div>
                   </li>
                <?php if (isset($tasks))foreach ($tasks as $task): ?>
                <li class="task-list-item">
                    <label class="form-control">
                        <input type="checkbox" name="checkbox" id="task-checkbox" />
                        <span class="checkmark"></span>
                    </label>
                    
                 <a href="#" class="task-button">
                     <?= $task->getDescription(); ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
    
           </section>
       </main>
    </div>
</body>