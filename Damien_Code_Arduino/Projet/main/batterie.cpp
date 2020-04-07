#include "batterie.h"
#include <Arduino.h>

//-------------------------------------------------------------------------------
//Methode permettant de lire le niveau de charge de la batterie 

int batterie::LireBatterie()
{
  int potentiometreBatterie = A2;//un potentiomètre connectée sur la PIN analogique 0
  
  valeurpotBatterie = analogRead(potentiometreBatterie);

  batterie = valeurpotBatterie / 10.23;
}

//-------------------------------------------------------------------------------
//methode permettant de réutiliser la valeur de niveau de batterie 

int batterie::getBatterie()
{
  return this->batterie;
}
