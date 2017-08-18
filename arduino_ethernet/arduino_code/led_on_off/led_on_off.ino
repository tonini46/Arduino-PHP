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
int red;
int blue;
int green;
//led pins
#define led_red 13
#define led_blue 8
#define led_green 10

void setup() {
  Ethernet.begin(mac);
  Serial.begin(9600);
  pinMode(led_red, OUTPUT);
  pinMode(led_blue, OUTPUT);
  pinMode(led_green, OUTPUT);
}

void loop() {
Serial.println("sasa");
  String phpEchoValue = connectAndRead();
  // Convert string to a Character Array
  //  order: <red, green, blue>
   //Serial.println(phpEchoValue);
  
  int string_length = phpEchoValue.length()+1; //dynamic string length
  char phpEcho[string_length]; //character array (the buffer)
  phpEchoValue.toCharArray(phpEcho, string_length);

  p = strtok_r(phpEcho,",",&k); // first in array
  red = atoi(p);
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
   if(red == 0){
   digitalWrite(led_red, LOW);
   }
   else if(red == 1){
   digitalWrite(led_red, HIGH);
   }
   else if(blue == 0){
   digitalWrite(led_blue, LOW);
   }
   else if(blue == 1){
   digitalWrite(led_blue, HIGH);
   }
   else if(green == 0){
   digitalWrite(led_green, LOW);
   }
   else if(green == 1){
   digitalWrite(led_green, HIGH);
   }

}

String connectAndRead(){
  client.connect(serverName, 80);
  client.println("GET /arduino/arduino_ethernet/led_on_off/arduino_input.php");
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








