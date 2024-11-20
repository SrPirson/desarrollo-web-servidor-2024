USE animes_bd; -- Linkear con la BBDD.
SELECT * FROM animes; -- Ctrl + Enter para ejecutar la linea seleccionada.

SELECT * FROM animes ORDER BY anno_estreno ASC; -- Orden ascendente
SELECT * FROM animes ORDER BY anno_estreno DESC; -- Orden descendente
SELECT * FROM animes WHERE titulo = "Frieren"; -- Todos los animes que su titulo empiezan por lo que indiquemos
SELECT * FROM animes WHERE titulo LIKE "f%"; -- Todos los animes que su titulo empiecen por la letra que le indiquemos
SELECT * FROM animes WHERE titulo LIKE "%n"; -- Todos los animes que su titulo acaben por la letra que le indiquemos
SELECT * FROM animes WHERE titulo LIKE "%a%"; -- Todos los animes que su titulo contengan por la letra que le indiquemos
SELECT * FROM animes WHERE titulo LIKE "%frieren%"; -- Todos los animes que su titulo contengan la palabra que le indiquemos
SELECT * FROM animes WHERE titulo LIKE "%tragones%";

SELECT titulo, nombre_estudio, anno_estreno 
	FROM animes
    WHERE anno_estreno > 2010;  -- Todos lo que le indicamos con año mayor a 2010
SELECT titulo, nombre_estudio, anno_estreno 
	FROM animes
    WHERE anno_estreno BETWEEN 2010 AND 2020; -- Todos lo que le indicamos entre los años 2010 y 2020
SELECT titulo, nombre_estudio, anno_estreno 
	FROM animes
    WHERE anno_estreno BETWEEN 2010 AND 2020
    ORDER BY titulo; -- Todos lo que le indicamos entre los años 2010 y 2020 ordenado por titulo

SELECT * FROM estudios;
SELECT * FROM animes;

-- Vamos a mostrar el titulo del anime, su estudio y la ciudad del estudio
SELECT a.titulo, a.nombre_estudio, e.ciudad
	FROM animes a JOIN estudios e  -- alias para las tablas, a para animes y e para estudios
		ON a.nombre_estudio = e.nombre_estudio; -- igualamos la clave foránea con la clave primaria con la que se relaciona

-- Vamos a mostrar el titulo del anime, su estudio y la ciudad del estudio
SELECT a.titulo, a.nombre_estudio, e.ciudad
	FROM animes a RIGHT JOIN estudios e
		ON a.nombre_estudio = e.nombre_estudio;
        
SET AUTOCOMMIT = 0; -- Eliminar el auto guardado, por defecto viene en 1.
SET SQL_SAFE_UPDATES = 0; -- Deshabilitamos el modo para niños.
DELETE FROM animes;
SELECT * FROM animes;
ROLLBACK;
SELECT * FROM animes;
INSERT INTO estudios VALUES ("Xunitraka","Málaga",2024);
SELECT * FROM estudios;
COMMIT;
/* 
	COMMIT --> GUARDAR
    ROLLBACK --> VOLVER AL ÚLTIMO GUARDADO    
*/ 

/* 
UNA SERIE DE INSTRUCCIONES ES ATOMICA CUANDO SE EJECUTA COMO SI FUERA SOLAMENTE 1.
SI ALGUNA DE SUS PARTES FALLA, TODO FALLA Y SE DESHACEN LOS CAMBIOS. (posible pregunta examen)

	UPDATE accounts SET saldo -= 30 WHERE id = "1234";
    ¡ERROR!
    UPDATE accounts SET saldo += 30 WHERE id = "0011";
    COMMIT; -- solo se guarda cuando se hace commit
*/

