# JOB MATCH

**JOB MATCH** Platform inovatif untuk membantu perusahaan menemukan kandidat yang tepat dengan efisien. kami mengurangi biaya rekrutmen perusahaan dengan memastikan setiap perekrutan merupakan investasi yang bernilai. Hemat waktu, hemat biaya, hasil optimal!.

## Prasyarat

Pastikan telah menginstal:

-   [Git](https://git-scm.com/)
-   [Composer](https://getcomposer.org/)
-   [Node.js](https://nodejs.org/)
-   [PHP](https://www.php.net/)
-   [MySQL](https://www.mysql.com/)

## Memulai

Ikuti langkah-langkah ini untuk menyiapkan dan menjalankan proyek secara lokal:

1. Klon repositori:

    ```bash
    git clone https://github.com/aslamthrq/Job-Match.git
    ```

2. Pindah ke direktori proyek:

    ```bash
    cd Job-Match
    ```

3. Salin file `.env.example` untuk membuat file `.env` baru:

    ```bash
    cp .env.example .env
    ```

4. Instal dependensi PHP menggunakan Composer:

    ```bash
    composer install
    ```

5. Instal dependensi JavaScript menggunakan npm:

    ```bash
    npm install
    ```

6. Generasi kunci aplikasi:

    ```bash
    php artisan key:generate
    ```

7. Jika Anda ingin menyiapkan basis data, jalankan perintah berikut:

    ```bash
    php artisan migrate
    ```

    Jawab 'yes' ketika diminta.

    ```bash
    php artisan db:seed --class=initialSeeder
    ```

8. Kompilasi aset frontend:

    ```bash
    npm run dev
    ```

9. Mulai server pengembangan lokal:

    ```bash
    php artisan serve
    ```

Aplikasi seharusnya sekarang dapat diakses di [http://localhost:8000](http://localhost:8000).

## Menjalankan Aplikasi

Untuk menjalankan aplikasi, jalankan perintah berikut:

1. Kompilasi aset frontend:

    ```bash
    npm run dev
    ```

2. Mulai server pengembangan lokal:

    ```bash
    php artisan serve
    ```

Kunjungi [http://localhost:8000](http://localhost:8000) di browser untuk mengakses aplikasi.
