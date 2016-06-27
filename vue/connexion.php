<?php
include('header.php');
?>
  <body>
<div id="myModal" class="reveal-modal">
       <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Connexion</h2>

  <form class="form-horizontal" role="form" method="post">
    <p><input type="text" name="login" id="login" placeholder="Pseudo"></p>
    <p><input type="password" name="pass" id="pass" placeholder="Mot de passe"></p>
    <p><input type="submit" name="action" value="Connexion"></p>
  </form>
</div>
       <a class="close-reveal-modal">&#215;</a>
  </div>

<?php
include 'footer.php';
?>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  </body>

