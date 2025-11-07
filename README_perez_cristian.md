# Práctica Videoclub
___

## resumen general
___
La práctica consiste en desarrollar una aplicación básica para un videoclub, siguiendo una estructura
de clases, atributos y métodos predefinidas por los ejercicios. La forma de comprobar que todo funciona
correctamente en esta actividad es a través del uso de **echo**.


## Definición de las clases
___
### Soport.php
Esta clase representa los productos del videoclub, es la clase padre la cual tendrá clases hijas más 
específicas de cada producto. Esta clase, al ser una clase padre, marca únicamente los elementos que
tiene en común las demás clases hijas.

### CintaVideo.php / Dvd.php / joc.php
Todas ellas són clases hijas de **Soport.php**, estas clases añaden los elementos específicos de los
productos.

### Cliente.php
Esta clase es la encargada de gestionar los clientes del videoclub. Se enfoca en las funciones de
alquiler y devolver productos entre otras.

### Videoclub.php
Es la clase "principal" la cual centraliza todas las funciones y es la única a la que hay que
llamar para hacer uso de todo. Esta clase solo interactúa directamente con **Client.php** y
**Soport.php**. Las funciones principales de esta clase son incluir cliente y/o productos y 
alquilar.


## Aclaraciones
___
### Repositorios
Este proyecto se ha llevado a cabo en su mayoría en otro repositorio compartido entre mi compañero
y yo. El enlace del repositorio es: https://github.com/cperezjuarez/Videoclub

### Ejecución de los tests
Este proyecto se ha pensado para ejecutar los "inici*.php" en un servidor **Apache**, ya que las
separaciones se han hecho mediante etiquetas html **<br>** y en consola no se aprecia de la misma
manera. Por tanto, recomendamos probar los inici*.php en un servidor Apache.