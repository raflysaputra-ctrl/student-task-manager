# Requirements

## 1. Ringkasan Aplikasi

Aplikasi adalah **aplikasi web manajemen akademik pribadi untuk mahasiswa** yang membantu mahasiswa mengelola tugas kuliah, deadline, progres pengerjaan, mata kuliah, jadwal kuliah, lampiran soal, dan notifikasi dalam satu tempat.

Masalah yang ingin diselesaikan adalah pengelolaan tugas yang masih tersebar atau dilakukan secara manual, misalnya melalui WhatsApp dan aplikasi catatan, sehingga mahasiswa dapat kesulitan mengetahui tugas yang belum dikerjakan, deadline, progres, dan tugas yang perlu diprioritaskan.

## 2. Target Pengguna

Target pengguna aplikasi adalah **mahasiswa secara umum**, tanpa dibatasi program studi atau kampus tertentu.

## 3. Role Pengguna

Aplikasi hanya memiliki satu role:

- **Mahasiswa**

Tidak ada role admin, dosen, ketua kelas, atau role lain pada scope yang telah disepakati.

Setiap mahasiswa memiliki akun sendiri dan hanya dapat melihat serta mengelola data miliknya sendiri.

## 4. Scope Aplikasi

### 4.1 Masuk Scope

Aplikasi mencakup:

- akun mahasiswa;
- mata kuliah;
- jenis mata kuliah **Teori** atau **Praktikum**;
- tugas kuliah;
- deadline tugas berupa tanggal dan jam;
- status tugas;
- prioritas otomatis berdasarkan deadline;
- kondisi terlambat otomatis;
- dashboard ringkas;
- filter tugas berdasarkan jenis mata kuliah;
- jadwal kuliah mingguan;
- soal/instruksi tugas dalam bentuk teks;
- beberapa file lampiran soal;
- notifikasi di dalam aplikasi web;
- penghapusan otomatis file soal 30 hari setelah tugas selesai;
- pencarian tugas;
- filter tugas lanjutan;
- sorting tugas;
- kalender tugas;
- statistik produktivitas;
- arsip tugas;
- semester.

### 4.2 Di Luar Scope Saat Ini

Hal-hal berikut tidak termasuk dalam scope yang telah disepakati:

- admin;
- dosen;
- grup kelas;
- kolaborasi antar mahasiswa;
- berbagi tugas antar akun;
- chat;
- AI;
- integrasi WhatsApp;
- integrasi LMS kampus;
- integrasi Google Calendar;
- aplikasi Android/iOS;
- sistem penilaian;
- absensi.

## 5. MVP

### 5.1 MVP Inti

Fitur MVP inti:

1. Registrasi akun mahasiswa.
2. Login.
3. Logout.
4. Kelola mata kuliah.
5. Jenis mata kuliah Teori/Praktikum.
6. Tambah tugas.
7. Lihat daftar tugas.
8. Lihat detail tugas.
9. Edit tugas.
10. Hapus tugas.
11. Ubah status tugas.
12. Deadline tanggal dan jam.
13. Prioritas otomatis berdasarkan deadline.
14. Kondisi terlambat otomatis.
15. Filter tugas **Semua / Teori / Praktikum**.
16. Dashboard ringkas.

### 5.2 Pengembangan Lanjutan dalam Versi Utama

Setelah MVP inti stabil:

- jadwal kuliah mingguan;
- upload beberapa file soal;
- penghapusan otomatis file soal setelah 30 hari;
- notifikasi dalam aplikasi.

## 6. Fitur Tambahan

Fitur tambahan yang telah dipilih:

1. **Pencarian tugas** berdasarkan judul.
2. **Filter tambahan** berdasarkan status, kondisi terlambat, dan prioritas.
3. **Sorting tugas** berdasarkan deadline, prioritas, atau mata kuliah.
4. **Kalender tugas** untuk melihat deadline berdasarkan tanggal.
5. **Statistik produktivitas**.
6. **Arsip tugas** untuk memisahkan histori tugas selesai dari daftar tugas aktif.
7. **Semester** untuk mengelompokkan mata kuliah berdasarkan periode akademik.

