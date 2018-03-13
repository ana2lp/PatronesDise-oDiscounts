## Descripción del problema

Realizar una aplicación que permita generar descuentos por compra en el prototipo de una tienda de e-commerce utilizando el modelo de base de datos proporcionado y aplicando en la codificación al menos 3 patrones de diseño de comportamiento y/o estructurales.

El tipo de descuento que se va a manejar es mediante cupón, utilizando solamente esa parte del modelo de base de datos (Azul)

## RESTRICCIONES DEL DESCUENTO POR CUPÓN

-Debe permitir un descuento por porcentaje
-Debe permitir un descuento por periodos (fechas-horas)
-Debe permitir hacer descuento por categoría de productos
-Cupón solo válido para una sola compra
-El cupón debe permitir un tope máximo por compra de productos (cantidad monetaria) o por compra mínima. Ej. En la compra de $1000 se aplica en 10% de descuento

*Queda fuera el cálculo de impuestos.

## Solución

Para la solución se ocuparon 2 patrones de creación, Builder y Factory. 
Se utilizó el Chain of Responsability para determinar si el producto trae un descuento por cupón o por producto. La implemtación del AbstractHandler es una implementación del Template Method dentro del Chain of Responsability.
El Strategy se utilizó para implementar si el descuento es por porcentaje o por moneda.
Todos los patrones están dentro del directorio App/Services
En donde se ocupan es en el archivo App/Http/Controllers/OrderController.php
