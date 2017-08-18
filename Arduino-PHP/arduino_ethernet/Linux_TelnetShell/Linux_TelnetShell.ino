/*
This example shows how to use Linux system calls to start
a telnet server on the Galileo board. This enables you to use
a direct ethernet connection between the Galileo and a PC and
access the Linux shell.

Example code by Erik Nyquist 2013;
erik.nyquist@intel.com

I do not hold any rights over these 
code examples, and you may do with 
them what you wish
*/

void setup() {

  system("telnetd -l /bin/sh");
  system("ifconfig eth0 169.254.1.1 netmask 255.255.0.0 up");
  //you can now use puTTY or your favourite telnet client
  //to connect to this IP address

}

void loop() {
  // put your main code here, to run repeatedly: 
  
}
