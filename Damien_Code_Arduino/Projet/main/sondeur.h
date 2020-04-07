#ifndef _SONDEUR_H
#define _SONDEUR_H
#include <Arduino.h>

class sondeur
{
  private :
  int valeurpotProfondeur;// variable de mémorisation du résultat brut d potentiométre
  int valeurpotVitesse;// variable de mémorisation du résultat brut d potentiométre

  float profondeur;//profondeur en mètre
  float vitesse;//vitesse du bateau en noeuds 

  public : 
  float LireSondeur();
  float getProfondeur();
  float getVitesse();
};

#endif
