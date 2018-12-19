# Cerulean
Cerulean is a web-based ERP package, made with Laravel and VueJs.  
The aim is to be simple and easy to use, without having too many 
very specific modules - keep it a bit barebones.

The name 'Cerulean' is not set in stone, I am bad at thinking up names
and consider this the WIP name.

## Project goals
* I'm primarily doing this to get better at Laravel/VueJS and coding in general
* Provide a lightweight and pretty barebones ERP that can be used by small businesses

## Getting started

### Prerequisites
You should have following stuff on your battle station:
```
php 7.2
node 10.9.0
```

### Installing

Clone the repository, and setup your environment variables (primarily just database stuff).   
Create your database as defined in your `.env` file.

Go the the command line and run:  
- `composer install`
- `yarn` or `npm install`
- `php artisan migrate`
- `php artisan db:seed`

### Deployment

The website runs on 3 domains:
* `cerulean.test` for the front-facing website
* `app.cerulean.test` for the dashboard
* `api.cerulean.test` for the API

To run your copy of the website:

`yarn dev` / `npm run dev` to build the vue.js website once.  
`yarn watch` / `npm run watch` to build the vue.js website and watch for any changes to then rebuild.

## Contributing
Contributions are **welcome**, send in a Pull Request.

## Authors
* **Jonas Pardon** - jonas@digicreate.be

## License
GNU General Public License v3.0 (GNU GPLv3)