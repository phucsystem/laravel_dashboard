## How it works

Our own [Freek Van der Herten](https://twitter.com/freekmurze) gave a talk on the dashboard at Laracon EU where he explained how the dashboard works behind the screens. The talk was recorded and published [on Youtube](https://www.youtube.com/watch?v=jtB_rTh61Zo).

## Installation

Install this package by running cloning this repository and install like you normally install Laravel.

- Run `composer install` and `npm install yarn`
- Run `yarn` and `yarn run dev` to generate assets
- Copy `.env.example` to `.env` and fill your values (`php artisan key:generate`, database, pusher values etc)
- Run `php artisan migrate --seed`, this will seed a user based on your `BASIC_AUTH` `.env` values
- Start your queue listener and setup the Laravel scheduler.
- Open the dashboard in your browser, login and wait for the update events to fill the dashboard.
- Restart cron service
- Add new cron: /usr/local/bin/php /var/www/artisan schedule:run > /tmp/test.txt

## Setup Gmails
- Get author.json from Gmail https://developers.google.com/gmail/api/quickstart/php
- Run command on terminal.
- Input verification code