Detail metrik statistik produktivitas: **TBD**.

Detail atribut semester: **TBD**.

## 7. Kebutuhan Fungsional

### 7.1 Akun Mahasiswa

**FR-01** Sistem harus memungkinkan mahasiswa melakukan registrasi akun.

**FR-02** Sistem harus memungkinkan mahasiswa melakukan login.

**FR-03** Sistem harus memungkinkan mahasiswa melakukan logout.

**FR-04** Sistem harus memastikan mahasiswa hanya dapat mengakses data miliknya sendiri.

### 7.2 Mata Kuliah

**FR-05** Sistem harus memungkinkan mahasiswa menambahkan mata kuliah.

**FR-06** Sistem harus memungkinkan mahasiswa melihat daftar mata kuliah miliknya.

**FR-07** Sistem harus memungkinkan mahasiswa mengubah data mata kuliah.

**FR-08** Sistem harus memungkinkan mahasiswa menghapus mata kuliah sesuai aturan bisnis.

**FR-09** Sistem harus memungkinkan setiap mata kuliah dikategorikan sebagai **Teori** atau **Praktikum**.

**FR-10** Sistem harus menyediakan halaman detail mata kuliah.

**FR-11** Halaman detail mata kuliah harus dapat menampilkan informasi mata kuliah, jadwal terkait, dan tugas terkait.

### 7.3 Tugas

**FR-12** Sistem harus memungkinkan mahasiswa membuat tugas.

**FR-13** Setiap tugas harus terhubung dengan satu mata kuliah milik mahasiswa tersebut.

**FR-14** Sistem harus memungkinkan mahasiswa melihat daftar tugas.

**FR-15** Sistem harus memungkinkan mahasiswa melihat detail tugas.

**FR-16** Sistem harus memungkinkan mahasiswa mengubah tugas.

**FR-17** Sistem harus memungkinkan mahasiswa menghapus tugas.

**FR-18** Setiap tugas harus memiliki deadline berupa tanggal dan jam.

**FR-19** Sistem harus memungkinkan tugas memiliki teks soal/instruksi.

**FR-20** Sistem harus memungkinkan tugas memiliki beberapa file lampiran soal.

**FR-21** Teks soal dan file lampiran boleh digunakan secara bersamaan.

**FR-22** Tugas boleh dibuat tanpa teks soal dan tanpa file lampiran.

### 7.4 Status Tugas

Status yang tersedia:

1. **Belum Dikerjakan**
2. **Belum Selesai**
3. **Selesai**

**FR-23** Tugas baru harus memiliki status awal **Belum Dikerjakan**.

**FR-24** Sistem harus memungkinkan mahasiswa mengubah status tugas.

**FR-25** Perubahan status tidak dibatasi satu arah; status dapat diubah kembali.

**FR-26** Sistem harus menyediakan tindakan langsung **Tandai Selesai** pada alur penyelesaian tugas.

### 7.5 Prioritas dan Deadline

**FR-27** Sistem harus menentukan prioritas tugas secara otomatis berdasarkan deadline.

Aturan yang disepakati:

| Sisa waktu menuju deadline | Prioritas |
|---|---|
| ≤ 2 hari | Tinggi |
| 3–5 hari | Sedang |
| > 5 hari | Rendah |

Definisi teknis batas hari, termasuk penanganan nilai di antara 2 dan 3 hari berdasarkan jam/menit: **TBD**.

**FR-28** Sistem harus mendeteksi tugas yang telah melewati deadline.

**FR-29** Jika deadline telah lewat dan status tugas bukan **Selesai**, sistem harus menampilkan kondisi **Terlambat**.

**FR-30** **Terlambat** bukan status tugas.

### 7.6 Filter dan Urutan Tugas

**FR-31** MVP harus menyediakan filter:

- Semua
- Teori
- Praktikum

**FR-32** Daftar tugas secara default harus mengutamakan:

1. tugas terlambat;
2. deadline paling dekat;
3. deadline berikutnya.

