# PEMPROGRAMAN WEB FINAL PROJECT

# Kelompok 5 < MI 2022 C

**Software Requirements Specification**

**for**

**Perancangan Website Crafted Merch Customized**

**Version 1.0 approved**

Prepared by:

22091397078 – Muhammmad Zacky Zamzamy

22091397088 - Maulana Arridho

22091397103 - Nur Puspita Amalia

D4 Manajemen Informatika

Fakultas Vokasi Universitas Negeri Surabaya

2022

**1. Pendahuluan**

**1.1.Tujuan**

Dokumen ini bertujuan untuk mendefinisikan kebutuhan dan spesifikasi sistem untuk pengembangan website "Crafted Merch Customized". Website ini akan digunakan untuk memungkinkan pengguna untuk merancang dan memesan produk merchandise yang dapat disesuaikan sesuai dengan preferensi mereka. Dokumen ini akan menjadi panduan bagi tim pengembangan dalam merancang dan mengimplementasikan situs web.

**1.2. Audiens Yang Dituju**

Dokumen ditujukan untuk berbagai jenis pembaca dan pihak terkait yang terlibat dalam pengembangan, pengelolaan, dan penggunaan website ini. Dokumen ini dirancang untuk memberikan panduan yang komprehensif kepada semua pihak yang terlibat dalam proyek "Crafted Merch Customized" untuk mencapai kesuksesan pengembangan dan penggunaan website ini.

**1.3. Batasan Produk**

Produk ini hanya mencakup pembuatan dan pembelian produk merchandise seperti kaos, hoodie, topi, lanyard, totebag, dan produk merchandise lainnya. Produk ini tidak mencakup pembuatan atau pembelian produk non-merchandise seperti makanan, minuman, atau barang-barang non-merchandise lainnya. Produk ini juga tidak mencakup pengembangan atau pemeliharaan fitur-fitur analitik atau pelaporan yang kompleks.

**1.4. Definisi dan Istilah**

Berikut adalah definisi dan penjelasan singkat untuk istilah-istilah yang mungkin memerlukan klarifikasi:

- SRS (Software Requirements Specification): Dokumen ini sendiri, yang merupakan Spesifikasi Kebutuhan Perangkat Lunak. SRS menguraikan secara terperinci persyaratan perangkat lunak yang akan dikembangkan.
- IEEE (Institute of Electrical and Electronics Engineering): Sebuah organisasi internasional yang mengembangkan standar untuk berbagai bidang teknik, termasuk standar terkait pengembangan perangkat lunak. IEEE sering kali diacu dalam konteks standar industri dan praktik terbaik.

**1.5. Referensi**

Referensi-Referensi berikut ini adalah sumber-sumber yang relevan dan dapat memberikan wawasan yang diperlukan untuk proyek "Crafted Merch Customized." Mereka dapat digunakan sebagai bahan referensi tambahan untuk lebih memahami konteks dan kebutuhan proyek ini:

- [Referensi 1]: Merchie - Jasa Konveksi Profesional
  Situs web Merchie menyediakan layanan konveksi profesional yang dapat memberikan wawasan tentang proses pembuatan produk merchandise. Ini adalah referensi yang relevan untuk memahami tahapan produksi.

- [Referensi 2]: DYOTees Sablon, Sublim & Konveksi Terbaik Jakarta
  Referensi ini mengarahkan pembaca ke penyedia layanan sablon dan konveksi di Jakarta. Ini bisa menjadi referensi

**2. Deskripsi Keseluruhan**

**2.1. Deskripsi Produk**

Website Crafted Merch Customized adalah sebuah platform e-commerce yang dirancang khusus untuk memfasilitasi pembuatan dan pembelian produk merchandise yang dapat disesuaikan sepenuhnya oleh pengguna. Platform ini memiliki tujuan utama untuk menggabungkan kualitas tinggi dengan kreativitas tak terbatas, memberikan pengguna kemampuan untuk merancang produk merchandise yang unik sesuai dengan preferensi dan gaya mereka sendiri.

Platform ini menyediakan berbagai jenis produk merchandise yang dapat dipesan, seperti

- Kaos: Pengguna dapat memilih berbagai gaya, ukuran, dan warna kaos, dan mereka juga dapat menambahkan desain mereka sendiri.
- Hoodie: Pengguna memiliki fleksibilitas dalam memilih bahan, model, warna, dan desain untuk hoodie yang mereka inginkan.
- Topi: Berbagai jenis topi tersedia untuk dipesan, dan pengguna dapat menyesuaikan warna, logo, atau gambar yang akan dicetak pada topi.
- Lanyard: Pengguna dapat memilih warna dan desain lanyard sesuai kebutuhan mereka.
- Totebag: Totebag tersedia dalam berbagai ukuran dan desain, dan pengguna dapat mempersonalisasi desainnya.

Platform ini juga menyediakan fitur-fitur berikut:

- Pengunggahan Gambar: Pengguna dapat mengunggah gambar mereka sendiri untuk digunakan dalam desain merchandise.
- Penambahan Teks atau Pesan Pribadi: Pengguna dapat menambahkan teks atau pesan khusus ke produk mereka.
- Pilihan Warna dan Ukuran: Pengguna dapat memilih warna dan ukuran produk yang diinginkan.
- Pengelolaan Pesanan: Pengguna dapat melacak status pesanan mereka dari tahap pembuatan hingga pengiriman, dan mereka akan menerima informasi terkait dengan pengiriman.
- Kontrol Kualitas: Seluruh produk melewati kontrol kualitas ketat untuk memastikan kualitas tinggi.
- Berbagi di Media Sosial: Pengguna diundang untuk berbagi desain dan pembelian mereka di media sosial, meningkatkan visibilitas platform.

**2.2. Penggolongan Karakteristik Pengguna**

Dalam pengembangan platform "Crafted Merch Customized," berbagai kategori pengguna telah diidentifikasi, masing-masing dengan tugas, hak akses ke Web Site, dan kemampuan yang harus dimiliki. Berikut adalah penjelasan lebih rinci tentang karakteristik pengguna:

Tabel 1 Karakteristik Pengguna

