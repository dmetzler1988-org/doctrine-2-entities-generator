# Doctrine 2 Entities Generator v0.1

## Requirements

Install dependencies via 

```shell
composer install
```

## Usage

At first, copy environment file and replace placeholders in it with your requirements

````shell
cp .env.dist .env
````

Now execute command

```shell
sh doctrine-generator.sh
```

**HINT**

You can also trigger the autoloader for composer/php manually via

```shell
composer dump-autoload -o
```
