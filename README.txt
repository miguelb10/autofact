Para la web:
1. Ingresar al proyecto web-app
2. Ejecutar comando: npm install
3. Crear la base de datos autofact en mysql
4. Ejecutar el comando: php artisan migrate

Para el api:

1. Abrir el proyecto autofact en un IDE como Eclipt o STS
2. Ejecutar como proyecto Spring Boot
3. Las tablas se generan de manera automatica:

En la BD:

1. Ejecutar el siguiente Script:

use autofact;
INSERT INTO users(id, name, email, password, rol, created_at, updated_at) values(1,'Miguel', 'miguel.blas_03@hotmail.com','$2y$10$d8QLZ2ipfZ6xUEveuyQ1CexdiK/C409veqdClAvy.la8JHPjb38/.','admin','2021-03-13 03:18:44','2021-03-13 03:18:44');
INSERT INTO users(id, name, email, password, rol, created_at, updated_at) values(2,'Juan', 'juan@hotmail.com','$2y$10$d8QLZ2ipfZ6xUEveuyQ1CexdiK/C409veqdClAvy.la8JHPjb38/.','user','2021-03-13 03:18:44','2021-03-13 03:18:44');




En que se puede mejorar:
- Utilizar un login en un api de autenticación y no dentro de la web
- Agregaria seguridad de cors para que solo se pueda conectar la web o aplicativos permitidos
- Mejorar el orden del codigo
- Agregar Clases para los objetos en el proyecto web
- Agregar mas lugares en donde se pueda controlar los logs
- Agregar un mensaje de respuesta proveniendo de la respuesta del api

Para mejorar el performance:
- Dependiendo de las vistas que se puedan agregar, se puede segmentar las funcionalidades en distintas apis.
- Realizar un update a Java 11 para mejorar el codigo.

Para la escalabilidad:
- Se pueden desplegar mas instancias de las apis con mayor cantidad de consultas (depende de las funcionalidades que se puede agregar a la web)
- Agregar un api gateway para mejorar el manejo de consultar y centralizarlas para que se pueda manejar la carga entre las apis.

Para la seguridad:
- Agregar una autenticanción Oauth2 para trabajar con tokens de 1 sola vida.
- Agregar el mapeo de roles en el backend para mostrar solo ciertas consultas por cada tipo de usuario