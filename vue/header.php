<!DOCTYPE html>
<html lang="fr">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Event'izi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="vue/css/style.css">
  <link rel="stylesheet" href="vue/css/bootstrap.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script>(function($) {
    if (!$.curCSS) {
       $.curCSS = $.css;
    }
})(jQuery);</script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>
  <!--JS Bootstrap-->
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <!--<link rel="stylesheet" href="vue/css/perso.css">-->

  <!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>

<!-- font awesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<!-- animate.css -->
<link rel="stylesheet" href="vue/assets/animate/animate.css" />
<link rel="stylesheet" href="vue/assets/animate/set.css" />

<!-- gallery -->
<link rel="stylesheet" href="vue/assets/gallery/blueimp-gallery.min.css">

<!-- favicon -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">


<link rel="stylesheet" href="vue/assets/style.css">

<?php 
include ('jappix.php');
?>

<style>
.autocomplete-suggestions {
font-weight: light;
border: 2px solid #3079ED;
background: white ;
overflow: auto;
border-top-left-radius: 5pt 5pt;
border-bottom-left-radius: 5pt 5pt;
border-top-right-radius: 5pt 5pt;
border-bottom-right-radius: 5pt 5pt;
 }
.autocomplete-suggestion { font-weight: light; padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #D4E3FB; }
.autocomplete-suggestions strong { font-weight: bold; color: black; }
</style>
<style>
/*Style general de la page
body {font:14px verdana, sans-serif;background:#000000;color:#C0C0C0;font-weight:bold;}
/*Styles relatifs à la shadow box*/
/*Style du masque recouvrant la page au chargement de la shadow box*/
#page {position:absolute;left:0;top:0;z-index:9000;background-color:#000;display:none;}
/*Positionnement et dimensions de la shadow box*/
#boxes .window {position:absolute;left:0;top:0;width:440px;height:200px;display:none;z-index:9999;padding:20px;}
#boxes #dialog {width:375px;height:203px;padding:10px;color:#00008B;border:3px solid #fff;background-color:#C0C0C0;}
/*Style du bouton*/
.shadowbox{position:absolute;left:50%;top:50%;width:100px;}
</style>
</head>
<body>
<div class="topbar animated fadeInLeftBig"></div>

<!-- Header Starts -->
<div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
            <h2 style="color:orange;margin:18px auto auto;">Event'izi</h2>


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>
      <!-- Nav Starts -->

      <!--Il faut mettre variable php pour <li class="active" selon la page -->
      <div class="navbar-collapse  collapse">
        <ul class="nav navbar-nav navbar-right scroll">
            <li class="active"><a href="/">Accueil</a></li>
            <?php
            if(isset($_SESSION["id_user"])){
              echo'<li><a href="/recherche">Recherche</a></li><li><a href="/tableau_bord">Mes évènements</a></li><li><a href="/deconnexion">Se déconnecter</a></li><li><a href="http://mail.eventizi.itinet.fr" target="_blank">Boîte Mail</a></li> ';
            }else{
              #echo'<li><a href="/connexion">Connexion</a></li><li><a href="/inscription">Inscription</a></li></div>';
              echo '<title>Concevoir facilement une shadow box, jQuery</title>
<!--Bouton de la page-->
<input type="button" value="Shadow box" class="shadowbox" />
<!--Div incluant la box et le masque-->
<div id="boxes"/>
<!--La box-->
<div id="dialog" class="window"/>
<center> 
 
<input type="button" class="close" value="Quitter" />
</center>
</div>
<!--Le masque-->
<div id="page">
</div>
</div>';
            }
            ?>
              <!-- Bouton execution modal -->


              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

      </div>
    </div>
<!-- #Header Starts -->
</body>


       

