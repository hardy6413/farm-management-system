
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/farms.css">
    <link rel="stylesheet" type="text/css" href="public/css/overview.css">
    <script src="https://kit.fontawesome.com/a781b65e9b.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/./public/js/EmptyFormValidation.js" defer></script>
    <script type="text/javascript" src="/./public/js/NavigationDisplaying.js" defer></script>
    <title>add field</title>
</head>

<body>
    <div class="base-container">
        <?php include('leftNavi.php')?>
       <main>
           <?php include('upperNavi.php')?>
           <header>
           </header>
           <section class="create-farm-form">
            <form action="addField" method="POST" ENCTYPE="multipart/form-data" id="field-form" name="standard-form">
                <div class="messages">
                    <?php if(isset($messages)){
                        foreach ($messages as $message){
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="name" type="text" placeholder="field name">
                <textarea name="description" rows=5 placeholder="field description"></textarea>
                <input name="area" type="number"  step="0.01" placeholder="area">
                <input name="extra-payment" type="number"  step="0.01" placeholder="extra payment">
                <input name="block-number" type="text" placeholder="block number">
                <div>
                    <label>Owner</label>
                    <input name="is-property" type="checkbox" value="true" id="is-property-checkbox">
                </div>

                <input type="file" name="file"/><br/>
                <button type="submit">add field</button>
            </form>
               
           </section>
       </main>
    </div>
</body>