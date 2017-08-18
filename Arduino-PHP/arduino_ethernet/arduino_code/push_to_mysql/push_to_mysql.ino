#include <SPI.h>
#include <Ethernet.h>
byte mac[] = { 
  0x00, 0xAA, 0xBB, 0xCC, 0xDE, 0x02 };
char serverName[] = "10.10.10.1";
EthernetClient client;

void setup() {

Ethernet.begin(mac);
  Serial.begin(9600);
  pinMode(9, OUTPUT);
}

void loop() {
  int i = 10;
  while (client.connected()) {
  if (client.available()) {
        char c = client.read();
        Serial.write(c);
  client.connect(serverName, 80);
  client.println("GET /arduino/arduino_ethernet/push_to_mysql/arduino_push.php?svalue=");
  client.println(i);
  client.println("HTTP/1.0");
  client.println("Host: 10.10.10.1");
  client.println("User-Agent: Arduino");
  client.println();
  digitalWrite(9, HIGH);
  
}
else {
  client.stop();
}
  }
  i++;
}
