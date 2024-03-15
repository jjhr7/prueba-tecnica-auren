# Prueba Técnica Auren

Esta es la prueba técnica para Auren, la cual consiste en montar una sencilla aplicación que permite almacenar y actualizar información relativa a países descargados de una API remota [https://restcountries.com/](https://restcountries.com/).

## Tecnologías Utilizadas

- PHP 8.1.0
- Symfony 6.4
- Base de datos MySQL
- EasyAdmin 4
- HTML, JavaScript, CSS
- jQuery
- Bootstrap
- Datatables

## Instalación

Una vez descargado el zip del proyecto y colocado en el directorio correspondiente (en caso de estar utilizando WAMP en Windows, el directorio probablemente sea `C:\wamp64\www\`):

1. Configurar el archivo `.env` con sus respectivos credenciales y datos de acceso.
2. Abrir una terminal, ya sea con las teclas `Windows + R` e introduciendo `cmd` o desde el buscador de aplicaciones buscando la palabra `cmd`.
3. Posicionarse en el directorio raíz de la aplicación desde la terminal y ejecutar los siguientes comandos:
    - `composer install`
    - `php bin/console doctrine:database:create`
    - `php bin/console doctrine:migrations:migrate`
    - `npm install`
    - `yarn install --force`
    - `symfony server:start`

## Uso

Una vez el proyecto esté instalado y funcionando, para poder cargar los datos desde la API Rest mencionada en el enunciado de la prueba técnica y ver sus datos, es necesario registrarse en la aplicación. Desde el panel de administración se puede insertar los países manualmente o hacer click en el enlace "Importar países".

Para ver la información de los países se puede ver desde la raiz una vez se hayan creado o importado los paises, o desde el mismo panel admin.

Cualquier error o duda por favor ponerse en contacto con el autor a través del email: johnhr710@gmail.com