![tabel 1 karakteristik pengguna](https://github.com/D4ManajemenInformatika/final-project-website-pempro-web-5-mic/assets/120569369/13745bfe-a824-4069-8821-fd1bc0205048)

**2.3. Lingkungan Operasi**

![tabel lingkungan operasi](https://github.com/D4ManajemenInformatika/final-project-website-pempro-web-5-mic/assets/120569369/c54bb06a-eb3a-4daf-bab2-b51e7bce4587)

**2.4. Batasan Desain dan Implementasi**

Batasan desain dan implementasi adalah elemen-elemen yang akan membatasi pilihan yang tersedia untuk para pengembang dalam merancang dan mengimplementasikan platform "Crafted Merch Customized." Berikut adalah penjelasan lebih rinci tentang batasan-batasan tersebut:

1. Ketergantungan pada Jaringan Internet: Platform ini memerlukan ketergantungan pada jaringan internet yang stabil. Pengguna harus terhubung ke internet untuk mengakses dan menggunakan platform. Tanpa akses internet, platform tidak akan berfungsi.
2. Kompatibilitas Browser: Platform ini akan dioptimalkan untuk digunakan pada berbagai browser web utama seperti Chrome, Firefox, Safari, dan Edge. Kompatibilitas dengan browser lainnya mungkin terbatas.
3. Keterbatasan Perangkat Keras: Platform ini akan berjalan pada berbagai perangkat keras, tetapi kinerjanya dapat bervariasi tergantung pada spesifikasi perangkat. Rekomendasi adalah menggunakan perangkat keras yang memiliki kinerja yang memadai untuk pengalaman pengguna yang optimal.
4. Keterbatasan Waktu Pengembangan: Pengembangan platform ini akan terikat pada batasan waktu tertentu sesuai dengan jadwal proyek yang telah ditetapkan. Sebagai hasilnya, fitur-fitur tertentu mungkin harus diprioritaskan atau mungkin tidak termasuk dalam versi awal platform.
5. Kebijakan Privasi dan Keamanan: Platform ini akan mengikuti kebijakan privasi dan keamanan yang berlaku. Ini termasuk perlindungan data pribadi pengguna dan tindakan keamanan untuk melindungi platform dari ancaman keamanan.

Dengan penjelasan ini, batasan-batasan desain dan implementasi menjadi lebih jelas, memungkinkan tim pengembangan untuk memahami kendala-kendala yang akan mereka hadapi selama proses pengembangan platform "Crafted Merch Customized." Pastikan untuk memantau dan mematuhi batasan-batasan ini selama seluruh siklus pengembangan.

**3. Kebutuhan Antarmuka Eksternal**

**3.1. User Interfaces**

Ruang lingkup Website "Crafted Merch Customized" meliputi bagian-bagian yang terdapat dalam Website "Crafted Merch Customized" yang telah dibuat. Berikut deskripsi singkat mengenai ruang lingkup Website Pribadi ini:

**1. Home**

Pada halaman home akan menampilkan “Crafted Merch Customized”, “Our Categories Product”, dan “We Print Your Idea.”

<img width="221" alt="Screenshot 2023-10-23 203454" src="https://github.com/Mavlans990/PEMWEB_5_MIC/assets/144099380/f0cb86c2-21ec-4602-b7ed-3d048676dd57">



**2. Product**

Pada halaman Product kami akan menampilkan halaman shop, seperti : T-Shirt, Headware, Lanyard, Totebag.

1.	Product T-Shirt
   
    <img width="539" alt="Screenshot 2023-10-23 204120" src="https://github.com/Mavlans990/PEMWEB_5_MIC/assets/144099380/38126a78-4465-4421-a4a9-6d9814ce1afc">

    
2.	Product Headware
   
     <img width="482" alt="Screenshot 2023-10-23 204139" src="https://github.com/Mavlans990/PEMWEB_5_MIC/assets/144099380/bdc1df56-c0d1-4a2b-af63-c426aa710844">

   
3.	Product Lanyard
   
     <img width="560" alt="Screenshot 2023-10-23 204248" src="https://github.com/Mavlans990/PEMWEB_5_MIC/assets/144099380/64394528-5a15-4e1f-8a45-5f79f527155a">

   
4.	Product Totebag
   
     <img width="500" alt="Screenshot 2023-10-23 204203" src="https://github.com/Mavlans990/PEMWEB_5_MIC/assets/144099380/36243264-b4d8-484f-a51f-d29a68ce5bb3">


**3. Contact Us**

Pada halaman Contact kami akan menampilkan halaman untuk login dan registrasi, “how did you find us”, phone, dan email untuk menghubungi kami.

  <img width="383" alt="Screenshot 2023-10-23 203520" src="https://github.com/Mavlans990/PEMWEB_5_MIC/assets/144099380/b138a44b-95d3-4eb4-8934-48ea0394cd63">
    

**4. About**

Pada halaman About akan menceritakan tentang diri kami, yaitu “Crafted Merch Customized” adalah brand yang bisa memadukan kualitas tinggi dengan kreativitas tak terbatas. Menawarkan berbagai macam merchandise, mulai dari baju kaos, hoodie, topi, lanyard, hingga totebag, yang dapat disesuaikan sepenuhnya dengan desain pilihan pelanggan.

   <img width="381" alt="Screenshot 2023-10-23 203536" src="https://github.com/Mavlans990/PEMWEB_5_MIC/assets/144099380/05a75f88-c9af-4522-839a-fb1e0569526c">



**3.2. Hardware Interface**

platform "Crafted Merch Customized" agar dapat diakses dengan optimal. Berikut penjelasan yang lebih terperinci:

1. Perangkat Seluler (Smartphone): Pengguna dapat mengakses platform ini melalui perangkat seluler yang mendukung sistem operasi Android dan iOS. Platform ini akan dioptimalkan untuk tampil dan berfungsi dengan baik pada perangkat seluler seperti smartphone dan tablet. Beberapa fitur yang mungkin digunakan pada perangkat seluler termasuk penelusuran produk, penyesuaian desain, dan pemesanan merchandise.
2. Kompatibilitas Browser: Selain perangkat seluler, pengguna juga dapat mengakses platform melalui browser web di laptop dan PC. Platform ini akan dioptimalkan untuk kompatibilitas dengan berbagai browser web utama, seperti Chrome, Firefox, Safari, dan Edge. Namun, kompatibilitas dengan browser lain mungkin terbatas.
   10
3. Spesifikasi Minimal Perangkat: Meskipun platform ini dapat diakses melalui berbagai perangkat seluler dan komputer, kinerja platform dapat bervariasi tergantung pada spesifikasi perangkat. Rekomendasi adalah menggunakan perangkat dengan spesifikasi yang memadai, seperti koneksi internet yang stabil dan tampilan layar yang memadai, untuk pengalaman pengguna yang optimal.

**3.3. Software Interfaces**

Bagian "Software Interface" menjelaskan perangkat lunak dan teknologi yang akan digunakan dalam pengembangan dan operasi platform "Crafted Merch Customized." Berikut penjelasan yang lebih terperinci:

1. Visual Studio Code Editor: Visual Studio Code Editor adalah Web Site yang akan digunakan untuk mengembangkan platform ini. Ini adalah editor sumber daya ringan, kuat, dan dapat disesuaikan yang memungkinkan para pengembang untuk membuat dan mengedit kode dengan efisien. Selain itu, alat ini akan digunakan untuk mengelola sumber daya proyek dan mengelola berbagai file dan skrip yang terlibat dalam pengembangan.
2. HTML (HyperText Markup Language): HTML adalah bahasa markup yang akan digunakan untuk membuat struktur dan konten website. Penggunaan HTML akan memungkinkan para pengembang untuk mendefinisikan elemen-elemen halaman web, termasuk teks, gambar, tautan, dan elemen-elemen lainnya yang membentuk tampilan dan struktur halaman.
3. CSS (Cascading Style Sheets): CSS adalah bahasa yang digunakan untuk mengatur tampilan dan desain website. Dengan CSS, para pengembang dapat mengontrol warna, tata letak, font, dan estetika keseluruhan platform. Ini akan memastikan tampilan yang konsisten dan menarik bagi pengguna.
4. Web Hosting: Web hosting akan digunakan untuk menyimpan dan mengelola database serta konten platform. Ini mencakup penyimpanan data produk, desain pengguna, dan informasi lainnya yang diperlukan untuk operasi platform.

**3.4. comunication Interfaces**

Bagian "Communication Interface" menjelaskan bagaimana platform "Crafted Merch Customized" berinteraksi dengan pengguna dan bagaimana komunikasi antara pengguna dan platform tersebut terjadi. Berikut penjelasan yang lebih terperinci:

1. Halaman Contact Us
   Pengguna dapat menghubungi platform ini melalui halaman "Contact." Pada halaman ini, pengguna akan menemukan informasi kontak yang mencakup nomor telepon dan alamat email yang dapat digunakan untuk menghubungi tim dukungan atau perusahaan. Selain itu, pengguna juga dapat memberikan umpan balik melalui formulir "How Did You Find Us."
2. Halaman Home
   Pengguna dapat memulai proses pemesanan produk merchandise pada halaman "Home" dengan mengklik tombol "We Print Your Ideas." Tombol ini akan mengarahkan pengguna ke halaman pemesanan khusus di mana mereka dapat memilih produk, mengunggah desain mereka sendiri, dan melakukan pemesanan.
3. Notifikasi Transaksi
   Pengguna akan menerima notifikasi langsung tentang status transaksi mereka. Notifikasi ini mencakup konfirmasi pesanan setelah pemesanan dilakukan, pembaruan tentang status pengiriman, dan pemberitahuan tentang penawaran khusus atau promosi. Notifikasi akan dikirim kepada pengguna melalui beberapa saluran komunikasi:

- Pesan Teks: Pengguna dapat menerima notifikasi melalui pesan teks ke nomor yang mereka daftarkan.
- Notifikasi Push: Web Site dapat mengirimkan notifikasi push langsung ke perangkat pengguna.
- Email: Pengguna juga akan menerima notifikasi melalui email ke alamat yang mereka daftarkan.

**4. Functional Requirements**

Bagian ini akan menggambarkan kebutuhan fungsional untuk produk "Crafted Merch Customized" yang mencakup fitur-fitur sistem dan layanan utama yang akan disediakan oleh produk ini. Kebutuhan ini akan diorganisir dalam bentuk tabel dengan ID dan penjelasan yang diperlukan.

![Functional Requirement](https://github.com/D4ManajemenInformatika/final-project-website-pempro-web-5-mic/assets/120569369/7df5e136-4882-4eb9-9db5-c952058d06d6)

**4.1. Use Case Diagram**

Gambaran use case diagramnya dari functional requirement yang didapatkan.

![usecase website](https://github.com/Mavlans990/PEMWEB_5_MIC/assets/144099380/178fa134-8ca4-4483-ad03-f0a60ca79ccf)


**4.2. Penjelasan Use Case**

**4.2.1. Deskripsi Use Case**

Use case ini mencakup pengalaman pengguna dari pelanggan yang memilih, menyesuaikan, dan memesan produk, hingga admin dan pengrajin yang mengelola produksi dan operasi situs web. Ini adalah platform yang memungkinkan pelanggan untuk mendapatkan produk yang disesuaikan dengan desain mereka sendiri, sementara memberikan pengelolaan yang efisien untuk admin dan pengrajin.

1. Customer (Pelanggan):

- Melihat Beranda: Pelanggan dapat mengakses beranda situs web untuk menelusuri berbagai produk yang ditawarkan oleh "Crafted Merch Customized Froques."
- Melakukan Registrasi: Pelanggan dapat mendaftar sebagai anggota untuk membuat akun pribadi di situs web.
- Melakukan Login: Setelah registrasi, pelanggan dapat melakukan login ke akun mereka untuk mengakses fitur tambahan.
- Mengelola Produk: Pelanggan dapat menjelajahi produk-produk yang tersedia, menambahkannya ke keranjang belanja, dan mengelola produk dalam keranjang belanja mereka.
- Melakukan Pemesanan: Pelanggan dapat memilih produk yang ingin mereka beli, menyesuaikan produk (froques) sesuai dengan keinginan mereka, dan melakukan pemesanan.
- Mengelola List Pemesanan: Pelanggan dapat melihat, mengedit, atau menghapus pesanan yang telah mereka buat sebelumnya.

2. Admin:

- Mengakses Home: Admin dapat mengakses beranda situs web untuk mengawasi operasi dan melihat statistik situs.
- Logout: Admin dapat melakukan logout dari akun admin mereka untuk keluar dari sistem.
- Mengelola Data: Admin dapat mengelola data penting seperti inventaris produk, harga, deskripsi produk, dan informasi pelanggan.
- Produksi: Admin dapat mengawasi proses produksi untuk memastikan pesanan pelanggan diproses dengan benar.

3. Costurer (Pengrajin):

- Cetak Laporan Pemesanan: Costurer dapat mengakses laporan pesanan yang perlu mereka proses, mencetaknya, dan mempersiapkan pesanan sesuai dengan spesifikasi pelanggan.
- Mengelola Data: Costurer dapat mengelola data yang berhubungan dengan produksi, termasuk inventaris bahan dan status pesanan.
- Laporan: Costurer dapat menghasilkan laporan terkait dengan produksi dan pesanan yang telah selesai.

  **4.2.2. Stimulus and Respon**
  Menyediakan daftar aksi yang dilakukan oleh user dan respon dari sistem.

![action respon](https://github.com/D4ManajemenInformatika/final-project-website-pempro-web-5-mic/assets/120569369/1710b654-f393-4d03-a3ea-9c8700652732)

**5. Persyaratan Nonfungsional Lainnya**

Kebutuhan non-fungsional untuk platform "Crafted Merch Customized" akan diuraikan dalam tabel berikut:

![Non Functional Requirement](https://github.com/D4ManajemenInformatika/final-project-website-pempro-web-5-mic/assets/120569369/718b186c-e814-4928-9794-b532adb291e3)

Kebutuhan non-fungsional platform "Crafted Merch Customized" menjadi lebih terperinci dan mencakup parameter, kebutuhan, dan catatan yang relevan untuk memastikan kualitas, keamanan, dan kenyamanan dalam penggunaan Web Site.

**6. Persyaratan Lainnya**

**Lampiran A : Glosarium**

Berikut ini daftar istilah dan akronim yang dipakai pada dokumen SRS ini.

• Software: Perangkat lunak atau software adalah program komputer yang menjadi jembatan antara pengguna dengan perangkat keras (hardware). Software terdiri dari beberapa perintah yang dieksekusi oleh mesin komputer dalam menjalankan pekerjaannya. Dalam pembuatannya, software adalah perangkat yang dikembangkan oleh pengembang (developer) atau pemrogram (programmer) menggunakan bahasa pemrograman tertentu dan dapat dikombinasikan dengan kode yang dapat dikenali perangkat keras, di mana dalam hal ini ialah PC atau komputer.

• Website: merupakan fasilitas internet yang menghubungkan dokumen dalam lingkup lokal maupun jarak jauh. Dokumen pada website disebut dengan web page dan link dalam website memungkinkan pengguna bisa berpindah dari satu page ke page lain (hypertext), baik antara page yang disimpan dalam server yang sama maupun server di seluruh dunia. Halaman dapat diakses dan dibaca melalui browser seperti Google Chrome, Mozilla Firefox, dan lainnya (Hakim Lukmanul, 2004).

• Flowchart: Diagram yang menampilkan langkah-langkah dan keputusan untuk melakukan sebuah proses dari suatu program. Setiap langkah digambarkan dalam bentuk diagram dan dihubungkan dengan garis atau arah panah.

• Use Case Diagram: Use case diagram adalah teknik yang biasa digunakan dalam mengembangkan perangkat lunak atau software dengan tujuan untuk mengetahui kebutuhan fungsional dari suatu sistem. Definisi dari use case diagram sendiri adalah proses penggambaran untuk menunjukkan hubungan antara pengguna dengan sistem yang telah dirancang.

**Lampiran B : Analisa Model**

**Flowchart Sistem input product**

  <img width="349" alt="Flowchart sistem input product" src="https://github.com/Mavlans990/PEMWEB_5_MIC/assets/144099380/c5a5408b-c19b-4aca-a195-15b48a66e2e2">

  
**Flowchart sistem pemesanan**

  <img width="393" alt="flowchart sistem pemesanan" src="https://github.com/Mavlans990/PEMWEB_5_MIC/assets/144099380/aa72ecf3-42a8-47f0-aaa3-12802e443603">


**Lampiran C : Penjelasan HTML**

**a. HTML Halaman Home:**

1. `<!DOCTYPE html>` : Ini adalah deklarasi tipe dokumen HTML yang menunjukkan bahwa ini adalah halaman HTML.

2. `<html lang="en">` : Elemen ini adalah elemen pembuka untuk dokumen HTML. Atribut lang menunjukkan bahwa bahasa dokumen adalah Inggris.

3. `<head>`: Ini adalah bagian kepala dokumen HTML yang berisi berbagai elemen metadata dan referensi ke sumber daya eksternal.

     - `<meta charset="UTF-8">` : Menentukan bahwa karakter set dokumen adalah UTF-8, yang mendukung berbagai karakter.
     
     - `<meta name="viewport" content="width=device-width, initial-scale=1.0">` : Mengatur tampilan halaman agar responsif pada berbagai perangkat dengan menyesuaikan lebar tampilan dan skala awal.
     
     - Komentar HTML `(<!-- Google Font -->)` digunakan untuk memberikan komentar dalam kode HTML.
     
     - `<link rel="preconnect" href="https://fonts.googleapis.com">` dan `<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>` : Mengoptimalkan koneksi ke server Google Fonts untuk pengunduhan font yang lebih cepat.
     
     - `<link href="https://fonts.googleapis.com/css2?..." rel="stylesheet">` : Mendefinisikan berbagai font dari Google Fonts yang akan digunakan di halaman web Anda.
     
     - `<link rel="stylesheet" href="css/style.css">` : Menghubungkan halaman dengan berkas CSS eksternal yang disebut "style.css".
     
     - `<title>Craft Merch Customized - Home</title>` : Menetapkan judul halaman web yang akan ditampilkan di tab peramban.
  
4. `<body>` : Ini adalah elemen utama yang berisi konten utama dari halaman web.

5. `<nav class="navbar">` : Ini adalah elemen navigasi yang berisi menu dan logo situs.
       - `<img src="image/Icon/logo.png" alt="" width="70">` : Menampilkan logo situs sebagai gambar dengan lebar 70 piksel.
     
       - `<div class="container-navbar">` : Ini adalah elemen div yang berisi daftar menu navigasi.
     
       - Daftar menu navigasi terdiri dari elemen `<ul>` , `<li>` , dan tautan `<a>'`, termasuk tautan pencarian dengan gambar ikon.
     
       - Elemen `<div class="d-flex align-i-center">` berisi tautan "Login" dan "Register" serta gambar-gambar ikon.
  
6. `<div id="search-box" style="display: none; margin-left: 780px">`: Ini adalah kotak pencarian yang awalnya disembunyikan dengan atribut style, tetapi akan muncul saat dicari. Berisi elemen input teks untuk melakukan pencarian.

7. `div class="product-list" style="display: none">` : Ini adalah daftar produk yang awalnya disembunyikan dan akan muncul saat item "Product" dihover. Daftar ini termasuk tautan ke halaman produk berbeda.

8. `<section class="container-fluid" style="padding: 60px 60px 350px 60px; height: 500px">` : Ini adalah elemen bagian atau "section" pertama yang berisi konten utama halaman.
   - Di dalamnya, terdapat elemen baris `(<div class="row">)` yang dibagi menjadi dua kolom `(<div class="col-6">)`, yang masing-masing berisi judul, deskripsi, dan tautan.

9. `<section class="container-fluid" style="padding: 4rem 0; background: linear-gradient(...)">` : Ini adalah elemen "section" kedua yang berisi konten lainnya.
    
   - Ini juga memiliki elemen `judul, gambar, dan teks` yang menjelaskan kategori produk.

11. `<footer>` : Ini adalah elemen penutup halaman yang berisi informasi kontak dan tautan sosial media.
    
    - Terdapat empat kolom dengan informasi yang berbeda, termasuk tautan ke halaman produk, tautan "Contact Us", dan informasi kontak.
      
    - Terdapat tautan ke sosial media (Twitter, Facebook, dan Instagram).
      
    - Elemen terakhir adalah tanda hak cipta dan informasi hak cipta halaman.

12. `<script src="js/script.js"></script>` : Ini adalah tag script yang menghubungkan halaman web ke file JavaScript eksternal "script.js" untuk mengatur perilaku interaktif di halaman.

    
**b. HTML Halaman About:**

1. `<!DOCTYPE html>` : Ini adalah deklarasi tipe dokumen HTML yang menandakan bahwa ini adalah halaman HTML.

2. `<html lang="en">` : Ini adalah elemen pembuka untuk dokumen HTML. Atribut lang menandakan bahwa bahasa dokumen adalah Inggris.

3.` <head>` : Bagian kepala dokumen HTML yang berisi berbagai elemen metadata dan referensi ke sumber daya eksternal.

        o	`<meta charset="UTF-8">` 
          Mendefinisikan karakter set dokumen sebagai UTF-8, yang mendukung berbagai karakter Unicode.
        
        o	`<meta name="viewport" content="width=device-width, initial-scale=1.0">` 
          Mengatur tampilan halaman agar responsif pada berbagai perangkat dengan menyesuaikan lebar tampilan dan skala awal.
        
        o	Komentar HTML `(<!-- Google Font -->)` digunakan untuk memberikan komentar dalam kode HTML.
        
        o	`<link rel="preconnect" href="https://fonts.googleapis.com"> dan <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>` 
          Meningkatkan efisiensi pengunduhan font dengan melakukan prekoneksi ke server Google Fonts.
        
        o	`<link href="https://fonts.googleapis.com/css2?..." rel="stylesheet">` 
          Mendefinisikan berbagai font dari Google Fonts yang akan digunakan di halaman web Anda.
        
        o	`<link rel="stylesheet" href="css/style.css">` 
          Menghubungkan halaman dengan berkas CSS eksternal yang disebut "style.css".
        
        o	`<title>Craft Merch Customized - About</title>` 
          Menetapkan judul halaman web yang akan ditampilkan di tab peramban.

4. `<body>` : Ini adalah elemen utama yang berisi konten utama dari halaman web. Semua konten web ditampilkan di dalamnya.

5. `<nav class="navbar" style="margin-bottom: 30px">`: Ini adalah elemen navigasi yang berisi menu dan logo situs, serta menggunakan atribut style untuk mengatur margin bawahnya.

      -	`<img src="image/Icon/logo.png" alt="" width="70">`
          Menampilkan logo situs sebagai gambar dengan lebar 70 piksel.
   
      -	`<div class="container-navbar">`
          Ini adalah elemen div yang berisi daftar menu navigasi.
   
      -	Daftar menu navigasi terdiri dari elemen `<ul>` , `<li>` , dan tautan `<a>`
        termasuk tautan pencarian dengan gambar ikon.
   
      -	Elemen `<div class="d-flex align-i-center">` berisi tautan `"Login"` dan `"Register"` serta gambar-gambar ikon.

7. `<div id="search-box" style="display: none; margin-left: 780px; margin-top: -30px;">` : Ini adalah kotak pencarian yang awalnya disembunyikan dengan atribut style. Kotak ini memiliki elemen input teks untuk melakukan pencarian.

8. `<div class="product-list" style="display: none; margin-top: -30px">` : Ini adalah daftar produk yang awalnya disembunyikan dan akan muncul saat item "Product" dihover. Daftar ini termasuk tautan ke halaman produk berbeda.

9. `<section class="container-about">` : Ini adalah elemen "section" yang digunakan untuk mengelompokkan konten "About" dalam halaman.

   -	`<div class="row">` :
       Elemen ini adalah baris yang mengelompokkan dua kolom dalam tata letak.
   
   -	`<div class="col-6">` :
       Ini adalah kolom pertama yang berisi teks tentang Crafted Merch Customized.
   
   -	`<h1 class="h-text-7">` Crafted Merch Customized</h1>`
       Ini adalah judul teks.
   
   -	Paragraf teks yang menjelaskan produk yang ditawarkan oleh Crafted Merch Customized.
   
   -	`<div class="col-6" style="display: flex; justify-content: center">`
       Ini adalah kolom kedua yang berisi gambar yang ditampilkan di tengah dengan menggunakan CSS untuk mengatur tata letaknya.
   
   -	`<img src="image/about/product.png" alt="" />`
       Ini adalah gambar yang ditampilkan di dalam kolom.

9. `<footer style="background-color: rgba(102, 195, 163, 0.111)">` : Ini adalah elemen penutup halaman yang berisi informasi kontak dan tautan sosial media. Latar belakangnya diberi warna menggunakan CSS.
      -	Informasi kontak dan tautan media sosial.
      -	Tautan ke halaman produk, tautan "Contact Us," dan informasi kontak.
      -	Tautan ke sosial media (Twitter, Facebook, dan Instagram).
      -	Informasi hak cipta halaman.

10. `<script src="js/script.js"></script>` : Ini adalah tag script yang menghubungkan halaman web ke file JavaScript eksternal "script.js" untuk mengatur perilaku interaktif di halaman.


**c. HTML Halaman Contact Us:**


1. `<!DOCTYPE html>` : Ini adalah deklarasi tipe dokumen (Document Type Declaration) yang menyatakan bahwa halaman ini adalah dokumen HTML.

2. `<html lang="en">` : Ini adalah elemen pembuka yang menandai awal dari dokumen HTML. Atribut lang digunakan untuk menentukan bahasa halaman, dalam hal ini bahasa adalah bahasa Inggris.

3.`<head>` : Elemen ini berisi informasi meta tentang halaman web, seperti karakter set dan pengaturan viewport.

      - `<meta charset="UTF-8">` 
        Ini mengatur karakter set halaman ke UTF-8, yang mendukung berbagai karakter internasional.

      -	`<meta name="viewport" content="width=device-width, initial-scale=1.0">` 
        Ini mengatur tampilan responsif dengan lebar sesuai dengan lebar perangkat (width=device-width) dan skala awal (initial-scale=1.0).

      -	`<link>` untuk Google Font 
        Ini adalah beberapa tautan untuk mengimpor font dari Google Fonts. Ini memungkinkan Anda menggunakan berbagai jenis font dalam halaman Anda.

      -	`<link>` untuk CSS
        Ini adalah tautan ke file CSS eksternal `("css/style.css")` yang mengatur tampilan dan gaya halaman.

      -	`<title>` 
        Ini mengatur judul halaman web yang akan ditampilkan pada tab browser.

9. `<body>` : Elemen <body> berisi semua konten yang akan ditampilkan pada halaman web.

10. `<nav class="navbar">` : Ini adalah elemen navigasi yang berisi menu utama dan logo situs.

11. Gambar <img> dalam `<nav>` : Ini adalah gambar yang digunakan untuk menampilkan logo situs dan ikon.

12. Tautan `<a>`dalam `<nav>` : Ini adalah tautan menu ke halaman lain dalam situs.

13. `div class="d-flex align-i-center"` : Ini adalah div yang mengelompokkan tautan "Login" dan "Register" dengan ikon.
      -	`<a href="#" class="link-1">Login</a>` : Ini adalah tautan ke halaman login.

      -	`<a href="#" class="link-2">Register</a>` : Ini adalah tautan ke halaman registrasi.

      - Gambar-gambar yang menampilkan garis vertikal `(Line 1)` dan gambar belanja `(Buy).`

14. `<div id="search-box">` : Ini adalah div yang digunakan untuk menampilkan kotak pencarian yang semula tersembunyi (display: none).

15. `<section class="container-contact">` : Ini adalah elemen `<section>`yang mengelompokkan konten terkait dengan "Contact Us."

        -	`<h1 class="h-text-5">CONTACT US</h1>`
            Ini adalah elemen heading level 1 (judul) dengan kelas "h-text-5" yang menampilkan teks "CONTACT US."

        - `<div class="row">`
           Ini adalah div dengan kelas "row" yang digunakan untuk mengelompokkan elemen dalam satu baris.
    
        -	`<div class="col-6 kolom-input">`
            Ini adalah div dengan kelas "col-6 kolom-input" yang mewakili kolom input dalam bentuk formulir.

 17. `<form action="">` : Ini adalah elemen formulir yang memiliki atribut action kosong, yang berarti formulir ini belum diarahkan ke URL tertentu ketika diajukan.

18. Beberapa elemen `<input>` : Ini adalah elemen input yang memungkinkan pengguna memasukkan informasi. Ada tiga input untuk "Nama," "Email," dan "Phone Number."

19. `<select name="" id="" class="input-contact-select">` : Ini adalah elemen dropdown (pilihan) dengan atribut name dan id kosong. Ini mungkin digunakan untuk memilih bagaimana pengguna menemukan situs web ini. Namun, elemen ini tidak memiliki opsi (options) yang terdefinisi.

20. `<button type="submit">SEND</button>` : Ini adalah tombol "SEND" yang mungkin digunakan untuk mengirimkan formulir. Ini akan memerlukan JavaScript atau layanan server untuk menangani pengiriman formulir. Ada juga sejumlah elemen `<div>` yang mengandung ikon telepon, ikon Instagram, dan alamat email serta kontennya.

21. Bagian yang di-comment `(<!-- ... -->)` : Ini adalah bagian yang di-comment (diarsir) yang tidak akan ditampilkan di halaman web. Ada kode yang di-comment yang mungkin awalnya ditujukan untuk menampilkan elemen tertentu, tetapi saat ini tidak aktif.

22. `<section style="height: 50px"></section>` : Ini adalah elemen <section> yang menambahkan jarak tinggi 50 piksel di antara konten. Ini digunakan untuk memberikan ruang di antara bagian-bagian halaman.

23. `<footer>` : Ini adalah elemen `<footer>` yang berisi informasi dan tautan tambahan yang sering terdapat di bagian bawah halaman web.

24. `<script src="js/script.js"></script>` : Ini adalah tautan ke file JavaScript eksternal `("js/script.js")` yang akan memuat fungsi dan perilaku tambahan ke halaman web.

**d. HTML Halaman Product:**

Terdiri dari beberapa halaman produk yang memiliki tampilan yang sama, Jadi menggunakan source code yang sama di semua halaman produk dengan menggantikan gambar produk sesuai dengan produk yang ditampilkan. 

Berikut penjelasan dari salah satu halaman yaitu halaman T-Shirt : 

1. `<!DOCTYPE html>` : Ini adalah deklarasi tipe dokumen HTML, yang memberi tahu browser bahwa ini adalah dokumen HTML5.

2. `<html lang="en">` : Ini adalah elemen root (paling atas) dari halaman web. Atribut lang digunakan untuk menentukan bahasa dokumen, dalam hal ini, bahasa Inggris.

3. `<head>` : Ini adalah bagian dari dokumen yang berisi informasi tentang dokumen itu sendiri, seperti karakter set, judul halaman, dan tautan ke berkas CSS dan font.

  --> 	`<meta charset="UTF-8" />`  
        Ini adalah meta tag yang menentukan bahwa karakter set yang digunakan dalam halaman adalah UTF-8, yang mendukung sebagian besar karakter dan simbol dunia.

  --> 	`<meta name="viewport" content="width=device-width, initial-scale=1.0" />` 
      Meta tag ini digunakan untuk mengatur tampilan situs web pada perangkat bergerak. Ini menginstruksikan perangkat untuk mengatur lebar halaman sesuai dengan lebar perangkat, dan tingkatkan skala tampilan awal menjadi 1.

  -->	Tautan ke Google Fonts: Ini adalah tautan ke Google Fonts yang memuat jenis huruf yang akan digunakan dalam halaman web.

  -->	`<link rel="stylesheet" href="css/style.css" />` 
      Ini adalah tautan ke berkas CSS eksternal `(style.css)` yang akan mengatur tampilan halaman web.

  --> `<title>Craft Merch Customized - Product</title>` 
      Ini adalah judul halaman yang akan ditampilkan di tab browser.

4. `<body>` : Ini adalah elemen yang berisi semua konten yang akan ditampilkan di halaman web.

   -	`<nav class="navbar" style="padding-bottom: 30px">` : Ini adalah elemen navigasi (navbar) yang berisi logo dan menu navigasi.

    -	`<img src="image/Icon/logo.png" alt="" width="70" />` : Ini adalah gambar logo.

5. `<div class="container-navbar">` : Ini adalah div yang mengelompokkan elemen-elemen menu navigasi.

   -->  Daftar yang berisi tautan menu seperti `"Home," "Product," "About," dan "Contact."`
   --> Beberapa tautan menu memiliki kelas `"prod-navbar."`
   --> Ada juga ikon pencarian yang muncul saat di-klik. Sejumlah tautan login, registrasi, dan gambar lainnya.

7. `<div id="search-box" style="display: none; margin-left: 780px; margin-top: -30px;">` : Ini adalah kotak pencarian yang awalnya tersembunyi (display: none) dan akan muncul saat diaktifkan. Terdapat elemen input yang digunakan untuk memasukkan kata kunci pencarian.

8. `<div class="product-list" style="display: none; margin-top: -30px">` : Ini adalah daftar produk yang awalnya tersembunyi dan akan muncul saat diaktifkan. Ini berisi daftar tautan ke halaman produk seperti "T-Shirt," "Headwear," "Lanyard," dan "Totebag."

9. `<section class="container-product">` : Ini adalah elemen bagian (section) yang mengelompokkan konten produk.

10. `<div class="nav-product">` : Ini adalah div yang berisi breadcrumb (navigasi jalur) yang menunjukkan jalur menu. Misalnya, "Home," "Product," "T-shirt."

11. `<div class="kolom-product">` : Ini adalah div yang berisi produk yang akan ditampilkan dalam kolom.

    -	Dua kolom produk dengan gambar, daftar warna, dan informasi produk seperti nama dan harga.

    -	Setiap produk juga memiliki tautan ke halaman detail produk terkait.

5. `<footer>` : Ini adalah elemen footer yang berisi informasi tambahan dan tautan di bagian bawah halaman web.

6. `<script src="js/script.js"></script>` : Ini adalah elemen script yang menghubungkan file JavaScript eksternal (script.js) yang digunakan untuk menambahkan fungsi interaktif ke halaman web.


**e. CSS**

**1.	Reset Default Margins dan Padding**

    `{
     margin: 0;
     padding: 0;
   }`
   
Potongan kode di atas menghilangkan margin dan padding default dari semua elemen HTML. Ini sering digunakan sebagai langkah awal dalam pengembangan web untuk memastikan tampilan yang konsisten di berbagai browser.

**2.	Mengatur Background, Overflow, Margin, dan Padding pada Body dan HTML**
 
   `body, html {
     background-color: rgba(102, 195, 163, 0.111);
     overflow-x: hidden;
     margin: 0;
     padding: 0;
     min-height: 1000px;
   }`
   
-	`background-color` : Menetapkan warna latar belakang untuk elemen body dan html.
-	`overflow-x: hidden;` : Menghilangkan scrollbar horizontal jika kontennya melebihi lebar layar.
-	`margin: 0; dan padding: 0;` : Mengatur margin dan padding menjadi nol.
-	`min-height: 1000px;` : Menetapkan tinggi minimum sebesar 1000 piksel untuk elemen body dan html.

**3.	Kelas-kelas CSS yang Digunakan**
   Berikut adalah beberapa contoh kelas CSS yang digunakan dalam kode tersebut :

-	`.d-flex` : Mengatur elemen agar menggunakan `display: flex;.`
-	`.flex-wrap` : Mengatur elemen dengan `flex-wrap: wrap;.`
-	`.align-i-center`: Mengatur elemen dengan `align-items: center;.`
-	`.justify-c-center` : Mengatur elemen dengan `justify-content: center;.`
-	`.justify-c-between` : Mengatur elemen dengan `justify-content: space-between;.`
-	`.justify-c-around` : Mengatur elemen dengan `justify-content: space-around;.`
-	`.justify-c-evenly` : Mengatur elemen dengan `justify-content: space-evenly;.`
-	`.link-1, .link-2, .link-3, dst.` : Mengatur berbagai gaya tautan (link).
-	`.button-1, .button-2, .button-3, dst.` : Mengatur berbagai gaya tombol.
-	`.container-icon-link, .icon-link` : Mengatur ikon-ikon tautan sosial media.
-	`.container-fluid, .row, .col-8, dst.`: Mengatur tata letak (layout) dan grid.

**4. Font dan Teks**

   Ada banyak deklarasi gaya teks dalam kode, seperti `font-family`, `font-size`, dan `font-weight` , yang digunakan untuk mengubah font dan ukuran teks berbagai elemen.

**5. Navigasi**

   Ada kode yang berkaitan dengan gaya elemen navigasi (navbar) dan penggunaan sebelum dan sesudah saat mengarahkan kursor ke tautan.

**6. Gambar**

   Terdapat beberapa pengaturan untuk gambar, termasuk transformasi gambar, efek hover, dan pemrosesan gambar untuk ikon sosial media.

**7. Footer**

   Ada kode yang berhubungan dengan footer, termasuk pengaturan tampilan daftar produk yang muncul saat hover.

**8. Breakpoints**

   Kode tersebut juga mencakup beberapa aturan untuk mengatur tampilan responsif dengan menentukan lebar kolom seperti `.col-8, .col-6,` dll.

**f. Javascript**

**1.	Bagian 1 : Menampilkan / Menyembunyikan Daftar Produk**

const product = document.querySelector(".prod-navbar");

const productList = document.querySelector(".product-list");

let timeoutId;

product.addEventListener("mouseenter", () => {

    clearTimeout(timeoutId);
    
    productList.style.display = "block";
    
});

product.addEventListener("mouseleave", () => {

    timeoutId = setTimeout(() => {
    
        if (!productList.matches(":hover")) {
        
            productList.style.display = "none";
        }
    }, 300);
});

productList.addEventListener("mouseenter", () => {

    productList.style.display = "block";
});

productList.addEventListener("mouseleave", () => {

    productList.style.display = "none";
});

--> Dalam bagian ini, Anda mendefinisikan interaksi untuk menampilkan daftar produk ketika pengguna mengarahkan kursor ke elemen dengan kelas `.prod-navbar` (mungkin elemen yang menggambarkan daftar produk).
        
  --> Saat kursor masuk (event mouseenter) ke elemen `.prod-navbar` , kode ini menghentikan timer timeoutId (jika ada) dan menampilkan elemen dengan kelas `.product-list.`
        
--> Saat kursor meninggalkan elemen `.prod-navbar` , kode mengatur timer yang akan menyembunyikan daftar produk setelah 300 milidetik jika kursor tidak mengarah ke daftar produk. Ini memberikan efek penundaan sebelum menyembunyikan daftar produk.

--> Ketika pengguna mengarahkan kursor ke elemen `.product-list` , daftar produk akan ditampilkan (tanpa penundaan).
        
--> Saat kursor meninggalkan elemen `.product-list` , daftar produk akan disembunyikan.
    
**2.	Bagian 2 : Pengaturan Kotak Pencarian**

const searchIcon = document.getElementById("search-icon");

const searchBox = document.getElementById("search-box");

searchIcon.addEventListener("click", () => {
    if (searchBox.style.display === "block") {
    
        searchBox.style.display = "none"; // Tutup kotak pencarian jika sudah terbuka
    } else {
    
        searchBox.style.display = "block"; // Tampilkan kotak pencarian jika belum terbuka
    }
    
});

--> Dalam bagian ini, kode ini menangani klik pada ikon pencarian.
                
  --> Saat ikon pencarian diklik, kode ini memeriksa apakah kotak pencarian `(searchBox)` sedang terbuka atau tidak berdasarkan properti `style.display.`
                
-->Jika kotak pencarian terbuka, kode akan menyembunyikannya dengan mengatur display menjadi `"none"` . Jika belum terbuka, kode akan menampilkannya dengan mengatur display menjadi `"block"` .

**3.	Bagian 3 : Fungsi productScroll**

"use strict";

productScroll();

function productScroll() {
    // ...
    
}

--> Ini adalah definisi dari fungsi  `productScroll.`

  -->	Baris `"use strict"` adalah directive JavaScript yang mengaktifkan mode ketat, yang memungkinkan penanganan kesalahan yang lebih ketat dalam kode.    
  
--> Fungsi productScroll dipanggil dengan `productScroll();.`

**4.	Bagian 4 : Logika Scroll Produk**

function productScroll() {

    let slider = document.getElementById("slider");
    
    let slide = document.getElementById("slide");
    
    let item = document.getElementById("slide");

    for (let i = 0; i < next.length; i++) {
    
        //refer elements by class name

        let position = 0; //slider postion

        prev[i].addEventListener("click", function () {
            //click previos button
            
            if (position > 0) {
            
                //avoid slide left beyond the first item
                
                position -= 1;
                
                translateX(position); //translate items
                
            }
        });

        next[i].addEventListener("click", function () {
        
            if (position >= 0 && position < hiddenItems()) {
            
                //avoid slide right beyond the last item
                position += 1;
                
                translateX(position); //translate items
            }
            
        });
        
    }
    
}

--> Fungsi `productScroll` menginisialisasi slider produk dan menangani logika geser produk.
        
 -->	Ini mengatur variabel `slider`, `slide`, dan `item` untuk merujuk ke elemen-elemen dengan ID yang sesuai.
        
  -->	Loop for digunakan untuk mengatur event listener untuk tombol `"prev"` dan `"next"` yang mungkin ada.
        
--> Saat tombol `"prev"` diklik, kode memeriksa apakah slider masih dapat digeser ke kiri (ke produk sebelumnya) dan jika memungkinkan, kode akan menggeser slider dengan mengubah posisinya dengan memanggil `translateX.`
        
--> Saat tombol `"next"` diklik, kode memeriksa apakah slider masih dapat digeser ke kanan (ke produk selanjutnya) dan jika memungkinkan, kode akan menggeser slider dengan mengubah posisinya dengan memanggil `translateX.`

**5.	Bagian 5 : Fungsi translateX**

function translateX(position) {

    //translate items
    
    slide.style.left = position * -210 + "px";
    
}

--> Fungsi `translateX` digunakan untuk menggeser elemen produk dengan mengubah nilai properti left dari elemen slide.
      
--> Ini digunakan dalam bagian sebelumnya saat tombol `"prev"` atau `"next"` diklik untuk menggeser produk.

**6.	Bagian 6 : Fungsi getCount**

function getCount(parent, getChildrensChildren) {

    //count no of items
    
    let relevantChildren = 0;
    
    let children = parent.childNodes.length;
    
    for (let i = 0; i < children; i++) {
    
        if (parent.childNodes[i].nodeType != 3) {
        
            if (getChildrensChildren)
            
                relevantChildren += getCount(parent.childNodes[i], true);
                
            relevantChildren++;
            
        }
        
    }
    
    return relevantChildren;
    
}

--> 	Ini adalah fungsi bantu yang menghitung jumlah elemen (item) yang relevan dalam elemen yang diberikan.
        
     
-->	Fungsi ini menerima dua argumen: parent adalah elemen yang akan dihitung, dan `getChildrensChildren` adalah boolean yang menentukan apakah harus menghitung juga elemen-elemen anak dari anak-anak elemen ini.
        
        
-->    Fungsi ini mengembalikan jumlah elemen yang relevan dalam elemen parent. Itu digunakan untuk menghitung jumlah elemen dalam slider produk sehingga dapat menentukan berapa kali slider harus digeser.


