/*
//This script by Anthony Mburu
//2014
*/

#include <SPI.h>
#include <Ethernet.h>

// Enter a MAC address and IP address for your controller below.
// The IP address will be dependent on your local network:
byte mac[] = { 
  0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
IPAddress ip(169,254,1,1);

// Initialize the Ethernet server library
// with the IP address and port you want to use 
// (port 80 is default for HTTP):
EthernetServer server(80);

void setup() {
  // Open serial communications and wait for port to open:
  Serial.begin(9600);
   while (!Serial) {
    ; // wait for serial port to connect. Needed for Leonardo only
  }


  // start the Ethernet connection and the server:
  Ethernet.begin(mac, ip);
  server.begin();
  Serial.print("server is at ");
  Serial.println(Ethernet.localIP());
}


void loop() {
  // listen for incoming clients
  EthernetClient client = server.available();
  if (client) {
    Serial.println("new client");
    // an http request ends with a blank line
    boolean currentLineIsBlank = true;
    while (client.connected()) {
      if (client.available()) {
        char c = client.read();
        Serial.write(c);
        // if you've gotten to the end of the line (received a newline
        // character) and the line is blank, the http request has ended,
        // so you can send a reply
        if (c == '\n' && currentLineIsBlank) {
          // send a standard http response header
          client.println("HTTP/1.1 200 OK");
          client.println("Content-Type: text/html");
          client.println("Connection: close");
          client.println();
          client.println("<!DOCTYPE HTML>");
          client.println("<html style='background:#1273c2'><head>");
          client.println("<title>Arduino Intel Galileo</title> <style> div#test{background:transparent url(http://169.254.246.200/arduino/web_server/pattern.png) repeat top left; border:#dedede 1px solid; padding:10px 40px 40px 40px; width:500px; margin:0 auto; }#test_status{text-align:center;} </style>");
          client.println("<script src=\"http://169.254.246.200/arduino/web_server/AI_Exam.js\"></script>");
          client.println("</head><body style='background:#1273c2 url(http://169.254.246.200/arduino/web_server/intel-galileo-box.jpg) no-repeat top right; margin:0; padding:0; height:900px; width:100%; overflow:hidden; color:#F4F4F4;'>");
          client.println("<h2 id=\"test_status\"></h2><div id=\"test\"></div>");
          client.println("</body></html>");
          break;
        }
        if (c == '\n') {
          // you're starting a new line
          currentLineIsBlank = true;
        } 
        else if (c != '\r') {
          // you've gotten a character on the current line
          currentLineIsBlank = false;
        }
      }
    }
    // give the web browser time to receive the data
    delay(1);
    // close the connection:
    client.stop();
    Serial.println("client disonnected");
  }
}

