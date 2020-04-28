#include "ecran.h"
#include "sondeur.h"
#include "batterie.h"

void setup() 
{
  Serial.begin(9600);

  ecran initialisation;
  initialisation.InitialisationEcran();
}

void loop() 
{
  sondeur sondeur;
  sondeur.LireSondeur();

  batterie batterie;
  batterie.LireBatterie();

  ecran ecran;
  ecran.AffichageDonneesAnomalies(sondeur.getProfondeur(), sondeur.getVitesse(), batterie.getBatterie());
}
