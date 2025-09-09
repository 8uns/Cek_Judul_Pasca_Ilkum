# 📚 Website Pencarian Kemiripan Judul Penelitian

Aplikasi ini berfungsi sebagai alat untuk mendeteksi kesamaan judul penelitian.
Dengan adanya sistem ini, institusi dapat memantau, mengelola, serta memastikan judul penelitian yang diajukan mahasiswa tidak tumpang tindih dengan karya yang sudah ada.

Dengan memanfaatkan algoritma Levenshtein Distance dan Boyer Moore, sistem dapat mengukur tingkat kesamaan antar judul serta membantu institusi dalam memastikan karya ilmiah yang diajukan tidak tumpang tindih dengan penelitian yang sudah ada.
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
