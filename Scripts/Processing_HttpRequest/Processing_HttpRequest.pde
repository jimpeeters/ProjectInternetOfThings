import processing.net.*;
import http.requests.*;

import java.io.IOException;
import java.net.MalformedURLException;


import processing.serial.*;

Serial myPort;
String val;
Client c;
boolean waiting = false;


void setup(){
  String portName = Serial.list()[0];
  myPort = new Serial(this, portName, 115200);
  val = "100"; //onbestaande value in het begin
  
  
}

void draw(){
  
  if( myPort.available() > 0 )
  {
    val = myPort.readStringUntil('\n');
  }
  //println(val);
  if(val.contains("4"))
  {
      if(waiting == false)
      {
        GetRequest get = new GetRequest("http://whoswaiting.dev/order/open/4");
        get.send();
        println("poppetje staat erop");
        waiting = true;
      }
  }
  if(val.contains("0") == true)
  {
     if(waiting == true)
     {
       GetRequest get = new GetRequest("http://whoswaiting.dev/order/close/4");
       get.send();
       println("poppetje staat eraf");
       waiting = false;
     }
  }
  
  delay(500); //delay om ni te veel loops te doen (performance)

}