**FR-33** Fitur tambahan harus menyediakan filter berdasarkan:

- status;
- kondisi terlambat;
- prioritas.

**FR-34** Fitur tambahan harus menyediakan sorting berdasarkan:

- deadline;
- prioritas;
- mata kuliah.

**FR-35** Fitur tambahan harus menyediakan pencarian tugas berdasarkan judul.

### 7.7 Dashboard

**FR-36** Sistem harus menyediakan dashboard setelah mahasiswa login.

Dashboard harus menampilkan ringkasan:

- jumlah tugas Belum Dikerjakan;
- jumlah tugas Belum Selesai;
- jumlah tugas Selesai;
- jumlah tugas Terlambat;
- tugas dengan deadline terdekat.

Dashboard juga direncanakan menampilkan jadwal kuliah hari ini setelah modul jadwal tersedia.

Detail jumlah item deadline terdekat yang ditampilkan: **TBD**.

### 7.8 Jadwal Kuliah

**FR-37** Sistem harus memungkinkan mahasiswa mengelola jadwal kuliah mingguan.

Setiap jadwal memuat:

- mata kuliah;
- hari;
- jam mulai;
- jam selesai;
- ruangan.

**FR-38** Satu mata kuliah boleh memiliki lebih dari satu jadwal dalam satu minggu.

**FR-39** Jika terjadi bentrok jadwal, sistem harus memberi peringatan tetapi tetap mengizinkan penyimpanan.

### 7.9 Lampiran Soal

**FR-40** Satu tugas boleh memiliki beberapa file lampiran soal.

**FR-41** Ukuran maksimal adalah **10 MB per file**.

**FR-42** Format file yang diperbolehkan:

- PDF
- DOC
- DOCX
- PPT
- PPTX
- JPG
- JPEG
- PNG

Batas maksimal jumlah file per tugas: **TBD**.

### 7.10 Penghapusan File Otomatis

**FR-43** Ketika tugas berubah menjadi **Selesai**, periode penyimpanan file soal selama 30 hari mulai dihitung.

**FR-44** Setelah 30 hari, file soal harus dihapus.

**FR-45** Penghapusan file tidak menghapus:

- data tugas;
- teks soal.

**FR-46** Jika tugas diubah dari **Selesai** kembali menjadi status belum selesai sebelum file dihapus, proses penghapusan file harus dibatalkan.

**FR-47** Jika tugas kemudian kembali ditandai **Selesai**, periode 30 hari dihitung ulang dari waktu penyelesaian terbaru.

Perilaku apabila file baru ditambahkan ke tugas yang sudah berstatus Selesai: **TBD**.

### 7.11 Notifikasi

**FR-48** Notifikasi untuk saat ini hanya tersedia di dalam aplikasi web.

**FR-49** Sistem harus membuat notifikasi ketika tugas pertama kali masuk prioritas **Tinggi**.

**FR-50** Sistem harus membuat notifikasi ketika tugas pertama kali menjadi **Terlambat**.

**FR-51** Notifikasi untuk kondisi yang sama tidak boleh dibuat berulang-ulang.

**FR-52** Notifikasi memiliki status:

- Belum Dibaca
- Sudah Dibaca

Apakah notifikasi ditampilkan hanya melalui ikon lonceng, melalui halaman khusus, atau keduanya: **TBD**.

Kebijakan retensi/penghapusan notifikasi lama: **TBD**.

### 7.12 Semester, Arsip, Kalender, dan Statistik

**FR-53** Fitur tambahan harus memungkinkan mahasiswa membuat dan menggunakan semester untuk mengelompokkan mata kuliah.

**FR-54** Fitur tambahan harus menyediakan arsip tugas selesai.

**FR-55** Fitur tambahan harus menyediakan kalender tugas berdasarkan tanggal deadline.

**FR-56** Fitur tambahan harus menyediakan statistik produktivitas.

Detail struktur semester, mekanisme arsip, tampilan kalender, dan metrik statistik: **TBD**.

## 8. Kebutuhan Nonfungsional

