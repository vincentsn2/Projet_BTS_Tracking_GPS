#ifndef _ECRAN_H
#define _ECRAN_H
#include <Arduino.h>
#include "sondeur.h"
#include "batterie.h"
#include "alarme.h"

class ecran
{
  private :
  alarme alarm;//déclaration de la classe alarme afin d'utiliser ses méthodes dans la class écran

  boolean anomalieProfondeur;
  boolean anomalieVitesse;
  boolean anomalieBatterie;

  int nbAlerteProfondeur;
  int nbAlerteVitesse;
  int nbAlerteBatterie;
  
  public :
  InitialisationEcran();
  AffichageDonneesAnomalies(float profondeur, float vitesse, int batterie);
};

#endif
