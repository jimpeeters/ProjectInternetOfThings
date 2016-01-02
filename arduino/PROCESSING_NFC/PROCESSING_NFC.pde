import processing.serial.*;

Serial myPort;
String val;

void setup(){
  String portName = Serial.list()[0];
  myPort = new Serial(this, portName, 9600);
}

void draw(){
  if( myPort.available() > 0 )
  {
    val = myPort.readStringUntil('\n');
  }
  println(val);
  if(val == "1")
  {
    //surf naar "https://whos-waiting-jeroenvdbkdg.c9users.io/hello-world.php?action=open
      println("poppetje staat erop");
  }
  else
  {
    //surf naar "https://whos-waiting-jeroenvdbkdg.c9users.io/hello-world.php?action=close
    println("poppetje staat eraf");
  }

}