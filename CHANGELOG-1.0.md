# CHANGELOG 1.0.x

* 1.0.3
    * Realizamos un cambio en el valor de **downloads**, ahora es un arreglo que contiene:
        * **raw** valor sin procesar.
        * **values** valores tipo ***float*** de los rangos de la descarga.
    * Realizamos un cambio en **reviews**, ahora es un arreglo que contiene:
        * **raw** valor sin procesar.
        * **value** valore tipo ***float*** del numero de valoraciones.
    * Realizamos un cambio en el valor de **histogram**, ahora cada elemento es un arreglo que contiene:
        * **raw** valor sin procesar.
        * **value** valores tipo ***float*** del numero de valoraciones.
    * Realizamos un cambio en el valor de **version**, ahora es un arreglo que contiene:
        * **raw** valor sin procesar.
        * **value** valores tipo ***string*** con el numero de la versión.
    * Eliminado **androidVersionText** ahora **androidVersion** es un arreglo que contiene:
        * **raw** valor sin procesar.
        * **value** valores tipo ***float*** de la versi'on de android requerida.
    * Se hizo un ajustes en los comentarios, ahora trae los ultimos 40 comentarios.
* 1.0.2
    * Corrigiendo error al extraer la metadata del paquete
* 1.0.1
    * Esta versión esta siendo generada para corregir errores generados por paquetes que no tienen reviews
