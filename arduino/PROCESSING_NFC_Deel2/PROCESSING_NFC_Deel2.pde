import processing.net.*;

//package main;

import java.io.IOException;
import java.net.MalformedURLException;

//import com.gargoylesoftware.htmlunit.FailingHttpStatusCodeException;
//import com.gargoylesoftware.htmlunit.WebClient;

import processing.serial.*;

Serial myPort;
String val;
InputStream is = null;
Client c;


void setup(){
  String portName = Serial.list()[0];
  myPort = new Serial(this, portName, 115200);
  val = "0";
  c = new Client(this, "localhost", 80);
  c.write("GET /cursus/test-project/test.php?action=close HTTP/1.1\r\n");
  println(c.ip());
        
     
        
  //myClient = new Client(this, "whos-waiting-jeroenvdbkdg.c9users.io/hello-world.php?action=open", 8080);
  //println(myClient.ip());
}

void draw(){
  
  if( myPort.available() > 0 )
  {
    val = myPort.readStringUntil('\n');
  }
  println(val);
  if(val.contains("1"))
  {
    //surf naar "https://whos-waiting-jeroenvdbkdg.c9users.io/hello-world.php?action=open

      println("poppetje staat erop");
      delay(5000);
  }
  if(val.contains("0") == true)
  {
    //surf naar "https://whos-waiting-jeroenvdbkdg.c9users.io/hello-world.php?action=close
     println("poppetje staat eraf");
  }
  
  delay(1000);

}