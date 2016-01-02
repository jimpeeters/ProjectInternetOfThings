int key;
String input;

// the setup function runs once when you press reset or power the board
void setup() {
  // initialize digital pin 13 as an output.
  Serial.begin(9600);
  pinMode(13, OUTPUT);

}

// the loop function runs over and over again forever
void loop() {
Serial.println(Serial.available());
Serial.println(input);

  if(Serial.available() > 0)
  {
    key = Serial.read();
    Serial.println(key + "test");
    
    if(key == 1){
      digitalWrite(13, HIGH);
    }
    else if(key != 1){
      digitalWrite(13, LOW); 
    }
  }

  delay(400);

  Serial.println("running");
}
