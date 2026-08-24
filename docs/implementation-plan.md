# Implementation Plan

> Dokumen ini adalah rencana pengembangan berdasarkan keputusan perencanaan yang sudah disepakati. Dokumen ini **tidak berisi kode Laravel, migration, controller, model, atau keputusan implementasi teknis yang belum diputuskan**.

## 1. Prinsip Pengembangan

- Pengembangan dilakukan bertahap.
- Satu milestone diselesaikan dan diuji sebelum berpindah ke milestone berikutnya.
- Fitur dasar tugas harus stabil sebelum menambahkan file, notifikasi, dan proses otomatis berbasis waktu.
- Scope versi utama tetap mencakup jadwal, lampiran file, penghapusan file otomatis, dan notifikasi, tetapi fitur-fitur tersebut dibangun setelah MVP inti stabil.
- Fitur tambahan dibangun setelah versi utama stabil.

## 2. Urutan Pengembangan

```text
Perencanaan
     ↓
Persiapan Laravel + Git
     ↓
Autentikasi
     ↓
Mata Kuliah
     ↓
Tugas Dasar
     ↓
Status + Deadline + Prioritas
     ↓
Dashboard + Filter
     ↓
Jadwal Kuliah
     ↓
Lampiran File
     ↓
Penghapusan File Otomatis
     ↓
Notifikasi
     ↓
────────────────────────
   VERSI UTAMA SELESAI
────────────────────────
     ↓
Pencarian + Filter Lanjutan + Sorting
     ↓
Semester + Arsip
     ↓
Kalender
     ↓
Statistik
```

## 3. Milestone 0 — Persiapan Proyek

### Tujuan
Menyiapkan fondasi proyek dan workflow belajar.

### Cakupan
- memahami gambaran struktur proyek Laravel;
- menyiapkan workflow Git;
- menyiapkan repository GitHub;
- membiasakan commit secara bertahap;
- menggunakan OpenCode sebagai alat bantu tanpa menyerahkan keputusan desain aplikasi kepadanya.

### Hasil yang Diharapkan
Proyek siap dikembangkan.

### TBD
- versi Laravel;
- versi PHP;
- DBMS;
- environment pengembangan;
- strategi branch Git;
- pola commit;
- konfigurasi OpenCode.

## 4. Milestone 1 — Akun Mahasiswa

### Tujuan
Menyediakan akses pengguna pribadi.

### Cakupan
- registrasi;
- login;
- logout;
- proteksi halaman internal;
- isolasi akses agar mahasiswa hanya dapat mengakses data miliknya.

### Kriteria Selesai
- mahasiswa dapat membuat akun;
- mahasiswa dapat login;
- mahasiswa dapat logout;
- halaman internal tidak dapat diakses tanpa login;
- mahasiswa tidak dapat mengakses data mahasiswa lain.

### TBD
Detail teknis autentikasi Laravel.

## 5. Milestone 2 — Mata Kuliah

### Tujuan
Membuat fondasi data akademik yang dibutuhkan sebelum tugas dibuat.

### Cakupan
- daftar mata kuliah;
- tambah mata kuliah;
- edit mata kuliah;
- hapus mata kuliah;
- jenis Teori/Praktikum;
- nama mata kuliah unik per mahasiswa;
- pembandingan nama tidak sensitif terhadap huruf besar/kecil;
- halaman detail mata kuliah;
- tambah/edit mata kuliah dalam konteks satu halaman.

### Kriteria Selesai
- mahasiswa dapat mengelola daftar mata kuliah miliknya;
- duplikat nama mata kuliah ditolak;
- mahasiswa dapat membuka detail mata kuliah;
- mata kuliah yang masih memiliki tugas atau jadwal tidak dapat dihapus.

### TBD
- apakah form satu halaman menggunakan modal atau inline form;
- validasi tambahan selain aturan yang sudah disepakati.

## 6. Milestone 3 — Tugas Dasar

### Tujuan
Membuat fungsi inti pencatatan tugas.

### Cakupan
- tambah tugas;
- daftar tugas;
- detail tugas;
- edit tugas;
- hapus tugas;
- hubungan tugas dengan satu mata kuliah;
- deadline tanggal dan jam;
- status awal otomatis Belum Dikerjakan;
- tugas boleh dibuat tanpa teks soal atau file.

### Kriteria Selesai
Mahasiswa sudah dapat menggunakan aplikasi untuk mencatat dan mengelola tugas kuliah dasar.

