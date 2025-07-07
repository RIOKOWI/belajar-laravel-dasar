<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## php artisan
melihat semua fitur artisan

## git ignore/.gitignore
memberi tahu bagaimana yg tidak perlu di commit ke dalama Git Repository

## php artisan perintah--help
melihat detail informasi perintah

## php artisan serve --port=9090
ganti port default 8000 menjadi 9090

## php artisan make:test ContohTest
perintah membuat unit test

## php artisan make:test ContohTest --unit
perintah membuat unit test dan memberi tahu kalau itu unit test bukan integration/feature test
masuk ke folder test/Unit

## php artisan test --filter=NamaTest
running unit test yang di pilih

## php artisan test
running semua unit test

## Configuration Cache
proses lebih cepat karena tidak perlu load semua konfigurasi

## php artisan config:cache
perintah membuat konfigurasi cache
NOTE : ketika ada penambahan di file konfigurasinya perubahan nya tidak akan terlihat, harus buat ulang cache nya

## php artisan config:clear
perintah menghapus cache konfigurasi

## Dependency Injection
Contoh nya ada di file App\Data
                       Foo.php
                       Bar.php

DependencyInjectionTest.php

## SERVICE CONTAINER
Contoh di file ServiceContainerTest.php dan Person.php

## =================================================================== ##

## SERVICE PROVIDER
contoh liat di file :
FooBarProvider.php
FooBarServiceProviderTest.php

## php artisan make:provider NamaServiceProvider
perintah membuat service provider

## php artisan cache:clear
perintah untuk menghapus cache, contoh nya memnidahkan service eager ke deferred
contoh liat di file :
cache\services.php

## FACADES
class yang menyediakan static akses ke fitur di service container atau application
(digunakan jika butuh saja)
contoh di file :
FacadeTest.php

## ROUTING
contoh liat file:
web.php
RoutingTest.php

## php artisan route:list
perintah untuk melihat semua route

## VIEW
contoh liat di file :
web.php
hello.blade.php
ViewTest.php

## php artisan view:cache
menyimpan semua hasil compile view di storage/framework/views

## php artisan view:clear
menghapus semua hasil compile view di storage/framework/views

## STATIC FILE
contoh di file :
index.js
index.css
app.js
app.css

 ## npm run prod
 fungsinya untuk minify file css dan js khusus node js yang nantinya di taruh di folder public

## ROUTE PARAMETER 
contoh di file :
web.php
RoutingTest.php

## NAMED ROUTR
contoh di file :
web.php
RoutingTest.php

## php artisan make:controller NamaController
perintah untuk membuat controller

## CONTROLLER
liat di file :
HelloController.php
ControllerTest.php
web.php
HelloService.php
HelloServiceIndonesia.php

## REQUEST
liat di file :
HelloController.php
ControllerTest.php
web.php

## INPUT REQUEST
liat di file :
InputControllerTest.php
InputController.php
web.php

## INPUTT TYPE
liat di file :
web.php
InputTypeControllerTest.php
InputTypeController.php

## FILTER REQUEST INPUT
InputController.php
web.php
FilterRequestInputControllerTest.php

## FILE STORAGE
https://github.com/thephpleague/flysystem


