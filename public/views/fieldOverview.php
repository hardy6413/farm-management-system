<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/farms.css">
    <link rel="stylesheet" type="text/css" href="/public/css/overview.css">
    <link rel="stylesheet" type="text/css" href="/public/css/field.css">
    <link rel="stylesheet" type="text/css" href="/public/css/tasks.css">
    <script src="https://kit.fontawesome.com/a781b65e9b.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/public/js/NavigationDisplaying.js" defer></script>
    <script type="text/javascript" src="/public/js/actionDescription.js" defer></script>
    <title>Field</title>
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
                        <div>
                            <input placeholder="search action " >
                        </div>
                    </div>

                </li>
                <li class="field-navi-item">
                 <a href="#" class="navi-button">
                      add field</a>
                </li>
            </ul>
           </header>
           <section class="field-data-background">
               <?php if (isset($field)) : ?>
            <div class="field-data">
                <img src="/public/uploads/<?= $field->getImage(); ?>" class="field-picture" id="field-description-picture">
                <div class="field-data-container">
                    <h2 class="field-data-info">
                        Block number : <?= $field->getBlockNumber(); ?>
                    </h2>
                    <h2 class="field-data-info">
                        Field name : <?= $field->getName(); ?>
                    </h2>
                    <h2 class="field-data-info">
                        Last action :
                    </h2>
                    <h2 class="field-data-info">
                        Date :
                    </h2>
                    <h2 class="field-data-info">
                        Area : <?= $field->getArea(); ?>
                    </h2>
                    <h2 class="field-data-info">
                        Rent :
                    </h2>
                    <a href="#" class="field-options" id="field-options-click">
                        Inspect on map
                       </a>
                </div>

            </div>

            <div class="action-info">
                <table class="actions-table">
                    <thead>
                    <tr>
                        <th class="table-head" id="date" >date</th>
                        <th class="table-head" id="action">action</th>
                        <th class="table-head" id="description">
                            <div>
                                description
                            </div></th>
                        <th class="table-head" id="tick-completed">completed</th>
                    </tr>
                    </thead>
                    <tbody id="action-rows">
                    <?php foreach ($field->getFieldActions() as $fieldAction): ?>
                    <tr class="action-row" id="<?= $fieldAction->getId(); ?>">
                        <td class="record" id="date">
                            <a href="#" class="action-button">
                                <?= $fieldAction->getCreatedAt(); ?>
                              </a>
                              </td>
                        <td class="record" id="action">
                            <a href="#" class="action-button">
                                <?=$fieldAction->getActionName();?>
                              </a>
                              </td>
                        <td class="record" id="description">
                            <a href="#" class="action-button">
                                <?= $fieldAction->getDescription(); ?>
                              </a>
                              </td>
                        <td class="record" id="tick-completed">
                            <label class="form-control" id="table-form-control">
                            <input type="checkbox" name="checkbox" id="task-checkbox" checked />
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="action-long-description">
                    <div class="action-buttons-navi">
                        <a href="#" class="field-action-button">
                            delete action
                        </a>
                        <a href="/createAction/<?= $field->getId(); ?>" class="field-action-button">
                            add action
                        </a>
                    </div>
                    <div class="action-description">

                    </div>


                </div>
            </div>
               <?php endif; ?>
           </section>
       </main>
    </div>
</body>