<?php
include('header.php');
?>
  <body>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="myModalLabel">Connexion</h4>
  </div>
  <div class="modal-body">
  <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Connexion</h2>

  <form class="form-horizontal" role="form" method="post">
    <p><input type="text" name="login" id="login" placeholder="Pseudo"></p>
    <p><input type="password" name="pass" id="pass" placeholder="Mot de passe"></p>
    <p><input type="submit" name="action" value="Connexion"></p>
  </form>
  </div>
  </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

</div>
<?php
include 'footer.php';
?>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  </body>

