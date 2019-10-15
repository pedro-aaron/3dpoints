# 3dpoints
Visualización de puntos 3D

Modificar base_url en  application/config/config.php:

$config['base_url'] = '';

con el valor del url en dónde estará hospedado ek código fuente:

Ej:

$config['base_url'] = 'https://3d.watermarkero.com/';


De esta manera se puede acceder a las siguientes funciones vía URL:

1. Mostrar:
https://3d.watermarkero.com/puntos/show  
 
2. Añadir punto con Label (el label no se muestra por el momento)

https://3d.watermarkero.com/puntos/add/p1/1/1/2

3. Eliminar todos los puntos

https://3d.watermarkero.com/puntos/clear

4. mostrar numero de puntos

https://3d.watermarkero.com/puntos/count

5. mostrar puntos en texto

https://3d.watermarkero.com/puntos/sesion

