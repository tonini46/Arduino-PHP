#include <SPI.h>
#include <Ethernet.h>

byte mac[] = { 
  0x00, 0xAA, 0xBB, 0xCC, 0xDE, 0x02 };
char serverName[] = "169.254.246.200";
EthernetClient client;
char inString[32];
char *echo[50], *k, *p;
int *echo_sensor_int = new int[50];
int stringPos = 0;
boolean startRead = false;

void setup() {
  Ethernet.begin(mac);
  Serial.begin(9600);
}

void loop() {

  String phpEchoValue = connectAndRead();
  // Convert string to a Character Array
  //  order: <red, green, blue>
  // Serial.println(phpEchoValue);
  
  int string_length = phpEchoValue.length()+1; //dynamic string length
  char phpEcho[string_length]; //character array (the buffer)
  phpEchoValue.toCharArray(phpEcho, string_length);

  p = strtok_r(phpEcho,",",&k); // first in array
  int red = atoi(p);
  //Serial.println(red);

  for(int i=0; i<4; i++) // the other arrays
  {
    echo[i] = strtok_r(NULL,",",&k);

    if(i>=0 && i<2){
      echo_sensor_int[i] = atoi(echo[i]); //char to integer
      //Serial.println(echo_sensor_int[i]);
    }
  }

   Serial.print("Red = ");
   Serial.println(red);
   Serial.print("Green = ");
   Serial.println(echo_sensor_int[0]);
   Serial.print("Blue = ");
   Serial.println(echo_sensor_int[1]);
   Serial.println("");
   //delay(1000);
   red = map(red, 0, 255, 0, 255);
   int green = map(echo_sensor_int[0], 0, 255, 0, 255);
   int blue = map(echo_sensor_int[1], 0, 255, 0, 255);
   analogWrite(11, red);
   analogWrite(10, green);
   analogWrite(9, blue);

}

String connectAndRead(){
  client.connect(serverName, 80);
  client.println("GET /arduino/arduino_ethernet/led_test_control/arduino_input.php");
  client.println("HTTP/1.0");
  client.println("Host: 169.254.246.200");
  client.println("User-Agent: Arduino");
  client.println();
  return readPage();
}

String readPage(){
  stringPos = 0;
  memset(&inString, 0, 32);//clear instring memory

  while(true){
    if(client.available()){
      char c = client.read();
      if(c == '<'){
        startRead = true;
      }
      else if(startRead){
        if(c!='>'){
          inString[stringPos]= c;
          stringPos++;
        }
        else{
          startRead = false;
          client.stop();
          client.flush();
          return inString;
        }
      }
    }
  }
}








