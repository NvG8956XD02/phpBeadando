<?php
    require_once("!Classes/mysql.php");
    session_start();
?>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Saját Classok-->
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


    <title>Jegykezelés - Bejelentkezés</title>
</head>
<style>
.darker{
    background-size: 100% 100%;
    background-color: rgba(0,0,0,.4);
    min-height: 100%;
}
.wallpaper{
    background:
        linear-gradient(180deg, rgba(248, 184, 139,0) 20%, rgba(248, 184, 139,.1) 20%, rgba(248, 184, 139,.1) 40%, rgba(248, 184, 139,.2) 40%, rgba(248, 184, 139,.2) 60%, rgba(248, 184, 139,.4) 60%, rgba(248, 184, 139,.4) 80%, rgba(248, 184, 139,.5) 80%),
        linear-gradient(45deg, rgba(250, 248, 132,.3) 20%, rgba(250, 248, 132,.4) 20%, rgba(250, 248, 132,.4) 40%, rgba(250, 248, 132,.5) 40%, rgba(250, 248, 132,.5) 60%, rgba(250, 248, 132,.6) 60%, rgba(250, 248, 132,.6) 80%, rgba(250, 248, 132,.7) 80%),
        linear-gradient(-45deg, rgba(186, 237, 145,0) 20%, rgba(186, 237, 145,.1) 20%, rgba(186, 237, 145,.1) 40%, rgba(186, 237, 145,.2) 40%, rgba(186, 237, 145,.2) 60%, rgba(186, 237, 145,.4) 60%, rgba(186, 237, 145,.4) 80%, rgba(186, 237, 145,.6) 80%),
        linear-gradient(90deg, rgba(178, 206, 254,0) 20%, rgba(178, 206, 254,.3) 20%, rgba(178, 206, 254,.3) 40%, rgba(178, 206, 254,.5) 40%, rgba(178, 206, 254,.5) 60%, rgba(178, 206, 254,.7) 60%, rgba(178, 206, 254,.7) 80%, rgba(178, 206, 254,.8) 80%),
        linear-gradient(-90deg, rgba(242, 162, 232,0) 20%, rgba(242, 162, 232,.4) 20%, rgba(242, 162, 232,.4) 40%, rgba(242, 162, 232,.5) 40%, rgba(242, 162, 232,.5) 60%, rgba(242, 162, 232,.6) 60%, rgba(242, 162, 232,.6) 80%, rgba(242, 162, 232,.8) 80%),
        linear-gradient(180deg, rgba(254, 163, 170,0) 20%, rgba(254, 163, 170,.4) 20%, rgba(254, 163, 170,.4) 40%, rgba(254, 163, 170,.6) 40%, rgba(254, 163, 170,.6) 60%, rgba(254, 163, 170,.8) 60%, rgba(254, 163, 170,.8) 80%, rgba(254, 163, 170,.9) 80%);
    background-color: rgb(254, 163, 170);
    background-size: 100% 100%;
    min-height: 100%;
}
</style>
<body class="wallpaper">
<div class="p-3 darker">
    <div class="col mt-5 d-flex justify-content-center">
        <div class="card text-white bg-dark w-25 mb-3 d-flex justify-content-center opacity-2">
            <article class="card-body">
                <h4 class="card-title mb-4 mt-1">Bejelentkezés</h4>
                <form method="POST" action="">
                    <div class="form-group">
                    	<label>Felhasználónév</label>
                        <input name="fn" id="fn" class="form-control" placeholder="Karcsi" type="text">
                    </div> 
                    <div class="form-group">
                    	<label>Jelszó</label>
                        <input name="pw" id="pw" class="form-control" placeholder="12345" type="password">
                    </div> 
                    <div class="form-group">
                        <button name="Nyom" type="submit" class="btn btn-primary btn-block">Nyomesz</button>
                    </div>                                                           
                </form>
            </article>
        </div>
    </div>
    <br>
        <?php
            $db = new Mysql("proba");
            if(isset($_POST['Nyom'])){
                if(empty($_POST["fn"]) || empty($_POST["pw"]))
                {
                    echo "<div class='mx-auto w-25 bg-primary text-light d-flex justify-content-center rounded-25'>Nincs rendesen kitöltve</div>";
                    header('refresh: 2');
                    exit();
                }
                else{
                    $username = $_POST["fn"];
                    $password = $_POST["pw"];
                    $sql = "SELECT * FROM adminos WHERE loginName='".$username."' and jelszo='".$password."' LIMIT 1";
                    $results = $db->queryNUMERIC($sql);

                    if(count($results) == 1){
                        echo "<div class='mx-auto w-25 bg-primary text-light d-flex justify-content-center rounded-25'>A bejelentkezés sikeres volt...</div>";

                        $_SESSION["fn"] = $username;
                        header('Location:in.php');
                        exit();
                    }
                    else{
                        echo "<div class='mx-auto w-25 bg-primary text-light d-flex justify-content-center rounded-25'>A bejelentkezés sikertelen volt...</div>";
                        header('refresh: 3');
                        exit();
                    }
                }
            }
        ?>
</div>
</body>
</html>