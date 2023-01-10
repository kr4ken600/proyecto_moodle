# Instrucciones de instalacion.
Bro te dejo estas instruccines por si algo se te olvida o para algo con el codigo xd

***
## Programas que necesitas
- Git: **[Descarga](https://git-scm.com/downloads)** 
- VSCode: **[Descarga](https://code.visualstudio.com/download)**
- Largon: **[Descarga](https://laragon.org/download/index.html)** ```(Descarga el que se llama full)```

***
## Pasos para tener y correr el servicio
Primero que nada ya deberas tener instalado todos los programas antes mencionados 👽
1. Ejecuta **Laragon**, inicias los sercicios y abres la **terminal** que viene integrada.

![Captura 1](/img/sc1.png)
2. En la terminal escibiras el siguiente comando
```
git clone git https://github.com/kr4ken600/proyecto_moodle.git cursos
```
3. Cuando haya terminado la clonacion, entras a la carpeta e inicias vsc
```
cd cursos && code .
```
4. Procedes a instalar las dependencias
```
composer install
npm install
```
5. De nuevo en la terminal, creamos la base de datos de la siguiente forma:
```
php artisan migrate --seed
yes
```
> En caso de que quieras deshacer cambios que hayas hecho en la DB
```
php artisan migrate:refresh --seed
```
6. Por ultimo en el navegador de tu confianza escribes **cursos.test**

>Nota: Ya hay usuarios por defecto

|Tipo Usuario|correo|contraseña|
|------------|------|----------|
|Docente|josue@gmail.com|password|
|Alumno|yon@gmail.com|password|

***
## Para tener el VSC como el mio 🤙 (opcional)
Busca e instala las siguientes extenciones:
* dzhavat.bracket-pair-toggler
* onecentlin.laravel-blade
* amiralizadeh9480.laravel-extra-intellisense
* codingyu.laravel-goto-view
* onecentlin.laravel5-snippets
* vscode-icons-team.vscode-icons

![Captura 2](/img/sc2.png)