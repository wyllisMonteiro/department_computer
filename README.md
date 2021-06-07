# Department/computer case study

## Start project

### Install dependencies

```sh
$ composer install
```

### Update `.env` to set up `DATABASE_URL`

### Create your database

```sh
$ php bin/console doctrine:database:create
```

### Update database schema

```sh
$ php bin/console doctrine:schema:update --force
```

### Start server

```sh
$ symfony server:start
```

## License

[MIT](https://github.com/wyllisMonteiro/department_computer/edit/main/LICENSE)
