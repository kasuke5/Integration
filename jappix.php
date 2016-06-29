<?php 
     
     include_once("modele/events.php");
        $nom = $_SESSION['login'];
        $passwd = $_SESSION['passwordpass'];
       # $salon = get_event_by_name($events)."@muc.eventizi.itinet.fr";
 ?>
 
<?php
    if(isset($_SESSION["id_user"])) 
      {
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
        <!-- <script type="text/javascript" >
        jQuery.getScript('http://chat.eventizi.itinet.fr/server/get.php?l=fr&t=js&g=mini.xml', function() {
        JappixMini.disconnect();
        });
        </script>/-->      
        <script src="vue/js/japix.js"></script>
<?php        
      }
?>