#include <Wire.h>
#include <PN532_I2C.h>
#include <PN532.h>
#include <NfcAdapter.h>

PN532_I2C pn532_i2c(Wire);
NfcAdapter nfc = NfcAdapter(pn532_i2c);
 
 
void setup(void) {
    Serial.begin(115200); // begin serial communication
    //Serial.println("NDEF Reader");
    nfc.begin(); // begin NFC communication
}
 
void loop(void) {
    
    //Serial.println(nfc.tagPresent());
    if (nfc.tagPresent()) // Do an NFC scan to see if an NFC tag is present
    {
        NfcTag tag = nfc.read(); // read the NFC tag into an object, nfc.read() returns an NfcTag object.
        //tag.print(); // prints the NFC tags type, UID, and NDEF message (if available)
        Serial.println("1");
    }
    else 
    {
      Serial.println("0");
    }
    
    delay(10); // wait half a second (500ms) before scanning again (you may increment or decrement the wait time)*/
}
