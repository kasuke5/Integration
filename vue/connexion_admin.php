<?php
include("header.php");
$_SESSION['admin'];
$admin;
?>
<div class="login" style="margin:80px auto auto">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Connexion Admin</h2>

  <form class="form-horizontal" role="form" method="post">
    <p><input type="text" name="login_admin" id="login" placeholder="Pseudo"></p>
    <p><input type="password" name="pass_admin" id="pass" placeholder="Mot de passe"></p>
    <p><input type="submit" name="action" value="Connexion"></p>
  </form>
</div>

<?php
include("footer.php");