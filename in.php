<?php
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

    <title>Jegykezelés</title>
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
<script type='text/javascript'>
    $(document).ready(function() {
        $('#content').html("<p class='d-flex justify-content-center'>Válasszon valamelyik lehetőség körül...</p>");

        $('#show').click(function() {
            $('#content').load('show.php');
        });

        $('#insert').click(function() {
            $('#content').load('insert.php');
        });

    });
</script>
<body class="wallpaper">
    <div class="p-3 darker">
        <div class='container-fluid h-50 w-100 '>
            <div class='row'>
                <div class="col-12 p-0 m-0">
                    <?php
                        echo "<p class='bg-primary text-dark p-2 rounded' id='fejlec'>Üdvözlet ". $_SESSION["fn"] ."... <a class='bg-secondary text-light p-2 rounded float-right' href='logout.php'>Kijelentkezés</a></p>";
                    ?> 
                </div>
                <div class="col-2 bg-dark text-light rounded">
                    <ul class="list-group m-3 d-inline-flex">
                        <li class='list-group-item list-group-item-action list-group-item-dark' id='show'>Jegy listázása</li>
                        <li class='list-group-item list-group-item-action list-group-item-dark' id='insert'>Jegy rögzítése</li>
                    </ul>
                    <div class="bg-primary text-light p-2 justify-content-center rounded translate-middle invisible" id='jeh'>

                    </div>
                </div>
                <div class='col-10 p-3 bg-danger text-light rounded' id='content'>

                </div>
            </div>
        </div>
    </div>
</body>
</html>