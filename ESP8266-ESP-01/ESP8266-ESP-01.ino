#include <ESP8266WiFi.h>
#include <WiFiClient.h>

const int PINp = 0;

const int idVagap = 1;

const char* ssid = "Estacionamento";
const char* password = "";
const char* senha = "";

const char http_site[] = "http://192.168.3.15";
const int http_port = 80;

WiFiClient client;
IPAddress server(192,168,3,15); //ENDEREÇO DO SERVIDOR - FORMATO XXX,XXX,XXX,XXX

void setup() {
  pinMode(PINp, INPUT);
  
  Serial.begin(115200);
  delay(4000);
  Serial.print("Conectando na rede: ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi Conectada");
}

void loop() {
  int LDigp = 0;
  
  Serial.println("Teste de conexão com o BD");

  if ( !client.connect(server, http_port) ) {
    Serial.println("Falha na conexao com o site ");
  } 
  else {
    
  Serial.println("Gravando dados no BD");
    delay(2000);
    LDigp = digitalRead(PINp);
    String param = "?presencap=" + String(LDigp) + "&idp=" + idVagap ;
    client.println("GET http://192.168.3.15:80/class/DAO/vagaDAO.php" + param + " HTTP/1.1"); // EX: http://192.168.1.114:8080/ambiente/webservice.php
    client.println("Host: ");
    client.println(http_site);
    client.println("Connection: close");
    client.println();
    client.println();
    // INFORMACOES DE RETORNO PARA DEBUG
    while(client.available()){
      String line = client.readStringUntil('\r');
      Serial.print(line);
    }
    while(LDigp == digitalRead(PINp)){
      delay(2000);
    }
  delay(2000);

}
}
