# php - Orientação a Objetos

###### Códigos sobre a linguagem PHP orientado a objetos

### Criando o Ambiente com Docker:

- Docker (https://docs.docker.com/get-docker/)

- Baixar imagem do php 8.1 + apache:
```bash
docker pull php:8.1-apache
```

- Executar o container em modo foreground
```bash
docker container run -d -p 80:80 --name phpoo -v $(pwd):/var/www/html php:8.1-apache
```

- Instalar o Xdebug
```bash
pecl install xdebug
```
```bash
echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20210902/xdebug.so" >> /usr/local/etc/php/php.ini-development
```

```bash
mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini
```

- Instalar o Composer

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php composer-setup.php && rm composer-setup.php && mv composer.phar /usr/local/bin/composer && chmod a+x /usr/local/bin/composer
```

- Atualizar Composer

```bash
composer update
```


### Glossário:

- 001 - Classes, Propriedades e Objetos

### Exemplos:

- 

### Credits

- [Leandro Silveira](https://github.com/silveirajedi) (Developer)

### License

The MIT License (MIT).
