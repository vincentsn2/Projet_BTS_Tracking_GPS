#include "sondeur.h"
#include <Arduino.h>

//-------------------------------------------------------------------------------
//methode permettant de lire les valeurs de profondeur et de vitesse du sondeur

float sondeur::LireSondeur()
{
  int potentiometreProfondeur = A0;//un potentiomètre connectée sur la PIN analogique 0
  int potentiometreVitesse = A1;//un potentiomètre connectée sur la PIN analogique 1
  
  float valeurpotProfondeur = analogRead(potentiometreProfondeur);
  float valeurpotVitesse = analogRead(potentiometreVitesse); 

  profondeur = valeurpotProfondeur / 51.15;  
  vitesse = valeurpotVitesse / 68.2;
}

//-------------------------------------------------------------------------------
//methode permettant de réutiliser la valeur de profondeur 

float sondeur::getProfondeur()
{
  return this->profondeur;
}

//-------------------------------------------------------------------------------
//methode permettant de réutiliser la valeur de vitesse 

float sondeur::getVitesse()
{
  return this->vitesse;
}
