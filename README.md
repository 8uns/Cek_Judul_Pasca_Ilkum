# 📚 Website Pencarian Kemiripan Judul Penelitian

Repository ini berisi implementasi website berbasis **PHP** untuk melakukan pencarian kemiripan judul penelitian.  
Sistem ini ditujukan untuk membantu lembaga pendidikan atau institusi dalam memverifikasi keunikan karya ilmiah mahasiswa/peneliti melalui deteksi kemiripan judul menggunakan algoritma pencocokan string.

---

## 📝 Deskripsi
Aplikasi ini terdiri dari dua bagian utama:  
1. **🌐 Halaman Utama (Public/Guest)** – dapat diakses tanpa login.  
2. **🔐 Halaman Admin (Login Required)** – hanya untuk administrator sistem.  

Pada halaman utama terdapat menu navigasi:  
- 🏠 **Home**  
- ℹ️ **About**  
- 👨‍🏫 **Staff**  
- 🔎 **Check Research Title**  
- 📩 **Contact**  

---

## ✨ Fitur Utama

### 🌐 Halaman Umum (Tanpa Login)
- 🧭 Navigasi ke **Home, About, Staff, Check Research Title, Contact**.  
- 🔎 Pencarian judul penelitian untuk mengetahui tingkat kemiripan.  

### 🔐 Halaman Admin
- 📝 **Cek Kemiripan Judul** → menggunakan algoritma Levenshtein Distance dan Boyer Moore.  
- 📑 **Manajemen Karya Ilmiah** → tambah, edit, hapus, dan kelola data karya ilmiah.  
- 👥 **Manajemen Akun** → kelola akun admin dan pengguna.  

---

## ⚙️ Algoritma yang Digunakan

### 1. 🔡 Levenshtein Distance
Menghitung jarak edit antara dua string melalui:  
- ❌ Penghapusan (*deletion*)  
- ➕ Penyisipan (*insertion*)  
- 🔄 Substitusi (*substitution*)  

📈 Hasil berupa skor jarak → semakin kecil nilainya, semakin mirip kedua string.

### 2. 📍 Boyer Moore
Algoritma pencocokan pola string yang efisien.  
- 🔎 Pencarian dari kanan ke kiri pada pola.  
- ⏩ Melompati karakter berdasarkan *last occurrence table*.  
- ⚡ Lebih cepat dibanding brute force.  
