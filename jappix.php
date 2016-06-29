 <?php
 include_once("modele/co_in.php");
include_once("modele/events.php");
include_once("modele/connexion_bdd.php");
?>
<?php
    if(isset($_SESSION["id_user"])) 
      {
      	
        $nom = $_SESSION["login"];
        $passwd = $_SESSION["password"];
        var_dump($nom);
        var_dump($passwd);
?>
          <script type="text/javascript">
          jQuery.ajaxSetup({cache: true});
          jQuery.getScript('http://chat.eventizi.itinet.fr/server/get.php?l=fr&t=js&g=mini.xml', function() {
          JappixMini.launch({
          connection: {
            domain: 'eventizi.itinet.fr',
            user: '<?php echo $nom; ?>',
            password: '<?php echo $passwd; ?>', 
            resource: 'eventizi chat'
          },

          application: {
            network: {
              autoconnect: false
            },

            interface: {
              showpane: true,
              animate: true
            },

            user: {
              random_nickname: false
            },

            chat: {
              suggest: ['admin@eventizi.itinet.fr']
            },
            groupchat: {
              open: ['']
            },
    
            }
          });
      });
          </script>
    
<?php      
      }else 
      {  
?>       
        <script src="vue/js/japix.js"></script>
<?php        
      }
?>