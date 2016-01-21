#include <Wire.h>
#include <PN532_I2C.h>
#include <PN532.h>
#include <NfcAdapter.h>

PN532_I2C pn532_i2c(Wire);
NfcAdapter nfc = NfcAdapter(pn532_i2c);

boolean waiting = false;

 
 
void setup(void) {
    Serial.begin(115200); // begin serial communication
    nfc.begin(); // begin NFC communication
    Serial.println("0");
    pinMode(13, OUTPUT); //rood lichtje
    digitalWrite(13, LOW);
}
 
void loop(void) {

  //Serial.print("running");

    if (nfc.tagPresent()) // Een scan doen als er een tag is
    {
        NfcTag tag = nfc.read(); // tag lezen
        //Serial.print("present");

       if (tag.hasNdefMessage()) // Heeft tag een message? (voor te zien welke tafel het is)
        {
          NdefMessage message = tag.getNdefMessage(); //message van tag opvragen (tafelnummer)
          NdefRecord record = message.getRecord(0); // eerste record op de sticker 

          int payloadLength = record.getPayloadLength();
          byte payload[payloadLength];
          record.getPayload(payload);


          String payloadAsString = ""; // Processes the message as a string vs as a HEX value
          for (int c = 3; c < payloadLength; c++) {
            payloadAsString += (char)payload[c];
          }
            if(waiting != true)
            {
             digitalWrite(13, HIGH);
             Serial.println(payloadAsString);
             waiting = true;
            }

        }
        
        delay(200);
    }
    else 
    {
        if(waiting == true)
        {
         digitalWrite(13, LOW);
         Serial.println("0"); //geen tag 'tafel 0'
         waiting = false;
        }

    }
    
    delay(100); // wait half a second (500ms) before scanning again (you may increment or decrement the wait time)*/
}
