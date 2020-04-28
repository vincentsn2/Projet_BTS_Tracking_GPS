// libraries
#include <GSM.h>

// PIN Number
#define PINNUMBER ""

// APN data
#define GPRS_APN       "GPRS_APN" // remplacer par GPRS APN
#define GPRS_LOGIN     "login"    // remplacer par GPRS login
#define GPRS_PASSWORD  "password" // remplacer par GPRS password

GSMClient client;
GPRS gprs;
GSM gsmAccess;

// URL, path & port (par exemple: arduino.cc)
char server[] = "arduino.cc";
char path[] = "/asciilogo.txt";
int port = 80;

void setup() {
  Serial.begin(9600);
  while (!Serial) {
    ; 
  }

  Serial.println("Starting Arduino web client.");
  // Statue de connexion
  bool notConnected = true;

  // Après avoir démarré le modem avec GSM.begin ()
  // attachez le shield au réseau GPRS avec l'APN, l'identifiant et le mot de passe
  while (notConnected) {
    if ((gsmAccess.begin(PINNUMBER) == GSM_READY) &
        (gprs.attachGPRS(GPRS_APN, GPRS_LOGIN, GPRS_PASSWORD) == GPRS_READY)) {
      notConnected = false;
    } else {
      Serial.println("Not connected");
      delay(1000);
    }
  }

  Serial.println("connecting...");

  // if you get a connection, report back via serial:
  if (client.connect(server, port)) {
    Serial.println("connected");
    // Make a HTTP request:
    client.print("GET ");
    client.print(path);
    client.println(" HTTP/1.1");
    client.print("Host: ");
    client.println(server);
    client.println("Connection: close");
    client.println();
  } else {
    // if you didn't get a connection to the server:
    Serial.println("connection failed");
  }
}

void loop() {
  // if there are incoming bytes available
  // from the server, read them and print them:
  if (client.available()) {
    char c = client.read();
    Serial.print(c);
  }

  // if the server's disconnected, stop the client:
  if (!client.available() && !client.connected()) {
    Serial.println();
    Serial.println("disconnecting.");
    client.stop();

    // do nothing forevermore:
    for (;;)
      ;
  }
}
