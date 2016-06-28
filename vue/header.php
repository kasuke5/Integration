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
#boxes #dialog {width:400px;height:400px;padding:10px;color:#00008B;border:3px solid #fff;background-color:#C0C0C0;}
/*Style du bouton*/
.shadowbox{position:absolute;left:50%;top:50%;width:100px;}
</style>
<script type="text/javascript">
//Utilisé pour éviter le conflit avec d’autres plugins qui seraient liés
//à la page
jQuery.noConflict();
 
jQuery(document).ready(function() {
//Evénement lié au clic du bouton de la page
jQuery(".shadowbox").click(function() {
//Récupération des dimensions de la page
var xHeight = jQuery(document).height();
var xWidth = jQuery(window).width();
//Dimensionnement du masque recouvrant la page
jQuery("#page").css({"width":xWidth,"height":xHeight});
//Apparition du masque
jQuery("#page").fadeIn();
//Attribution à celui-ci d’une transparence de
//façon à laisser la page légèrement visible 
jQuery("#page").fadeTo("fast",0.6); 
var xH = jQuery(window).height();
var xW = jQuery(window).width();
//Centrage de la shadow box
jQuery("#dialog").css("top", xH/2-jQuery("#dialog").height()/2);
jQuery("#dialog").css("left", xW/2-jQuery("#dialog").width()/2);
//Apparition de la shadow box
jQuery("#dialog").fadeIn(); 
 
});
//Fermeture de la shadow box via le bouton qu’elle contient
jQuery(".window .close").click(function () {
jQuery("#page").hide();
jQuery(".window").hide(); 
}); 
}); 
</script>
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
              #echo'<li><a href="vue/modal.php">Connexion</a></li><li><a href="/inscription">Inscription</a></li></div>';
              echo'
              <li><a data-target="#modal-2" data-toggle="modal fade">Connexion</a></li>
              <div class="modal fade" id="modal-2" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->';
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


       

