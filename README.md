# php - Orientação a Objetos

###### Códigos sobre a linguagem PHP orientado a objetos

### Criando o Ambiente com Docker:

- Docker (https://docs.docker.com/get-docker/)

- Baixar imagem do php 7.4 + apache:
```bash
docker pull php:7.4-apache
```

- Executar o container em modo foreground
```bash
docker container run -d -p 80:80 --name phpoo -v $(pwd):/var/www/html php:7.4-apache
```

- Instalar o Xdebug
```bash
pecl install xdebug
```
```bash
echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20190902/xdebug.so" >> /usr/local/etc/php/php.ini-development
```

```bash
mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini
```
### Glossário:

- 001 - Classes, Propriedades e Objetos

### Exemplos:

- 

### Credits

- [Leandro Silveira](https://github.com/silveirajedi) (Developer)

### License

The MIT License (MIT).
