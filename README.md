# RuangSense 🌡️💨
> **Awarded "The Best Overall" - UKM ITAMA 2026**

RuangSense adalah platform pemantauan kualitas udara berbasis IoT (Internet of Things) yang dirancang untuk memantau suhu, kelembaban, dan kadar gas secara real-time. Proyek ini mengintegrasikan perangkat keras ESP32 dengan ekosistem Laravel untuk memberikan visibilitas data yang akurat dan sistem peringatan dini.

## 🏆 Achievement
Proyek ini berhasil meraih penghargaan **"The Best Overall"** dalam ajang kompetisi karya mahasiswa teknik tingkat kampus tahun 2026.

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
- **Real-time Monitoring:** Visualisasi data sensor dalam bentuk grafik interaktif menggunakan Pusher.
- **Device Authentication:** Sistem keamanan menggunakan `Bearer Device ID` pada header request untuk memvalidasi setiap perangkat yang mengirim data.
- **Early Warning System:** Klasifikasi status kondisi udara menjadi **Normal**, **Warning**, dan **Danger** yang memicu alarm pada sisi hardware.
- **Sensor History:** Pencatatan log data sensor ke dalam database untuk analisis jangka panjang.

## 📡 API Overview
Perangkat ESP32 mengirimkan data ke backend melalui endpoint POST dengan format berikut:

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
    "temp_status": "normal"
}
```
