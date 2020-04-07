#include "alarme.h"
#include <Arduino.h>

//-------------------------------------------------------------------------------
//methode permettant d'allumer l'alarme (LED + BUZZER)

int alarme::allumerAlarme()
{
  const int L1 = 9; // broche 10 du micro-contrôleur se nomme maintenant : L1
  const byte BUZZER = 10; // broche 9 du micro-contrôleur se nomme maintenant : BUZZER
  
  digitalWrite(L1, HIGH); //allumer L1
  delay(350); // attendre 1 seconde
  digitalWrite(L1, LOW); // Eteindre L1
  delay(350); // attendre 2 seconde 
    
  tone(BUZZER,500,50);
  delay(100);
  tone(BUZZER,500,50);
  delay(100);
  tone(BUZZER,500,50);
  delay(100);
}

//-------------------------------------------------------------------------------
//methode permettant d'eteindre l'alarme (LED + BUZZER)

int alarme::eteindreAlarme()
{
  const int L1 = 9; // broche 10 du micro-contrôleur se nomme maintenant : L1
  const byte BUZZER = 10; // broche 9 du micro-contrôleur se nomme maintenant : BUZZER
  
  digitalWrite(L1, LOW); // Eteindre L1  
  noTone(9); //Eteindre BUZZER
}
