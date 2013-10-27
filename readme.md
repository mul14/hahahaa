# Hills Project

# Read me please T_T


## Gimana cara setup project ini? :/

1. Download/install composer dari [http://getcomposer.org](http://getcomposer.org)

2. Jalankan `composer update`

3. Konfigurasi database di `app/config/database.php`, atau lihat cerita mengenai Environment di bawah.

4. Jalankan `php artisan setup`. Ini akan otomatis membuat table dan men-generate dummy data.
Bila ingin setup ulang jalankan `php artisan setup:refresh`.

5. Jalankan `php artisan serve` untuk mengaktifkan web server (khusus yang menggunakan PHP 5.4+).

6. Buka browser ke [localhost:8000](http://localhost:8000)


## Environment

By default Laravel akan jalan pada production environment. Agar bisa jalan pada development atau local environment,
edit file `bootstrap/start.php`

Di dalamnya ada

```
$env = $app->detectEnvironment(array(

    'local' => array('localhost', '127.0.0.1'),

));
```

Artinya bila URL pada browser adalah `localhost` atau `127.0.0.1`, maka environment otomatis akan menjadi `local`.
Jika ada folder `app/config/local`, maka konfigurasi akan di-load dari folder tsb.
Caranya cuma copy file yang ada`app/config` ke `app/config/local`.
Misalnya copy `app/config/database.php` ke `app/config/local/database.php`.

Bila diganti dengan `'development' => array('localhost', '127.0.0.1')`,
maka nama environment berubah menjadi `development`. File konfigurasi letakkan di `app/config/development`.


## Observer

File observer terletak pada `app/observers.php`.

File ini berisi observer/listener atau pemantau suatu hook.

Misalnya pada saat suatu task dibuat, harus ada log. Pada method/action didalam controller,
bisa dipanggil dengan `Event::fire('nama.hook', [optional_parameter])`.

Contoh lain, misalnya ada user yang mendaftar mau dikirimi email selamat datang.
Maka bisa dipanggil dengan cara yang sama `Event::fire('user.create', $user)`.

Contoh daftar hook yang ada ada di dalam folder `app/Hills/Mailers/UserMailer` yang berisi

```
public function subscribe($events)
{
    // $event->listen(name_of_events, 'class@method')
    $events->listen('users.create', 'Hills\Mailers\UserMailer@create');
    $events->listen('users.update', 'Hills\Mailers\UserMailer@update');
    $events->listen('users.delete', 'Hills\Mailers\UserMailer@delete');
}
```

Contoh di atas `$events` melakukan listen pada `users.create`.
Pada saat di-trigger dengan `Event::fire('users.create')`,
maka otomatis akan menjalankan create method/action.

Pada `app/observers.php`, `Event::subscribe('Hills\Mailers\UserMailer');`
by default dimatikan karena akan mengirim email dan tidak ada mail server di local environment.


## BaseModel

File `app/models/BaseModel.php` adalah abstract class yang di dalamnya sudah ada hal basic seperti *doing validation*.
Setiap kali suatu model melalukan save, maka akan otomatis melakukan validation.
Semua fields/attribute pada model akan dibandingkan dengan variable $rules yang ada pada tiap model.
Sehingga tidak perlu melakukan validasi manual.


## PHPUnit

Ada beberapa cara untuk setup PHPUnit:

1. Download file `phpunit.phar` dari [http://phpunit.de](http://phpunit.de).
Letakkan pada root project. Lalu jalankan dengan `php phpunit.phar`

2. Masih sama dengan cara #1, tapi rename `phpunit.phar` menjadi `phpunit`.
Buat jadi executable dengan `chmod +x phpunit`.
Letakkan di lokasi yang dikenali oleh system. Misalnya /usr/bin/phpunit.
Jalankan langsung dengan `phpunit`.

3. Install lewat PEAR

4. Install lewat composer.
Tambahkan `"phpunit/phpunit": "3.7.*"` dibawah `"require-dev"` pada file `composer.json`. Jalakan `composer update`
Untuk menjalankan `./vendor/bin/phpunit`. Atau bikin aja symlink atau alias di .bashrc, .zshrc, etc supaya gampang.

## Behat / Codeception ? :/

*// Empty*
