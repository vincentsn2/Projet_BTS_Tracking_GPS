#include <SPI.h>
#include <Wire.h>
#include <Adafruit_GFX.h>
#include <Adafruit_SSD1306.h>

#define OLED_RESET 4
Adafruit_SSD1306 display(OLED_RESET);

int potentiometreProfondeur = A0;//un potentiomètre connectée sur la PIN analogique 0
int valeurpotProfondeur = 0;// variable de mémorisation du résultat brut d potentiométre

int potentiometreVitesse = A1;//un potentiomètre connectée sur la PIN analogique 1
int valeurpotVitesse = 0;// variable de mémorisation du résultat brut d potentiométre

int potentiometreBatterie = A2;//un potentiomètre connectée sur la PIN analogique 2
int valeurpotBatterie = 0;// variable de mémorisation du résultat brut d potentiométre

float profondeur;//profondeur en mètre
float vitesse;//vitesse du bateau en noeuds 
int batterie;//niveau de batterie en pourcentage

const int L1 = 10; // broche 10 du micro-contrôleur se nomme maintenant : L1

const byte BUZZER = 9; // broche 9 du micro-contrôleur se nomme maintenant : BUZZER

boolean anomalieProfondeur = false;
boolean anomalieVitesse = false;
boolean anomalieBatterie = false;

int nbAlerteProfondeur = 0;
int nbAlerteVitesse = 0;
int nbAlerteBatterie = 0;

void setup() {
  Serial.begin(9600);
   
  display.begin(SSD1306_SWITCHCAPVCC, 0x3C);
  display.clearDisplay();

  pinMode(L1, OUTPUT); //L1 est une broche de sortie

  pinMode(BUZZER, OUTPUT);
}

void loop() {
  valeurpotProfondeur = analogRead(potentiometreProfondeur);
  profondeur = valeurpotProfondeur / 51.15;

  valeurpotVitesse = analogRead(potentiometreVitesse);
  vitesse = valeurpotVitesse / 68.2;

  valeurpotBatterie = analogRead(potentiometreBatterie);
  batterie = valeurpotBatterie / 10.23;

if (profondeur < 2)
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

  if(anomalieProfondeur == true && nbAlerteProfondeur == 0)
  {
    Serial.println("Attention une anomalie de profondeur est détectée sur un bateau!");
    nbAlerteProfondeur = 1;
  }
  else if(anomalieVitesse == true && nbAlerteVitesse == 0)
  {
     Serial.println("Attention une anomalie de vitesse est détectée sur un bateau!");
     nbAlerteVitesse = 1;
  }
  else if(anomalieBatterie == true && nbAlerteBatterie == 0)
  {
    Serial.println("Attention une anomalie de batterie est détectée sur un bateau!");
    nbAlerteBatterie= 1;  
  }
}
else
{
  digitalWrite(L1, LOW); // Eteindre L1  
  noTone(9);
  
  nbAlerteProfondeur = 0;
  nbAlerteVitesse = 0;
  nbAlerteBatterie = 0;
}
}
