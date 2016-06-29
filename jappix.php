
 
<?php
    if(isset($_SESSION["id_user"])) 
      {
      	include_once("modele/events.php");
        $nom = $_SESSION["login"];
        $passwd = $_SESSION["passwordpass"];
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