
# RuangSense-v1 ❄️

RuangSense adalah platform pemantauan kualitas ruangan berbasis IoT (Internet of Things) yang dirancang untuk memantau suhu, kelembaban, dan kadar gas secara *real-time*. Proyek ini mengintegrasikan perangkat keras ESP32 dengan ekosistem Laravel untuk memberikan visibilitas data yang akurat dan sistem peringatan dini.

---

## 🏆 Achievement
Proyek ini berhasil meraih penghargaan **"The Best Overall"** dalam ajang kompetisi karya mahasiswa teknik tingkat kampus tahun 2026.

---

## 🛠️ Tech Stack

### Backend & Dashboard
- **Framework:** Laravel 12
- **Database:** MySQL
- **Real-time Engine:** Pusher (WebSockets)
- **Frontend:** Tailwind CSS & Chart.js (untuk visualisasi data)

### Hardware & Connectivity
- **Controller:** ESP32 (MicroPython environment)
- **Sensors:** DHT22 (Temperature & Humidity), MQ-2 (Gas/Smoke)
- **Communication:** REST API via HTTP POST

---

## ✨ Key Features & Security

- **Real-time Monitoring:** Visualisasi data sensor dalam bentuk grafik interaktif menggunakan Pusher.

- **Device Authentication & API Security:**
  Sistem keamanan menggunakan `Bearer Device ID` pada *header request* untuk memvalidasi setiap perangkat yang mengirim data.

- **Data Privacy & Architecture:**
  Implementasi proteksi **IDOR** dan penggunaan **Hashids** untuk menyembunyikan ID asli pada database, serta pemisahan struktur *routing* statis dan dinamis secara ketat.

- **Early Warning System:**
  Klasifikasi status kondisi udara menjadi **Normal**, **Warning**, dan **Danger** yang memicu alarm pada sisi *hardware*.

- **Sensor History:**
  Pencatatan log data sensor ke dalam database untuk analisis jangka panjang.

---

## 📡 API Overview

Perangkat ESP32 mengirimkan data ke *backend* melalui *endpoint* POST dengan format berikut:

**Endpoint:** `POST /api/sensor-log/store`  
**Headers:**
```http
Authorization: Bearer <YOUR_DEVICE_ID>
Content-Type: application/json
Accept: application/json
```

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

---

## 🚀 Installation & Setup (Local Development)

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di mesin lokal Anda:

1. **Clone the repository:**
```bash
git clone https://github.com/yourusername/ruangsense-v1.git
cd ruangsense
```


2. **Install PHP dependencies:**
```bash
composer install
```


3. **Install NPM dependencies & build assets:**
```bash
npm install
npm run build
```


4. **Environment setup:**
Copy `.env.example` to `.env` and configure your database and Pusher credentials.
```bash
cp .env.example .env
php artisan key:generate
```


5. **Run migrations:**
```bash
php artisan migrate
```


6. **Start the local server:**
```bash
php artisan serve
```

---

![Laravel](https://img.shields.io/badge/laravel_12-FF0000?logo=laravel&logoColor=white) ![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?logo=tailwind-css&logoColor=white) ![JavaScript](https://img.shields.io/badge/javascript-000000?logo=javascript&logoColor=%23F7DF1E)
![ESP32](https://img.shields.io/badge/ESP32-E1251B?logo=espressif&logoColor=white) ![Pusher](https://img.shields.io/badge/Pusher-300D4F?logo=pusher&logoColor=white)

**© 2026 RuangSense-v2 - Muhammad Azka Faza Muttaqin. All rights reserved.**