**NFR-01 — Responsif**  
Aplikasi harus nyaman digunakan melalui browser pada laptop/desktop dan smartphone.

**NFR-02 — Keamanan**  
Aplikasi tetap sederhana sebagai proyek belajar, tetapi harus mengikuti praktik keamanan Laravel yang baik.

Kebutuhan minimum yang sudah disepakati:

- pengguna harus login untuk mengakses data pribadi;
- mahasiswa hanya dapat mengakses data miliknya sendiri;
- manipulasi URL/request tidak boleh memungkinkan akses ke data mahasiswa lain;
- password tidak boleh disimpan sebagai teks biasa;
- upload file harus divalidasi.

**NFR-03 — Ukuran File**  
Maksimal **10 MB per file**.

**NFR-04 — Format File**  
File yang diperbolehkan:

- PDF
- DOC
- DOCX
- PPT
- PPTX
- JPG
- JPEG
- PNG

**NFR-05 — Performa**  
Target waktu pemuatan halaman utama adalah **kurang dari 3 detik** pada kondisi penggunaan dan koneksi normal.

Definisi lingkungan pengujian performa: **TBD**.

**NFR-06 — Kemudahan Penggunaan**

Aplikasi harus:

- memiliki navigasi yang mudah dipahami;
- tidak membutuhkan banyak langkah untuk mencatat tugas;
- menampilkan deadline dan kondisi tugas dengan jelas;
- tidak menggunakan istilah teknis yang membingungkan pengguna.

**NFR-07 — Konsistensi Data**  
Perubahan status tugas, deadline, dan penghapusan data harus menghasilkan informasi yang konsisten pada dashboard, daftar tugas, dan notifikasi.

## 9. User Flow

### 9.1 Pengguna Baru

```text
Buka aplikasi
→ Registrasi
→ Dashboard kosong
→ Aplikasi mengarahkan pengguna untuk menambahkan mata kuliah
→ Tambah mata kuliah
→ Tambah tugas
```

Setelah registrasi, pengguna masuk ke dashboard, bukan langsung ke form tambah mata kuliah.

### 9.2 Login Pengguna Lama

```text
Buka aplikasi
→ Login
→ Dashboard
```

### 9.3 Membuat Tugas Ketika Belum Ada Mata Kuliah

```text
Dashboard
→ Tambah Tugas
→ Sistem mendeteksi belum ada mata kuliah
→ Sistem memberi informasi bahwa mata kuliah harus dibuat terlebih dahulu
→ Tersedia tindakan Tambah Mata Kuliah
→ Setelah mata kuliah tersedia, pengguna dapat melanjutkan membuat tugas
```

### 9.4 Alur Tugas

```text
Tambah Tugas
→ Status otomatis Belum Dikerjakan
→ Tugas muncul dalam daftar
→ Mahasiswa mulai mengerjakan
→ Status dapat diubah menjadi Belum Selesai
→ Mahasiswa menyelesaikan tugas
→ Tandai Selesai
→ Status menjadi Selesai
```

Jika ada kesalahan, status dapat diubah kembali.

### 9.5 Deadline Terlewat

```text
Deadline terlewat
+ Status bukan Selesai
→ Kondisi otomatis Terlambat
→ Notifikasi terlambat dibuat satu kali
```

### 9.6 Tugas Selesai

Untuk MVP, tugas berstatus **Selesai** tetap muncul di daftar tugas utama dengan tampilan yang dibedakan.

Setelah fitur arsip tersedia, perilaku pemindahan tugas selesai ke arsip: **TBD**.

## 10. Halaman yang Diperlukan

### 10.1 Login
Halaman awal bagi pengguna yang belum login.

### 10.2 Registrasi
Halaman pembuatan akun.

### 10.3 Dashboard
Pusat ringkasan tugas dan informasi penting.

### 10.4 Mata Kuliah
Digunakan untuk melihat dan mengelola mata kuliah.

Tambah dan edit mata kuliah dilakukan dalam konteks **satu halaman**, bukan halaman tambah/edit terpisah.

Bentuk interaksi spesifik, misalnya modal atau form inline: **TBD**.

