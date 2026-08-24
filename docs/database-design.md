# Database Design

> Dokumen ini hanya mendeskripsikan **desain data konseptual dan relasi yang sudah disepakati**. Nama tabel, nama kolom teknis, tipe data SQL, primary key, foreign key, index, constraint database, engine database, dan migration Laravel belum diputuskan dan ditandai sebagai **TBD**.

## 1. Prinsip Umum

- Data setiap mahasiswa bersifat pribadi.
- Seorang mahasiswa hanya boleh mengakses data miliknya sendiri.
- Desain database harus mendukung mata kuliah, tugas, jadwal, lampiran soal, notifikasi, dan fitur semester pada tahap lanjutan.
- Implementasi database fisik: **TBD**.
- DBMS yang digunakan: **TBD**.

## 2. Entitas Konseptual

### 2.1 Mahasiswa

Mewakili akun pengguna aplikasi.

Data yang sudah diputuskan:

- nama;
- email;
- password.

Atribut teknis tambahan: **TBD**.

Aturan:

- satu mahasiswa hanya boleh mengakses data miliknya sendiri.

### 2.2 Mata Kuliah

Mewakili mata kuliah yang dibuat oleh mahasiswa.

Data yang sudah diputuskan:

- nama mata kuliah;
- jenis mata kuliah.

Nilai jenis:

- Teori;
- Praktikum.

Aturan:

- nama mata kuliah harus unik dalam satu akun mahasiswa;
- pembandingan nama bersifat tidak sensitif terhadap huruf besar/kecil;
- nama yang sama tidak boleh dibuat kembali meskipun berada pada semester berbeda;
- mata kuliah tidak boleh dihapus jika masih memiliki tugas atau jadwal terkait.

### 2.3 Tugas

Mewakili tugas kuliah.

Data yang sudah diputuskan:

- judul;
- mata kuliah;
- teks soal/instruksi, opsional;
- deadline tanggal dan jam;
- status.

Nilai status:

- Belum Dikerjakan;
- Belum Selesai;
- Selesai.

Nilai/keadaan yang dihitung dari data lain:

- prioritas;
- kondisi Terlambat.

Prioritas tidak dipilih manual.

Aturan prioritas:

| Sisa waktu menuju deadline | Prioritas |
|---|---|
| ≤ 2 hari | Tinggi |
| 3–5 hari | Sedang |
| > 5 hari | Rendah |

Definisi teknis perhitungan batas hari: **TBD**.

Kondisi Terlambat berlaku jika:

- deadline sudah lewat; dan
- status bukan Selesai.

Penyimpanan prioritas dan kondisi Terlambat sebagai nilai fisik di database atau dihitung saat dibutuhkan: **TBD**.

Data waktu yang diperlukan untuk mendukung penghapusan file 30 hari setelah tugas selesai, termasuk representasi waktu penyelesaian terbaru: **TBD**.

### 2.4 Jadwal Kuliah

Mewakili jadwal mingguan suatu mata kuliah.

Data yang sudah diputuskan:

- mata kuliah;
- hari;
- jam mulai;
- jam selesai;
- ruangan.

Aturan:

- satu mata kuliah boleh memiliki lebih dari satu jadwal;
- jadwal yang bentrok tetap boleh disimpan;
- sistem harus memberi peringatan jika jadwal bentrok.

Representasi hari di database: **TBD**.

### 2.5 Lampiran Soal

Mewakili file soal yang terhubung ke suatu tugas.

Aturan yang sudah diputuskan:

- satu tugas boleh memiliki beberapa lampiran;
- ukuran maksimal 10 MB per file;
- format yang diperbolehkan:
  - PDF
  - DOC
  - DOCX
  - PPT
  - PPTX
  - JPG
  - JPEG
  - PNG
- file dihapus 30 hari setelah tugas berstatus Selesai;
- data tugas dan teks soal tidak ikut dihapus;
- jika status tugas dibuka kembali sebelum penghapusan, proses penghapusan dibatalkan;
- jika tugas kembali Selesai, hitungan 30 hari dimulai ulang.

Data metadata file yang disimpan: **TBD**.

Lokasi penyimpanan file: **TBD**.

Batas maksimal jumlah file per tugas: **TBD**.

Perilaku file yang diunggah setelah tugas sudah berstatus Selesai: **TBD**.

### 2.6 Notifikasi

Mewakili notifikasi dalam aplikasi web.

Notifikasi berkaitan dengan mahasiswa dan tugas.

Kondisi pemicu yang sudah diputuskan:

1. tugas pertama kali masuk prioritas Tinggi;
2. tugas pertama kali menjadi Terlambat.

Aturan:

- notifikasi untuk kondisi yang sama tidak dibuat berulang-ulang;
- notifikasi memiliki status:
  - Belum Dibaca;
  - Sudah Dibaca.

Data isi notifikasi yang disimpan: **TBD**.

