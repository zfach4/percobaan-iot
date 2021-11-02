#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>

#define ssid "RDz_Ryan"
#define pass "ryanenter"
#define LED1 0
#define LED2 1
#define LED3 2
#define LED4 3

ESP8266WiFiMulti WiFiMulti;

const String host = "192.168.43.167";
const String path1 = "/miniproject/read.php";
const String path2 = "/miniproject/process.php";

String dataPHP, postPHP;
String delay1, delay2, delay3, status1, status2, status3;
int Index1, Index2, Index3, Index4, Index5, Index6;
int d1, d2, d3, s1, s2, s3;
bool hold1, hold2, hold3;
int data1, data2, data3;
unsigned long time_now1 = 0;
unsigned long time_now2 = 0;
unsigned long time_now3 = 0;

void connect();
void write();

void setup()
{
  hold1 = false;
  hold2 = false;
  hold3 = false;
  for (int i = 0; i <= 4; i++)
  {
    pinMode(i, OUTPUT);
    digitalWrite(i, HIGH);
  }
  WiFi.mode(WIFI_STA);
  WiFiMulti.addAP(ssid, pass);
}
void loop()
{
  connect();
  write();
}

void write()
{
  // LED 1
  if (d1 > 0 and s1 == 1)
  {
    if (!hold1)
    {
      time_now1 = millis();
      hold1 = true;
    }
    digitalWrite(LED1, LOW);
    if (millis() >= time_now1 + (d1 * 1000))
    {
      digitalWrite(LED1, HIGH);
      WiFiClient client;
      HTTPClient http;
      if (http.begin(client, "http://" + host + path2))
      {
        http.addHeader("Content-Type", "application/x-www-form-urlencoded");
        postPHP = "OFF1=OFF";
        http.POST(postPHP);
        d1 = 0;
        s1 = 0;
        http.end();
        hold1 = false;
      }
    }
  }
  else if (d1 <= 0 and s1 == 1)
  {
    digitalWrite(LED1, LOW);
  }
  else if (d1 == 0 and s1 == 0)
  {
    digitalWrite(LED1, HIGH);
  }
  // LED 2
  if (d2 > 0 and s2 == 1)
  {
    if (!hold2)
    {
      time_now2 = millis();
      hold2 = true;
    }
    digitalWrite(LED2, LOW);
    if (millis() >= time_now2 + (d2 * 1000))
    {
      digitalWrite(LED2, HIGH);
      WiFiClient client;
      HTTPClient http;
      if (http.begin(client, "http://" + host + path2))
      {
        http.addHeader("Content-Type", "application/x-www-form-urlencoded");
        postPHP = "OFF2=OFF";
        http.POST(postPHP);
        d2 = 0;
        s2 = 0;
        http.end();
        hold2 = false;
      }
    }
  }
  else if (d2 <= 0 and s2 == 1)
  {
    digitalWrite(LED2, LOW);
  }
  else if (d2 == 0 and s2 == 0)
  {
    digitalWrite(LED2, HIGH);
  }
  // LED 3
  if (d3 > 0 and s3 == 1)
  {
    if (!hold3)
    {
      time_now3 = millis();
      hold3 = true;
    }
    digitalWrite(LED3, LOW);
    if (millis() >= time_now3 + (d3 * 1000))
    {
      digitalWrite(LED3, HIGH);
      WiFiClient client;
      HTTPClient http;
      if (http.begin(client, "http://" + host + path2))
      {
        http.addHeader("Content-Type", "application/x-www-form-urlencoded");
        postPHP = "OFF3=OFF";
        http.POST(postPHP);
        d3 = 0;
        s3 = 0;
        http.end();
        hold3 = false;
      }
    }
  }
  else if (d3 <= 0 and s3 == 1)
  {
    digitalWrite(LED3, LOW);
  }
  else if (d3 == 0 and s3 == 0)
  {
    digitalWrite(LED3, HIGH);
  }
}
void connect()
{
  if (WiFiMulti.run() == WL_CONNECTED)
  {
    WiFiClient client;
    HTTPClient http;
    if (http.begin(client, "http://" + host + path1))
    {
      int httpCode = http.GET();
      if (httpCode > 0)
      {
        if (httpCode == HTTP_CODE_OK || httpCode == HTTP_CODE_MOVED_PERMANENTLY)
        {
          String dataPHP = http.getString();
          if (dataPHP.length() > 0)
          {
            Index1 = dataPHP.indexOf('#');
            Index2 = dataPHP.indexOf('#', Index1 + 1);
            Index3 = dataPHP.indexOf('#', Index2 + 1);
            Index4 = dataPHP.indexOf('#', Index3 + 1);
            Index5 = dataPHP.indexOf('#', Index4 + 1);
            Index6 = dataPHP.indexOf('#', Index5 + 1);
            status1 = dataPHP.substring(Index1 + 1, Index2);
            delay1 = dataPHP.substring(Index2 + 1, Index3);
            status2 = dataPHP.substring(Index3 + 1, Index4);
            delay2 = dataPHP.substring(Index4 + 1, Index5);
            status3 = dataPHP.substring(Index5 + 1, Index6);
            delay3 = dataPHP.substring(Index6 + 1);
            d1 = delay1.toInt();
            d2 = delay2.toInt();
            d3 = delay3.toInt();
            s1 = status1.toInt();
            s2 = status2.toInt();
            s3 = status3.toInt();
            dataPHP = "";
          }
        }
        http.end();
      }
    }
  }
}