### 10.5 Detail Mata Kuliah
Menampilkan informasi mata kuliah beserta jadwal dan tugas terkait.

### 10.6 Tugas
Menampilkan daftar dan pengelolaan tugas.

Apakah tambah/edit tugas menggunakan halaman yang sama, modal, form inline, atau halaman terpisah: **TBD**.

### 10.7 Detail Tugas
Menampilkan informasi lengkap tugas, deadline, status, prioritas, kondisi, teks soal, lampiran, dan tindakan **Tandai Selesai**.

### 10.8 Jadwal Kuliah
Menampilkan dan mengelola jadwal kuliah mingguan.

Bentuk UI tambah/edit jadwal: **TBD**.

### 10.9 Notifikasi
Notifikasi harus dapat diakses pengguna.

Apakah berupa halaman khusus, area khusus, ikon lonceng, atau kombinasi: **TBD**.

### 10.10 Profil
Profil versi awal cukup memuat kebutuhan akun yang berkaitan dengan:

- nama;
- email;
- password.

## 11. Navigasi Utama

Navigasi utama yang telah dirancang:

- Dashboard
- Mata Kuliah
- Tugas
- Jadwal
- Notifikasi
- Profil

Tidak ada landing page; pengguna yang belum login diarahkan ke proses login/registrasi.

## 12. Aturan Bisnis

### BR-01 — Kepemilikan Data
Setiap mahasiswa hanya boleh mengakses data miliknya sendiri.

### BR-02 — Nama Mata Kuliah Unik
Nama mata kuliah tidak boleh duplikat dalam satu akun mahasiswa.

Perbedaan huruf besar/kecil tidak membuat nama dianggap berbeda.

Contoh berikut dianggap sama:

- Basis Data
- basis data
- BASIS DATA

Nama yang sama juga tidak boleh dibuat kembali meskipun berada pada semester berbeda.

### BR-03 — Jenis Mata Kuliah
Setiap mata kuliah harus memiliki satu jenis:

- Teori
- Praktikum

### BR-04 — Penghapusan Mata Kuliah
Mata kuliah tidak boleh dihapus jika masih memiliki tugas atau jadwal terkait.

### BR-05 — Jadwal Bentrok
Jadwal bentrok diperbolehkan disimpan, tetapi sistem harus menampilkan peringatan.

### BR-06 — Status Awal
Tugas baru memiliki status **Belum Dikerjakan**.

### BR-07 — Perubahan Status
Status dapat bergerak maju maupun kembali ke status sebelumnya.

### BR-08 — Kondisi Terlambat
Tugas menjadi **Terlambat** jika deadline telah lewat dan status bukan **Selesai**.

### BR-09 — Prioritas
Prioritas dihitung otomatis dari sisa waktu menuju deadline:

- ≤ 2 hari: Tinggi
- 3–5 hari: Sedang
- > 5 hari: Rendah

Jika deadline sudah lewat, kondisi **Terlambat** mendapat perhatian lebih tinggi daripada label prioritas biasa.

### BR-10 — Tugas Tanpa Soal
Tugas boleh dibuat tanpa teks soal dan tanpa lampiran.

### BR-11 — Teks dan File
Teks soal dan file boleh digunakan salah satu, keduanya, atau tidak keduanya.

### BR-12 — Batas File
Maksimal 10 MB per file dengan format yang telah ditetapkan.

### BR-13 — Penghapusan File Setelah Selesai
File soal dihapus 30 hari setelah tugas selesai. Data tugas dan teks soal tetap disimpan.

### BR-14 — Membuka Kembali Tugas
Jika tugas selesai dibuka kembali sebelum penghapusan file, proses penghapusan dibatalkan. Jika kembali selesai, hitungan 30 hari dimulai ulang.

### BR-15 — Notifikasi
Notifikasi dibuat satu kali ketika tugas pertama kali masuk prioritas Tinggi dan satu kali ketika pertama kali menjadi Terlambat.

### BR-16 — Status Baca Notifikasi
Notifikasi memiliki status Belum Dibaca dan Sudah Dibaca.
