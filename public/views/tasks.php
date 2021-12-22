<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/farms.css">
    <link rel="stylesheet" type="text/css" href="public/css/overview.css">
    <link rel="stylesheet" type="text/css" href="public/css/tasks.css">
    <script src="https://kit.fontawesome.com/a781b65e9b.js" crossorigin="anonymous"></script>
    <title>Tasks</title>
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
                 <a href="#" class="navi-button"> 
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
                <li class="task-list-item">
                    <label class="form-control">
                        <input type="checkbox" name="checkbox" id="task-checkbox" />
                        <span class="checkmark"></span>
                    </label>
                    
                 <a href="#" class="task-button"> 
                      add fieldeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeedeweeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeetesteeeeeeeeeeeeeee
                    </a>
                </li>
                <li class="task-list-item">
                    <label class="form-control">
                        <input type="checkbox" name="checkbox" id="task-checkbox" />
                        <span class="checkmark"></span>
                    </label>
                 <a href="#" class="task-button"> 
                      add field
                    </a>
                   </li>

                   <li class="task-list-item">
                    <label class="form-control">
                        <input type="checkbox" name="checkbox" id="task-checkbox" />
                        <span class="checkmark"></span>
                    </label>
                 <a href="#" class="task-button"> 
                      add field</a>
                   </li>

                   <li class="task-list-item">
                    <label class="form-control">
                        <input type="checkbox" name="checkbox" id="task-checkbox" />
                        <span class="checkmark"></span>
                    </label>
                    
                 <a href="#" class="task-button"> 
                      add field</a>
                   </li>
            </ul>
    
           </section>
       </main>
    </div>
</body>