#include "ecran.h"
#include <Arduino.h>

#include <SPI.h>
#include <Wire.h>
#include <Adafruit_GFX.h>
#include <Adafruit_SSD1306.h>

#define OLED_RESET 4
Adafruit_SSD1306 display(OLED_RESET);


//-------------------------------------------------------------------
// methode permettant d'initialiser l'ecran au démarrage

int ecran::InitialisationEcran()
{
    display.begin(SSD1306_SWITCHCAPVCC, 0x3C);
    display.clearDisplay();
    display.display();   
}

//-------------------------------------------------------------------
// methode permettant d'afficher les donnees et les anomalies sur l'ecran

int ecran::AffichageDonneesAnomalies(float profondeur, float vitesse, int batterie)
{
    if(profondeur < 2)
    {
      display.clearDisplay();
      display.setTextSize(1.5);
      display.setTextColor(WHITE);
      display.setCursor(0, 0);
      display.println("ANOMALIE PROFONDEUR !"); 
      anomalieProfondeur = true;
    }
    else
    {
      display.setTextSize(1);
      display.setTextColor(WHITE);
      display.setCursor(0, 0);
      display.print("Profondeur: "); 
      display.print(profondeur);
      display.println(" m"); 
      anomalieProfondeur = false;
    }

    if (vitesse > 12)
    {
      display.setTextSize(1.5);
      display.setTextColor(WHITE);
      display.setCursor(0, 10);
      display.println("ANOMALIE VITESSE !"); 
      anomalieVitesse = true;  
    }
    else
    {
      display.setTextSize(1);
      display.setTextColor(WHITE);
      display.setCursor(0, 10);
      display.print("Vitesse: "); 
      display.print(vitesse);
      display.println(" noeud");  
      anomalieVitesse = false;
    }

    if (batterie < 10)
    {
      display.setTextSize(1.5);
      display.setTextColor(WHITE);
      display.setCursor(0, 20);
      display.println("ANOMALIE BATTERIE !"); 
      anomalieBatterie = true;
    }
    else
    {
      display.setTextSize(1);
      display.setTextColor(WHITE);
      display.setCursor(0, 20);
      display.print("Batterie: "); 
      display.print(batterie);
      display.println(" %"); 
      anomalieBatterie = false;  
    }

    display.display();
    display.clearDisplay();

    if(anomalieProfondeur == true || anomalieVitesse == true || anomalieBatterie == true)
    {
      alarm.allumerAlarme();

       if(anomalieProfondeur == true && nbAlerteProfondeur == 0)
       {
          Serial.println("Attention une anomalie de profondeur est détectée sur un bateau!");
          nbAlerteProfondeur = 1;
        }
        
        if(anomalieVitesse == true && nbAlerteVitesse == 0)
        {
           Serial.println("Attention une anomalie de vitesse est détectée sur un bateau!");
           nbAlerteVitesse = 1;
        }
        
        if(anomalieBatterie == true && nbAlerteBatterie == 0)
        {
          Serial.println("Attention une anomalie de batterie est détectée sur un bateau!");
          nbAlerteBatterie= 1;  
        }
      }
      else
      {
        alarm.eteindreAlarme();
        
        nbAlerteProfondeur = 0;
        nbAlerteVitesse = 0;
        nbAlerteBatterie = 0;
      }
}
