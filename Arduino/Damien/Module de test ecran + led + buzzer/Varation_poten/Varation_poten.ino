int potentiometre = A0;//la consigne du potentiomètre connectée sur la PIN analogique 0
int valeurpot = 0;// variable de mémorisation du résultat brut d potentiométre

float resultat;//j'utilise float pour afficher les chiffres après la virgule

void setup()
{
Serial.begin(9600);
}

void loop()
{
valeurpot = analogRead(potentiometre);// on stocke le résultat du potentiomètre dans la valeurpot

/*conversion simple : j'ai 5V au plus en sortie de ma carte. La valeur max du potentiomètre est de 1023.
je divise la valeur du potentiomètre par 204,6 pour 1 volt : 1023 / 5 = 204.6 (il existe différentes façon)*/

resultat = valeurpot;

Serial.print(resultat);// résultat final de la tension réglée
Serial.println("");

delay(100);//juste pour avoir le temps de lire sur le moniteur.
}
