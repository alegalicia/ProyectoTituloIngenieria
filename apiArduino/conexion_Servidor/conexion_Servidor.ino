//#include "lib_ejc.h"
#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>
#include <DHT.h>
#define DHTPIN 14    // what digital pin we're connected to
#define DHTTYPE DHT22   // DHT 11
DHT dht(DHTPIN, DHTTYPE);

String ssid = "NICOLAS";
String pass = "RAMA195030081";



//String url = "http://solobinary.cl/servidoriot/prueba_recibe.php?divice_label=1&temperature=21.3&humidity=78.6";
//String url="http://192.168.0.4/servidoriot/pruebarecibe.php" 

int device = 1; 


void setup() {
 Serial.begin(115200);
 dht.begin();
 WiFi.begin(ssid, pass);
  while (WiFi.status() != WL_CONNECTED ) { 
    delay(500);
    Serial.print(".");
  }
Serial.println("");
Serial.println("********************************************");
      Serial.print("Conectado a la red WiFi: ");
      Serial.println(WiFi.SSID());
      Serial.print("IP: ");
      Serial.println(WiFi.localIP());
      Serial.print("macAdress: ");
      Serial.println(WiFi.macAddress());
      Serial.println("*********************************************");
}

float t;
float h;

//String protocolo = "http://";



void loop() {

  h = dht.readHumidity();
  t = dht.readTemperature();
  Serial.print("Humidity: ");
  Serial.print(h);
  Serial.print(" %\t");
  Serial.print("Temperature: ");
  Serial.print(t);
  Serial.println(" *C ");

String protocolo = "http://";
String host = "smartagronomy2021.000webhostapp.com";//"solobinary.cl";//
String resource = "/servidoriot/prueba_recibe.php?divice_label=1&temperature="+String(t,1)+"&humidity="+String(h,1);
int port=80;
String url = protocolo + host + resource;

  
  HTTPClient http;
  http.begin(url);
  http.addHeader("Content-Type","application/x-www-form-urlencoded");
  //temp=random(15,25);
  //hume=random(10,99);
  String postData = "?divice_label=tarjeta1&temperature="+String(t,1)+"&humidity="+String(h,1);
  int httpCode = http.POST(postData);
  String respuesta=http.getString();
  Serial.println(httpCode);
  Serial.println(respuesta);
  http.end();
  
    
  delay(2000);
  
  
}
/*
void meto2(){
  WiFiClient client;
  if(!client.connect(host,port)){
    Serial.println("Fallo la conexion");
    client.stop();
    return;
    }

    //temp=random(15,25);
    //hume=random(10,99);
    String postData = "?divice_label=1&temperature=15.5&humidity=65.5";
    Serial.println(device+" "+String(t)+" "+String(h));
    client.print(String("GET") + url + " HTTPS/1.0\r\n"+
        "Host: " + host + "\r\n" +
        "Accept: *" + "/" + "*\r\n" +
        "Content-Length: "  + postData.length() + "\r\n" +
        "Content-Type: application/x-www-form-urlencoded\r\n" +
        "\r\n" + postData);

     while(client.connected()){
      if(client.available()){
        String line = client.readStringUntil('\n');
        Serial.println(line);
        }
      }   
  client.stop();
  }

void  meto1(){
  HTTPClient http;
  http.begin(url);
  http.addHeader("Content-Type","application/x-www-form-urlencoded");
  //temp=random(15,25);
  //hume=random(10,99);
  String postData = "?device_label=tarjeta1&temperature=22.2&humidity=66.6";
  int httpCode = http.POST(postData);
  String respuesta=http.getString();
  Serial.println(httpCode);
  Serial.println(respuesta);
  http.end();
  }
*/
/*
  301
 <!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
 <html><head>
 <title>301 Moved Permanently</title>
 </head><body>
 <h1>Moved Permanently</h1>
 <p>The document has moved <a href="https://solobinary.cl/servidoriot/prueba_recibe.php?divice_label=1&amp;temperature=21.3&amp;humidity=78.6">here</a>.</p>
 </body></html>
 */
