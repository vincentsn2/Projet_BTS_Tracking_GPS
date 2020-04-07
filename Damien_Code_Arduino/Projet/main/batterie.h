#ifndef _BATTERIE_H
#define _BATTERIE_H
#include <Arduino.h>

class batterie
{
  private :
  int valeurpotBatterie;// variable de mémorisation du résultat brut du potentiométre
  int batterie;//niveau de batterie en %

  public:
  LireBatterie();
  getBatterie();
};

#endif