Kebijakan retensi notifikasi: **TBD**.

Cara mencegah duplikasi notifikasi secara fisik di database: **TBD**.

### 2.7 Semester

Semester merupakan fitur tambahan, bukan bagian MVP inti.

Relasi konseptual yang sudah direncanakan:

- satu mahasiswa dapat memiliki semester;
- satu semester dapat memiliki banyak mata kuliah;
- mata kuliah akan dikelompokkan berdasarkan semester.

Atribut semester: **TBD**.

Aturan semester aktif/nonaktif: **TBD**.

## 3. Relasi Konseptual

### 3.1 Mahasiswa ke Mata Kuliah

```text
Mahasiswa 1 ─── banyak Mata Kuliah
```

Makna:

- satu mahasiswa dapat memiliki banyak mata kuliah;
- setiap mata kuliah merupakan data milik mahasiswa tertentu.

### 3.2 Mata Kuliah ke Tugas

```text
Mata Kuliah 1 ─── banyak Tugas
```

Makna:

- satu mata kuliah dapat mempunyai banyak tugas;
- satu tugas hanya terhubung ke satu mata kuliah.

### 3.3 Mata Kuliah ke Jadwal Kuliah

```text
Mata Kuliah 1 ─── banyak Jadwal Kuliah
```

Makna:

- satu mata kuliah dapat mempunyai lebih dari satu jadwal dalam satu minggu;
- satu jadwal mengacu pada satu mata kuliah.

### 3.4 Tugas ke Lampiran Soal

```text
Tugas 1 ─── banyak Lampiran Soal
```

Makna:

- satu tugas dapat mempunyai beberapa file lampiran;
- satu lampiran merupakan file dari satu tugas.

### 3.5 Mahasiswa ke Notifikasi

```text
Mahasiswa 1 ─── banyak Notifikasi
```

Makna:

- satu mahasiswa dapat memiliki banyak notifikasi;
- setiap notifikasi dimiliki mahasiswa tertentu.

### 3.6 Tugas ke Notifikasi

Tugas dapat memicu notifikasi prioritas Tinggi dan/atau Terlambat.

Cardinality fisik dan bentuk foreign key: **TBD**.

### 3.7 Semester ke Mata Kuliah

Setelah fitur semester dibuat:

```text
Mahasiswa
   │
   └── Semester
          │
          └── Mata Kuliah
                 │
                 ├── Tugas
                 │      └── Lampiran Soal
                 │
                 └── Jadwal Kuliah
```

Cardinality teknis dan aturan jika mata kuliah belum ditempatkan pada semester: **TBD**.

## 4. Diagram Konseptual Versi MVP

```text
Mahasiswa
   │
   ├── Mata Kuliah
   │      │
   │      ├── Tugas
   │      │     │
   │      │     └── Lampiran Soal
   │      │
   │      └── Jadwal Kuliah
   │
   └── Notifikasi
```

## 5. Constraint Konseptual

### 5.1 Kepemilikan
Semua data pribadi harus tetap terisolasi antar mahasiswa.

### 5.2 Unik Mata Kuliah
Nama mata kuliah harus unik per mahasiswa dan tidak sensitif terhadap kapitalisasi.

Contoh berikut dianggap duplikat:

- Basis Data
- basis data
- BASIS DATA

### 5.3 Penghapusan Mata Kuliah
Penghapusan ditolak jika mata kuliah masih memiliki tugas atau jadwal.

### 5.4 Status Tugas
Nilai status hanya:

- Belum Dikerjakan
- Belum Selesai
- Selesai

Status awal tugas baru adalah Belum Dikerjakan.

### 5.5 File
Ukuran maksimal adalah 10 MB per file dan format harus sesuai daftar yang diizinkan.

### 5.6 Jadwal
Bentrok jadwal tidak menjadi constraint yang menolak penyimpanan; bentrok hanya menghasilkan peringatan.

### 5.7 Notifikasi
Notifikasi untuk pemicu yang sama pada tugas yang sama tidak boleh dibuat berulang.

## 6. Keputusan Database yang Masih TBD

Hal-hal berikut belum diputuskan dan tidak boleh diasumsikan pada tahap ini:

- DBMS yang digunakan;
- nama tabel fisik;
- nama kolom fisik;
- tipe data SQL;
- primary key;
- foreign key;
- index;
- timestamp teknis;
- soft delete atau hard delete;
- aturan cascade/restrict di level database;
- apakah prioritas disimpan atau dihitung;
- apakah kondisi Terlambat disimpan atau dihitung;
- cara menyimpan waktu penyelesaian terakhir;
- metadata file yang disimpan;
- lokasi penyimpanan file;
- batas jumlah lampiran per tugas;
- struktur fisik notifikasi;
- atribut semester;
- constraint teknis untuk nama mata kuliah case-insensitive;
- mekanisme scheduling untuk penghapusan file otomatis.