### TBD
- bentuk UI tambah/edit tugas;
- field teknis database;
- validasi judul selain yang telah diputuskan;
- apakah deadline masa lalu boleh dimasukkan saat membuat tugas.

## 7. Milestone 4 — Status, Deadline, dan Prioritas

### Tujuan
Menambahkan business logic utama task manager.

### Cakupan
- status Belum Dikerjakan;
- status Belum Selesai;
- status Selesai;
- status dapat diubah kembali;
- tindakan Tandai Selesai;
- prioritas otomatis:
  - ≤ 2 hari: Tinggi;
  - 3–5 hari: Sedang;
  - > 5 hari: Rendah;
- kondisi Terlambat otomatis apabila deadline sudah lewat dan status bukan Selesai;
- daftar tugas mengutamakan:
  1. Terlambat;
  2. deadline terdekat;
  3. deadline berikutnya.

### Kriteria Selesai
- status tugas berubah sesuai tindakan pengguna;
- prioritas muncul otomatis;
- kondisi Terlambat muncul otomatis;
- urutan daftar tugas mengikuti keputusan yang disepakati.

### TBD
Definisi teknis batas hari dan presisi perhitungan waktu.

## 8. Milestone 5 — Dashboard dan Filter MVP

### Tujuan
Membuat informasi penting mudah dipantau.

### Cakupan Dashboard
- jumlah Belum Dikerjakan;
- jumlah Belum Selesai;
- jumlah Selesai;
- jumlah Terlambat;
- tugas dengan deadline terdekat.

### Cakupan Filter
- Semua;
- Teori;
- Praktikum.

### Kriteria Selesai
Mahasiswa dapat memahami keadaan tugas utama dari dashboard dan memfilter daftar tugas berdasarkan jenis mata kuliah.

### TBD
- jumlah tugas deadline terdekat yang ditampilkan;
- detail desain visual dashboard.

## 9. Milestone 6 — Jadwal Kuliah

### Tujuan
Menambahkan pengelolaan jadwal mingguan.

### Cakupan
- tambah jadwal;
- lihat jadwal;
- edit jadwal;
- hapus jadwal;
- data:
  - mata kuliah;
  - hari;
  - jam mulai;
  - jam selesai;
  - ruangan;
- satu mata kuliah dapat memiliki lebih dari satu jadwal;
- bentrok jadwal menghasilkan peringatan tetapi tetap boleh disimpan;
- dashboard dapat menampilkan jadwal hari ini.

### Kriteria Selesai
Mahasiswa dapat mengelola jadwal kuliah mingguan dan melihat peringatan bentrok.

### TBD
- bentuk UI tambah/edit jadwal;
- aturan detail deteksi bentrok pada batas jam;
- representasi hari secara teknis.

## 10. Milestone 7 — Teks Soal dan Lampiran File

### Tujuan
Memungkinkan informasi tugas disimpan langsung di aplikasi.

### Cakupan
- teks soal/instruksi;
- beberapa file lampiran per tugas;
- teks dan file boleh digunakan bersamaan;
- maksimal 10 MB per file;
- format:
  - PDF;
  - DOC;
  - DOCX;
  - PPT;
  - PPTX;
  - JPG;
  - JPEG;
  - PNG.

### Kriteria Selesai
Mahasiswa dapat menyimpan soal dalam teks dan/atau beberapa file sesuai aturan file.

### TBD
- lokasi penyimpanan file;
- metadata file;
- batas jumlah file per tugas;
- mekanisme akses/preview/download file;
- perilaku file yang diunggah setelah tugas sudah Selesai.

## 11. Milestone 8 — Penghapusan File Otomatis

### Tujuan
Mengurangi penggunaan penyimpanan tanpa menghapus histori tugas.

### Cakupan
- ketika tugas menjadi Selesai, hitungan 30 hari dimulai;
- setelah 30 hari, file soal dihapus;
- data tugas tetap ada;
- teks soal tetap ada;
- jika tugas dibuka kembali sebelum 30 hari, penghapusan dibatalkan;
- jika tugas kembali Selesai, hitungan 30 hari dimulai ulang.

### Kriteria Selesai
Siklus penghapusan file mengikuti seluruh aturan status yang telah disepakati.

### TBD
- mekanisme scheduler;
- cara menyimpan waktu penyelesaian terbaru;
- penanganan kegagalan penghapusan file.

## 12. Milestone 9 — Notifikasi Dalam Aplikasi

### Tujuan
Memberi pengingat tanpa aplikasi mobile.

