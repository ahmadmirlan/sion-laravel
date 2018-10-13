# sion-laravel Intro

Sistem Informasi Online - Kampus adalah sebuah web aplikasi yang dibangun menggunakan bahasa PHP yang telah dibalut dengan framewrk laravel. Fungsi dari web aplikasi ini adalah untuk memanajemen data kampus, seperti menangani penambahan mahasiswa, dosen, kelas, matakuliah, dan lainnya.

# Cara instal 

1. Buat database baru dengan nama sion atau sesuai yang diinginkan, tetapi lakukan penyesuaian pada .env
2. Bukan terminal dan arhakan ke folder project.
3. Migrasikan database paa project dengan perintah => php artisan migrate.
4. Untuk menjalakan secara lokal gunakan perintah => php artisan serve.
5. Buka browser dan akses 127.0.0.1:8000


# Catatan
1. Ketika mendaftarakan mahasiswa baru ataupun dosen, maka user tersebut akan memiliki password secara default,
2. Password untuk user dengan role mahasiswa: 'mahasiswastikom',
3. Password untuk user dengan role dosen: 'dosenstikom',

# Penting
Jika ingin menggunakan project ini, saya asumsikan sudah mengenal dasar-dasar konfigurasi pada laravel

# NB
Ketika pertama kali berhasil menjalakan web app ini, tidak satupun terdapat administrator sehingga harus mendaftarkan administrator secara manual melalui database. Setelah terdapat seorang administrator baru web app ini dapat difungsikan.

Jika mendaftarkan Admin secara langsung melalui database gunakan password berikut: $2y$10$.G2DVpZZ7F.0o.4abG6h0u5sE7VMIVdhc11A1v2haL/f98UOyse2G ,jika di encode memiliki hasil 'ahmadmirlan' pada form login maka gunakan password 'ahmadmirlan'
