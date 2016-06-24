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
        <button><span>Connexion</span></button>
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
        <button><span>Suivant</span></button>
      </div>
    </form>
  </div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="vue/js/index.js"></script>  
  
  </body>

