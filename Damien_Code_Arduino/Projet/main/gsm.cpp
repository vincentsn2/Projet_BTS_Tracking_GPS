#include "gsm.h"
#include <Arduino.h>
#include <DFRobot_sim808.h>
#include <SoftwareSerial.h>

DFRobot_SIM808 sim808(&Serial);

char http_cmd[] = "GET /media/uploads/mbed_official/hello.txt HTTP/1.0\r\n\r\n";
char buffer[512];

//-------------------------------------------------------------------------------
//Méthode permettant d'envoyer des informations avec le shield grace a une connexion TCP 

int gsm::envoiTCP()
{   
  //******** Initialisation du module SIM 808 *************
  while(!sim808.init()) {
      delay(1000);
      Serial.print("Sim808 init error\r\n");
  }
  delay(3000);  
      
  //*********** Tentative de connexion en DHCP *******************
  while(!sim808.join(F("cmnet"))) {
      Serial.println("Sim808 join network error");
      delay(2000);
  }
  
  //************ Connexion DHCP établie ****************
  Serial.print("IP Address is ");
  Serial.println(sim808.getIPAddress());
  
  //*********** Connexion TCP étbalie ************
  if(!sim808.connect(TCP,"mbed.org", 80)) {
      Serial.println("Connect error");
  }else{
      Serial.println("Connect mbed.org success");
  }
  
  //*********** Envoi d'une requete GET *****************
  Serial.println("waiting to fetch...");
  sim808.send(http_cmd, sizeof(http_cmd)-1);
  while (true) {
      int ret = sim808.recv(buffer, sizeof(buffer)-1);
      if (ret <= 0){
          Serial.println("fetch over...");
          break; 
      }
      buffer[ret] = '\0';
      Serial.print("Recv: ");
      Serial.print(ret);
      Serial.print(" bytes: ");
      Serial.println(buffer);
      break;
    }
  
    //************* Fin de la connexion TCP et DHCP **********
    sim808.close();
  
    //*** Déconnexion du module SIM 808 *******
    sim808.disconnect();
  } 

//-------------------------------------------------------------------------------
//Méthode permettant de recevoir des informations avec le shield grace a une connexion TCP 