### Cakupan
- notifikasi saat tugas pertama kali memasuki prioritas Tinggi;
- notifikasi saat tugas pertama kali menjadi Terlambat;
- satu notifikasi per kondisi;
- status Belum Dibaca;
- status Sudah Dibaca.

### Kriteria Selesai
Mahasiswa mendapatkan notifikasi yang tepat tanpa duplikasi untuk kondisi yang sama.

### TBD
- halaman khusus vs ikon lonceng vs kombinasi;
- struktur fisik data notifikasi;
- retensi notifikasi;
- mekanisme pemeriksaan kondisi deadline secara teknis.

## 13. Milestone 10 — Pencarian, Filter, dan Sorting Lanjutan

### Tujuan
Mempermudah pengelolaan ketika jumlah tugas sudah banyak.

### Cakupan
- pencarian berdasarkan judul tugas;
- filter berdasarkan status;
- filter berdasarkan kondisi Terlambat;
- filter berdasarkan prioritas;
- sorting berdasarkan deadline;
- sorting berdasarkan prioritas;
- sorting berdasarkan mata kuliah.

### Kriteria Selesai
Pengguna dapat menemukan dan mengurutkan tugas sesuai kebutuhan yang telah ditentukan.

## 14. Milestone 11 — Semester dan Arsip

### Tujuan
Merapikan data akademik jangka panjang.

### Cakupan Semester
- semester untuk mengelompokkan mata kuliah.

### Cakupan Arsip
- arsip tugas selesai agar histori dapat dipisahkan dari daftar aktif.

### Aturan yang Tetap Berlaku
Nama mata kuliah tidak boleh sama meskipun berada pada semester yang berbeda.

### TBD
- atribut semester;
- semester aktif/nonaktif;
- mekanisme penempatan mata kuliah pada semester;
- kapan tugas selesai dipindahkan ke arsip;
- apakah arsip otomatis atau manual;
- perilaku tugas yang dibuka kembali setelah masuk arsip.

## 15. Milestone 12 — Kalender Tugas

### Tujuan
Menampilkan deadline dalam bentuk kalender.

### Cakupan
- melihat tugas berdasarkan tanggal deadline.

### TBD
- desain kalender;
- interaksi saat memilih tanggal;
- informasi yang tampil pada setiap tanggal.

## 16. Milestone 13 — Statistik Produktivitas

### Tujuan
Memberikan ringkasan berdasarkan histori tugas.

### Cakupan
- statistik produktivitas sebagai fitur tambahan.

### TBD
Metrik final yang ditampilkan, rumus, periode statistik, dan bentuk visualisasi.

## 17. Halaman yang Menjadi Target Implementasi

Halaman/area yang telah diputuskan:

1. Login.
2. Registrasi.
3. Dashboard.
4. Mata Kuliah.
5. Detail Mata Kuliah.
6. Tugas.
7. Detail Tugas.
8. Jadwal Kuliah.
9. Notifikasi.
10. Profil.

Keputusan terkait halaman:

- tidak ada landing page;
- pengguna yang belum login diarahkan ke login/registrasi;
- tambah/edit mata kuliah berada dalam satu konteks halaman;
- detail mata kuliah diperlukan;
- dashboard dan halaman tugas dipisahkan;
- profil versi awal cukup terkait nama, email, dan password.

TBD:

- bentuk tambah/edit tugas;
- bentuk tambah/edit jadwal;
- bentuk akses notifikasi;
- detail tata letak halaman.

## 18. Kriteria Kualitas yang Harus Dijaga Selama Implementasi

- aplikasi harus responsif di browser laptop/desktop dan smartphone;
- target pemuatan halaman utama < 3 detik pada kondisi penggunaan dan koneksi normal;
- password tidak disimpan sebagai teks biasa;
- upload file divalidasi;
- data antar mahasiswa harus terisolasi;
- perubahan status, deadline, dashboard, daftar tugas, dan notifikasi harus konsisten.

Definisi environment pengujian performa: **TBD**.

## 19. Keputusan Teknis yang Sengaja Belum Dibuat

Hal-hal berikut tidak boleh diasumsikan sebelum dibahas:

- versi Laravel;
- versi PHP;
- DBMS;
- package/library;
- frontend stack;
- mekanisme autentikasi Laravel;
- struktur folder khusus;
- nama tabel dan kolom;
- tipe data;
- migration;
- model;
- controller;
- route;
- service/repository pattern;
- storage driver;
- scheduler;
- queue;
- hosting/deployment;
- testing framework;
- CI/CD;
- branch strategy Git;
- konfigurasi OpenCode.
