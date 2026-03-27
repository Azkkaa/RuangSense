# RuangSense 🌡️💨
> **Awarded "The Best Overall" - UKM ITAMA 2026**

**[ ID ]** RuangSense adalah platform pemantauan kualitas ruangan berbasis IoT (Internet of Things) yang dirancang untuk memantau suhu, kelembaban, dan kadar gas secara real-time. Proyek ini mengintegrasikan perangkat keras ESP32 dengan ekosistem Laravel untuk memberikan visibilitas data yang akurat dan sistem peringatan dini.

**[ EN ]** RuangSense is an IoT (Internet of Things)-based indoor quality monitoring platform designed to monitor temperature, humidity, and gas levels in real time. The project integrates ESP32 hardware with the Laravel ecosystem to provide accurate data visibility and an early warning system.

## 🏆 Achievement
**[ ID ]** Proyek ini berhasil meraih penghargaan **"The Best Overall"** dalam ajang kompetisi karya mahasiswa teknik tingkat kampus tahun 2026.

**[ EN ]** This project successfully won the **"The Best Overall"** award in the 2026 campus-level engineering student work competition.

## 🛠️ Tech Stack
### Backend & Dashboard
- **Framework:** Laravel 12
- **Database:** MySQL
- **Real-time Engine:** Pusher (WebSockets)
- **Frontend:** Tailwind CSS & Chart.js (untuk visualisasi data)

### Hardware & Connectivity
- **Controller:** ESP32 (Transitioning to MicroPython)
- **Sensors:** DHT22 (Temperature & Humidity), MQ-2 (Gas/Smoke)
- **Communication:** REST API with Custom Bearer Authentication

## ✨ Key Features
- **Real-time Monitoring:** 
**[ ID ]** Visualisasi data sensor dalam bentuk grafik interaktif menggunakan Pusher.
**[ EN ]** Visualization of sensor data in the form of interactive graphs using Pusher.
- **Device Authentication:**
**[ ID ]** Sistem keamanan menggunakan `Bearer Device ID` pada header request untuk memvalidasi setiap perangkat yang mengirim data.
**[ EN ]** The security system uses the `Bearer Device ID` in the request header to validate each device sending data.
- **Early Warning System:**
**[ ID ]** Klasifikasi status kondisi udara menjadi **Normal**, **Warning**, dan **Danger** yang memicu alarm pada sisi hardware.
**[ EN ]** Classification of air condition status into **Normal**, **Warning**, and **Danger** which triggers an alarm on the hardware side.
- **Sensor History:**
**[ ID ]** Pencatatan log data sensor ke dalam database untuk analisis jangka panjang.
**[ EN ]** Logging sensor data into a database for long-term analysis.

## 📡 API Overview
**[ ID ]** Perangkat ESP32 mengirimkan data ke backend melalui endpoint POST dengan format berikut:
**[ EN ]** The ESP32 device sends data to the backend via the POST endpoint in the following format:

**Endpoint:** `POST /api/sensor-log/store`
**Headers:**
- `Authorization: Bearer <YOUR_DEVICE_ID>`
- `Content-Type: application/json`

**Payload:**
```json
{
    "temperature": 29.0,
    "humidity": 86.7,
    "gas_level": 23.45,
    "temp_status": "normal",
    "humid_status": "wet",
    "gas_status": "normal"
}
```
