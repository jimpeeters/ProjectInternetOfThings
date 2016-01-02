
#include <Bridge.h>
#include <HttpClient.h>


void setup() {
  //pinMode(13, OUTPUT);
  //digitalWrite(13, LOW);
  //Bridge.begin();
  Serial.begin(9600);
  while(!Serial);

}

void loop() {
  //HttpClient client;
  //client.get("https://whos-waiting-jeroenvdbkdg.c9users.io/hello-world.php?action=open");
  //delay(2000);
  Serial.println("hello world!");
  delay(1000);
}
