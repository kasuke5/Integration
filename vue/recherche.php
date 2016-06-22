<?php
include ('header.php');
?>
<div id="formulaire">

<h2 style="margin-top:80px">Recherche</h2>
   <form class="form-horizontal" role="form" method="post">
   
     <h3> Trouver un évènement </h3>
        <div class="form-group">                       
        <label class="control-label col-sm-2" for="login"></label>
        <div class="col-sm-5">
        <select id='c'>
                        <option value="0" selected >toutes catégories</option>
                        <?php for($i=0;$i<count($categories);$i++){
                                    echo"<option value='".$categories[$i]["categorie_id"]."'>".$categories[$i]["categorie_name"]."</option>";
                                }
                                echo "</select>";
                                ?>
        <div class="input-group">
          <input type="text" name="recherche" id="recherche" required class="form-control" id="login" placeholder="Entrez du texte">
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit" style="padding-left: 15px; padding-right: 15px; margin-left: -20px;z-index:10;"><i class="glyphicon glyphicon-search"></i></button>
          </div>
        </div>
        </div>
      </div>
    </form>
</div>
        <!-- /.row -->

        <?php
          for($i=0;$i<count($events);$i++){
            $user = GetLoginById($events[$i]["event_organisateur"]);
              echo"<div id='events'>
              <div class='row'>
              <div class='col-md-7'>
                  <a href='#''>
                      <img class='img-responsive' src='../img/".$user["user_login"]."/".$events[$i]["event_title"]."/event.jpg' alt=''>
                  </a>
              </div>
              <div class='col-md-13'>
                  <h4>".$events[$i]["event_title"]."</h4>
                  <h3>Cet évènement commence le ".$events[$i]["event_date_debut"]."</h3>
                  <p>".$events[$i]["event_description"]."</p>
                  <a class='btn btn-primary' href='http://".$events[$i]["event_title"].".eventizi.itinet.fr''>View Project <span class='glyphicon glyphicon-chevron-right'></span></a>
              </div>
          </div>
          <!-- /.row -->

          <hr>";
          }
            ?>
          </div>





        

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

        <hr>

<?php include ('footer.php');?>


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

<script type="text/javascript">
          var c = $('#c').val();
          $('#c').change(function(){
            c = $("#c").val();
        });


          

            $(document).ready(function() {
                    $('#recherche').autocomplete({
                      source: function(request, response){
                        $.ajax({
                            url : "vue/liste.php",
                            dataType: "json",
                            data: {
                                term: request.term,
                                categorie: c
                            },
                     success: function(data) {
                        response(data);
                     }
                    });

            }

            });
            });




            $(document).ready(function() {
              $("#submit").click(function(e){
                e.preventDefault();
                $("#events").html("");
                  $.get(
                          'vue/liste.php',
                          {
                            query : $("#recherche").val(),
                            categorie: c
                          },

                          function(data){
                            $("#events").html(data);
                            },
                            'html'
                            );
                          });





            

              });
        </script>
