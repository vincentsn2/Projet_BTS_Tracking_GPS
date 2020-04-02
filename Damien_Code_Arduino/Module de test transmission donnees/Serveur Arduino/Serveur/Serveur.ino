#include <GSM.h>

// Numéro du PIN
#define PINNUMBER ""

// APN data
#define GPRS_APN       "GPRS_APN" // remplacer par GPRS APN
#define GPRS_LOGIN     "login"    // remplacer par GPRS login
#define GPRS_PASSWORD  "password" // remplacer par GPRS password

GPRS gprs;
GSM gsmAccess;     
GSMServer server(80); 

const unsigned long __TIMEOUT__ = 10 * 1000;

void setup() {
  Serial.begin(9600);
  while (!Serial) {
    ; 
  }

  // Statue de connexion
  bool notConnected = true;

  // Démarrage du Shield GSM
  // Si votre SIM a un code PIN, passez-le comme paramètre de begin() entre guillemets
  while (notConnected) {
    if ((gsmAccess.begin(PINNUMBER) == GSM_READY) &
        (gprs.attachGPRS(GPRS_APN, GPRS_LOGIN, GPRS_PASSWORD) == GPRS_READY)) {
      notConnected = false;
    } else {
      Serial.println("Not connected");
      delay(1000);
    }
  }

  Serial.println("Connected to GPRS network");

  // start server
  server.begin();

  //Get IP.
  IPAddress LocalIP = gprs.getIPAddress();
  Serial.println("Server IP address=");
  Serial.println(LocalIP);
}

void loop() {


  // listen for incoming clients
  GSMClient client = server.available();



  if (client) {
    while (client.connected()) {
      if (client.available()) {
        Serial.println("Receiving request!");
        bool sendResponse = false;
        while (char c = client.read()) {
          if (c == '\n') {
            sendResponse = true;
          }
        }

        // if you've gotten to the end of the line (received a newline
        // character)
        if (sendResponse) {
          // send a standard http response header
          client.println("HTTP/1.1 200 OK");
          client.println("Content-Type: text/html");
          client.println();
          client.println("<html>");
          // output the value of each analog input pin
          for (int analogChannel = 0; analogChannel < 6; analogChannel++) {
            client.print("analog input ");
            client.print(analogChannel);
            client.print(" is ");
            client.print(analogRead(analogChannel));
            client.println("<br />");
          }
          client.println("</html>");
          //necessary delay
          delay(1000);
          client.stop();
        }
      }
    }
  }
}
