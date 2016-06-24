<?php
include('header.php');
?>
  <body>
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Connexion</h1>
    <form>
      <div class="input-container">
        <input type="text" id="login" required="required"/>
        <label for="login">Pseudo</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="pass" required="required"/>
        <label for="pass">Mot de passe</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button type="submit" class="btn btn-default" name="action"><span>Connexion</span></button>
      </div>
    </form>
  </div>
  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Inscription
      <div class="close"></div>
    </h1>
    <form>
      <div class="input-container">
        <input type="text" id="login" required="required"/>
        <label for="login">Pseudo</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="pass1" required="required"/>
        <label for="pass">Mot de passe</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="pass2" required="required"/>
        <label for="pass2">Confirmez votre mot de passe</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" id="mail" required="required"/>
        <label for="mail">Adresse Email</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button type="submit" class="btn btn-default" name="action"><span>Suivant</span></button>
      </div>
    </form>
  </div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="vue/js/index.js"></script>  
        
<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

  
  </body>

