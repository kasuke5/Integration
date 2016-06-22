<?php
include ('header.php');
?>

<!-- Slider Starts -->
<div id="myCarousel" class="carousel slide banner-slider animated bounceInDown" data-ride="carousel">     
      <div class="carousel-inner">
        <!-- Item 1 -->
      <div class="item active">
        <img src="../img/1.jpeg">
        <div class="carousel-caption">
          <h3 class="page-pres">Héberger votre évenement sportif</h3>
          <p class="page-pres">Eventizi c'est la champions league</p>
        </div>      
      </div>

     <div class="item">
        <img src="../img/2.jpg" >
        <div class="carousel-caption">
          <h3 class="page-pres">Soirée</h3>
          <p class="page-pres">Super soirée !</p>
        </div>      
      </div>
    
      <div class="item">
        <img src="../img/3.jpg">
        <div class="carousel-caption">
          <h3 class="page-pres">DJ</h3>
          <p class="page-pres">Faites vous connaitre !</p>
        </div>      
      </div>
    </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon-chevron-left"><i class="fa fa-angle-left"></i></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon-chevron-right"><i class="fa fa-angle-right"></i></span></a>
    </div>
<!-- #Slider Ends -->


<!-- Container (The Band Section) -->
<div id="band" class="container text-center">
  <img src="../img/eventizi.png">
    <p><em>Créer votre évènement devient facile !</em></p>
    <p>Event'Izi vous permet d'héberger votre évènement et dispose de nombreuses fonctionnalités permettant de le promouvoir facilement.
    Une plateforme où vous pouvez créer et héberger votre site web pour votre évènement
    </p>
    <p>Si vous avez une compétence particulière vous pouvez aussi vous mettre en avant et participer à des évènements</p>
    <br>
  <div class="pic">
    <div class="col-sm-3">
      <p class="text-center"><strong>Florian Dugat</strong></p><br>
        <img src="../img/flo.jpg" class="img-circle person" width="255" height="255">
        <p>Membre de l'équipe</p>
    </div>
  </div>
    <div class="col-sm-3">
      <p class="text-center"><strong>Jean-Christophe Thiburce</strong></p><br>
        <img src="../img/JC.jpg" class="img-circle person" width="255" height="255">
      </a>
        <p>Chef de projet</p>
    </div>
    <div class="col-sm-3">
      <p class="text-center"><strong>Guillaume Jaufret</strong></p><br>
        <img src="../img/gui.jpg" class="img-circle person" width="255" height="255">
        <p>Membre de l'équipe</p>
    </div>
  </div>
</div>


    <h3 class="text-center">NOS SERVICES</h3>
    <p class="text-center">Créer un site n'a jamais été aussi simple !</p>
    
<!-- works -->
<div id="works"  class=" clearfix grid"> 
    <figure class="effect-oscar  wowload fadeInUp">
          <img src="../img/postfix.png" alt="Postfix">
          <figcaption>
            <h2 class="page-pres">Postfix</h2>
            <p>Agent de transfert de courriel (SMTP)</p>
            <a href="http://www.postfix.org/">Voir site</a>
          </figcaption>
        </figure>
        <figure class="effect-oscar wowload fadeInUp">
          <img src="../img/envelope-silhouette-2.png" alt="rainloop">
          <figcaption>
            <h2 class="page-pres">Rainloop</h2>
            <p>Une boite de messagerie mail personnalisée (WebMail)</p>
            <a href="http://www.rainloop.net/">Voir site</a>
          </figcaption>
        </figure>
        <figure class="effect-oscar wowload fadeInUp">
          <img src="../img/WordPress.png" alt="Wordpress">
          <figcaption>
            <h2 class="page-pres">Wordpress</h2>
            <p>Création automatique d'un site wordpress</p>
            <a href="https://fr.wordpress.org/">Voir site</a>
          </figcaption>
        </figure>
        <figure class="effect-oscar wowload fadeInUp">
          <img src="../img/filezilla.png" alt="SFTP">
          <figcaption>
          <h2 class="page-pres">SFTP</h2>
          <p>Si vous avez déjà un site, vous pouvez importer tout vos fichier et avoir accès à un espace personnel sécurisé via SFTP</p>
          </figcaption>
        </figure>
        <figure class="effect-oscar wowload fadeInUp">
          <img src="../img/panneau.png" alt="Jappix">
          <figcaption>
            <h2 class="page-pres">Jappix</h2>
            <p>Pour pouvoir chatter à tout moment entre membre et participant d'un évènement ou bien avec les administrateurs du site pour tout probème</p>
            <a href="https://jappix.com/?l=fr">Voir site</a>
          </figcaption>
        </figure>
        <figure class="effect-oscar wowload fadeInUp">
          <img src="../img/Sans-titre-1.jpg" alt="FQDN">
          <figcaption>
            <h2 class="page-pres">FQDN</h2>
            <p>Votre adresse sera votre nom d'evenement .eventizi.itinet.fr</p>
          </figcaption>
        </figure>
</div> 


<div id="googleMap"></div>

<!-- Add Google Maps -->
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
var myCenter = new google.maps.LatLng(48.814346, 2.377839);

function initialize() {
var mapProp = {
center:myCenter,
zoom:15,
scrollwheel:false,
draggable:false,
mapTypeId:google.maps.MapTypeId.ROADMAP
};

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
position:myCenter,
});

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
</div>

<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title">Title</h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->    
</div>

<?php 
include ('footer.php');
?>