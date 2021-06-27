# Laravel Duitku Demo

Laravel duitku package: https://github.com/royryando/laravel-duitku

## How to tun
- > `git clone https://github.com/royryando/laravel-duitku-demo.git`
- > `cd laravel-duitku-demo`
- > `cp .env.example .env`
- > `composer install`
- > `php artisan key:generate`
- Edit `.env` and set your Duitku code, key and the callback (http://yourwebsite/callback/payment)
- > `php artisan migrate`
- > `php artisan serve`
- open in browser http://localhost:8000/


Note: If you run on a local machine you need a tunneling tools like [Ngrok](https://ngrok.com/) (and set the callback url in `.env` using the public url from Ngrok) to receive callback from Duitku
