import processing.serial.*;
Serial ComPort;
String input[];
int last;

void setup(){
    String portName = Serial.list()[0];
    ComPort = new Serial(this, portName, 9600);
    ComPort.bufferUntil('\n');
    last = 0;
}
void draw(){
    input = loadStrings("https://whos-waiting-jeroenvdbkdg.c9users.io/Blinds.txt");
//println(input[0]);
    if(input != null){
        if(input.length != 0){
              
            //String s_last = input[0];
            //input[0] = "1";
            //last = Integer.parseInt(s_last);
            delay(50);
            input = loadStrings("https://whos-waiting-jeroenvdbkdg.c9users.io/Blinds.txt");
            if(input.length != 0){
              
                String s_current = input[0];
                int current = Integer.parseInt(s_current);
                println("current : " + current);
                println("last : " + last);
                if(current != last){
                  println(input[0]);
                    println(current);
                    println(last);
                    last = current;
                    ComPort.write(current);
                }
            }
        }
    }
delay(1000);
}