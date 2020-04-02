#include <SPI.h>
#include <Wire.h>
#include <Adafruit_GFX.h>
#include <Adafruit_SSD1306.h>

#define OLED_RESET 4
Adafruit_SSD1306 display(OLED_RESET);
void setup() {
Serial.begin(9600);
display.begin(SSD1306_SWITCHCAPVCC, 0x3C);
display.display();
delay(2000);
display.clearDisplay();
display.setTextSize(0.5);
display.setTextColor(WHITE);
display.setCursor(0, 0);
display.println("TOUT EST  CLAIR"); //print your name here
display.setCursor(0, 172 ); //this sets the cursor to 0 and 172
display.display();
delay(100000);
}
void loop() {
//this space has been left blank because we do not need to run a code repeatedly, we are just displaying a name so it can be written on setup only.
}
