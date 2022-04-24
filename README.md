# GDLWEBCAMP

GDLWEBCAMP es mi primer gran proyecto de desarrollo web. Se trata del proyecto final del curso: __Desarrollo Web Completo con HTML5, CSS3, JS AJAX PHP y MySQL__ realizado através de la plataforma __Udemy__.

Este proyecto se trata de una página web sobre una conferencia web llamada de igual forma que el proyecto: GDLWEBCAMP. Consta tanto de un frontend como de un backend para que la página sea 100% dinámica. La características de la página web y su respectiva área de control son:

## Frontend
El frontend se encuentra desplegado en Heroku [en este enlace](http://gdlwebcampdb.herokuapp.com/index.php). Allí se abrirá primeramente el index.php.

La página se compone de 5 secciones totalmente dinámicas:
* [Home](http://gdlwebcampdb.herokuapp.com/index.php)
* [Galería](https://gdlwebcampdb.herokuapp.com/galeria.php)
* [Calendario](https://gdlwebcampdb.herokuapp.com/calendario.php)
* [Invitados](https://gdlwebcampdb.herokuapp.com/invitados.php)
* [Reservaciones](https://gdlwebcampdb.herokuapp.com/registro.php)

El frontend se encuentra maquetado en HTML5 con CSS3 sin ningún tipo de frameworks con el objetivo de aprender todo lo referente a CSS3 puro. Se hace uso de lógica mediante JavaScript con jQuery y PHP. Toda la información que se muestra en pantalla se imprime directamente desde una base de datos SQL desplegada también en Heroku con el objetivo de que la información agregada a la base de datos, desde el módulo de administración, se muestre en el frontend; es por esta razón que se usan técnicas de caché en PHP para evitar la sobreconsulta en la base de datos y almacenar una versión reciente en HTML que se mostrará al cliente para una carga más rápida de la página. Las fotos en __Galería__, los eventos en __Calendario__, la información y foto de los expositores en __Invitados__ cumplen con está descripción previa.

La parte de __Reservaciones__ contiene el formulario de registro a la conferencia incluyendo datos personales, tipo de boleto y conferencias a añadir.

## Backend
En la sección [Admin](http://gdlwebcampdb.herokuapp.com/admin/login.php) se encuentra el panel para la administración de la información de la página web. Se encuentra maquetado con el template de Bootstrap AdminLTE. Para la parte lógica se usó JavaScript, AJAX y PHP para los modelos de CRUD a la base de datos. Se implementa el uso de sesiones en PHP para evitar la consulta y modificación de información a usuarios no loggeados. Así mismo, se implementa un superusuario capaz de crear a otros superusuarios y usuarios normales pero no en viceversa. 

Para loggearse al módulo de administración se puede usar las credenciales:
* __Usuario:__ admin
* __Contraseña__: admin

Sin embargo, en el deploy mediante Heroku no se podrán modificar los datos dado que en los correspondientes modelos en PHP se termina forzosamente la ejecución de la inserción a la base de datos con el objetivo de proteger los datos. Sin embargo, para efectos prácticos, quien desee clonar el repositorio y ensayar con los datos recomiendo:

1. Desplegar una base de datos e importar el archivo sql contenido en la carpeta [SQL](https://github.com/JoseArroyave/GDLWEBCAMP/tree/main/sql) para tener los datos de prueba.
2. En el archivo [bd_conexion.php](https://github.com/JoseArroyave/GDLWEBCAMP/blob/main/includes/functions/bd_conexion.php) modificar los datos de la conexión.
3. En cada uno de los [Modelos](https://github.com/JoseArroyave/GDLWEBCAMP/tree/main/admin) eliminar la línea ``die(json_encode($_POST));`` en cada una de la funciones del CRUD para evitar la aparición de un SweetAlert indicando error al momento de editar, eliminar o añadir datos en cualquiera de las secciones.

Para versiones futuras se plantea la adición de una pasarela de pagos de prueba con Paypal. Por el momento, todos los nuevos registros aparecerán como __Pagado__ de forma predeterminada.
