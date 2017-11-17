Test MetricaAndina
==================

Autor: Pedro Pairazamán Silva

Descripción
-----------
Este repositorio contiene las respuestas a todas las preguntas del test proporcionado por la empresa Metrica Andina para el puesto de PHP Developer.

El framework usado es Zend Framework 2.4. Desarrollado en PHP 7 

Instalación
-----------
Una vez clonado el repositorio, ejecutar `composer install` para descargar todas las dependencias:

Configuración de servidor web
-----------------------------
### Host

La dirección con la que se realizan las pruebas es `http://metrica.local`. Tener en cuenta para las pruebas a ejecutar.

### Configuración Apache

Implementar un virtual host de la siguiente manera:

    <VirtualHost *:80>
         ServerName metrica.local
         DocumentRoot /var/www/html/metrica/public
         SetEnv APPLICATION_ENV "development"
         <Directory /var/www/html/metrica/public>
             DirectoryIndex index.php
             AllowOverride All
             Order allow,deny
             Allow from all
         </Directory>
     </VirtualHost>

Contenido
---------
La parte 01 se encuentra en la carpeta "excersises" dentro de la raíz. Y puede ejecutarse independientemente del framework.

La parte 02 se ejecuta de la siguiente manera:

* Listado de empleados : http://metrica.local/developers
* Empleado en particular : http://metrica.local/developers/detail/{{ developer_id }}
* SOAP Web service (servidor) :  http://metrica.local/soap?wdsl
* SOAP Web service (cliente) :  http://metrica.local/client