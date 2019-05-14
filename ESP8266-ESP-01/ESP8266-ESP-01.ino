#include <ESP8266WiFi.h>
#include <WiFiClient.h>

const int led = 2;
const int sensor = 0;
//const int sensor = 0;
const int idVaga = 15;
//const int idVaga = 14;

const char* ssid = "P2";
const char* password = "";
const char* senha = "";


const char http_site[] = "http://192.168.15.11";
const int http_port = 80;

WiFiClient client;
IPAddress server(192,168,15,11); //ENDEREÇO DO SERVIDOR - FORMATO XXX,XXX,XXX,XXX

void setup() {
  pinMode(sensor, INPUT_PULLUP);
  pinMode(led, OUTPUT);
  digitalWrite(led, LOW);
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
  int LeituraDigital = 0;
  Serial.println("Gravando dados no BD: ");

  if ( !client.connect(server, http_port) ) {
    Serial.println("Falha na conexao com o site ");
  } 
  else {
    digitalWrite(led, LOW);
    delay(2000);
    LeituraDigital = digitalRead(sensor);
    String param = "?presenca="+String(LeituraDigital)+"&id="+idVaga;
    client.println("GET http://192.168.15.11:80/class/DAO/vagaDAO.php" + param + " HTTP/1.1"); // EX: http://192.168.1.114:8080/ambiente/webservice.php
    client.println("Host: ");
    client.println(http_site);
    client.println("Connection: close");
    client.println();
    client.println();
    digitalWrite(led, HIGH);
    // INFORMACOES DE RETORNO PARA DEBUG
    while(client.available()){
      String line = client.readStringUntil('\r');
      Serial.print(line);
    }
    while(LeituraDigital == digitalRead(sensor))
      delay(2000);
    }
  delay(2000);

}
