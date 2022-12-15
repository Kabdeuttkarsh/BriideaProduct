<?php

require __DIR__ . "/../vendor/autoload.php";

use Chat\Chat;

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

$server = IoServer::factory(new HttpServer(new WsServer(new Chat)), 2000);

$server->run();

?>
<script type="text/javascript">
 conn.sendMsg("Hii.");

var conn = new Connection2(Broadcast.BROADCAST_URL+":"+Broadcast.BROADCAST_PORT);

var Connection2 = (function(){

  function Connection2(url) {


      this.open = false;

      this.socket = new WebSocket("wss://" + url);
      
      this.setupConnectionEvents();

    }

  Connection2.prototype = {
    
    setupConnectionEvents : function () {
          var self = this;

          self.socket.onopen = function(evt) { self.connectionOpen(evt); };
          self.socket.onmessage = function(evt) { self.connectionMessage(evt); };
          self.socket.onclose = function(evt) { self.connectionClose(evt); };
      },

      connectionOpen : function(evt){
          this.open = true;
    
          console.log("connection Established");
    },
      connectionMessage : function(evt){
          var data = JSON.parse(evt.data);
         console.log(data.msg);
   
        console.log("Message Sent");
      },
      connectionClose : function(evt){
          this.open = false;
       
           console.log("Disconnected");
            
      },

      sendMsg : function(message){
        
          this.socket.send(JSON.stringify({
              msg : message
          }));

     
      },


    };

    return Connection2;

})();
  


</script>