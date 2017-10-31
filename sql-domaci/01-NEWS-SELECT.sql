-- Osnove SELECT upita
--
-- Zadatak 01: Selektuj sve vesti iz kategorije 'Sport'

SELECT * FROM 
    news 
WHERE 
    category = 'Sport';

-- Zadatak 02: Selektuj sve vesti sa portala 'Blic' iz kategorije 'Sport' 

SELECT * FROM
    news 
WHERE 
    portal = 'Blic' 
    AND category = 'Sport';

-- Zadatak 03: Selektuj sve vesti sa portala 'Blic', 'Kurir', 'Informer' iz kategorije 'Politika' 

SELECT * FROM 
    news 
WHERE 
    portal IN('Blic', 'Kurir', 'Informer') 
    AND category = 'Politika';

-- Zadatak 04: Selektuj sve vesti sa portala 'Blic', 'Kurir', 'Novosti' iz kategorije 'Politika', 'Sport', 'Srbija' 

SELECT * FROM 
    news 
WHERE 
    portal IN('Blic', 'Kurir', 'Informer') 
AND 
    category IN ('Politika', 'Sport', 'Srbija');

-- Zadatak 05: Selektuj sve vesti koje su na home page-u 

SELECT * FROM
    news 
WHERE 
    `news`.`on_homepage` = TRUE;

-- Zadatak 06: Selektuj sve vesti koje su na home page-u i imaju vise o 100 facebook like-ova 

SELECT * FROM 
    news 
WHERE 
    `news`.`on_homepage` = TRUE HAVING facebook_likes > 100;

-- Zadatak 07: Selektuj sve vesti koje su na home page-u bile objavljene '2017-10-25' 

SELECT * FROM 
    news 
WHERE 
    `news`.`on_homepage` = TRUE HAVING publish_time BETWEEN '2017-10-25 00:00:00' AND '2017-10-25 23:59:00'
ORDER BY `news`.`publish_time` ASC;

-- Zadatak 08: Selektuj sve vesti koje su ili bile na home page-u ili one koje su istovremeno bile u kategoriji Sport i imale vise od 100 lajkova

SELECT * FROM 
    news 
WHERE 
    `news`.`on_homepage` = TRUE 
    OR `news`.`category` = 'Sport' HAVING facebook_likes > 100;
-- Zadatak 09: Selektuj sve vesti koje su imale u naslovu rec 'NBA' ili koje su u opisu imale rec 'NBA' 

SELECT * FROM  
    news
HAVING
    title LIKE 'NBA%' OR title LIKE '%NBA%' OR title LIKE '%NBA'
    AND description LIKE 'NBA%' OR description LIKE '%NBA%' OR description LIKE '%NBA';

-- Zadatak 10: Selektuj sve vesti koje sadrze rec 'NBA' u naslovu ili opisu ali istovremeno da imaju vise od 100 lajkova

SELECT * FROM  
    news
WHERE  
    title LIKE 'NBA%' OR title LIKE '%NBA%' OR title LIKE '%NBA'
    AND description LIKE 'NBA%' OR description LIKE '%NBA%' OR description LIKE '%NBA' 
HAVING facebook_likes > 100; 
    

-- Zadatak 11: Selektuj prvih 10 vesti sa najvise lajkova 

SELECT * FROM
    news 
ORDER BY `news`.`facebook_likes`  DESC 
LIMIT 10;


-- Zadatak 12: Selektuj drugih 20 vesti sa najvse lakova u kategorjiji 'Sport' 

SELECT * FROM
    news 
WHERE 
    category = 'Sport'
ORDER BY `news`.`facebook_likes`  DESC 
LIMIT 20 
OFFSET 10;

-- Zadatak 13: Selektuj trecih 30 vesti sa najvise lajkova u kategoriji 'Sport' na portalima 'Blic', 'Kurir' i 'Informer 

SELECT * FROM
    news 
WHERE 
     category = 'Sport' AND portal IN ('Blic', 'Kurir', 'Informer')
ORDER BY `news`.`facebook_likes`  DESC 
LIMIT 30 
OFFSET 20;


-- Zadatak 14: Selektuj sve kategorije koje se spominju u vestima 

SELECT 
    DISTINCT(category) 
FROM 
    news;

-- Zadatak 15: Selektuj sve portale koje se spominju u vestima 

SELECT 
    DISTINCT(portal) 
FROM 
    news;

-- Zadatak 16: Izlistati sve kategorije zajedno sa brojem vesti u tim kategorijama 
SELECT 
    category, 
    COUNT(id) AS br_vesti 
FROM news 
GROUP BY category 
ORDER BY 
    COUNT(id) ASC;


-- Zadatak 17: Izlistati sve portale zajedno sa brojem vesti na tim portalima 

SELECT 
    portal, 
    COUNT(id) AS br_vesti
FROM news 
GROUP BY portal;


-- Zadatak 18: Izlistati sve kategorije zajedno sa brojem vesti i ukupnim brojem lajkova u tim kategorijama

SELECT  
    category,
    COUNT(id) as br_vesti,
    SUM(facebook_likes) as ukupan_br_lajkova
FROM 
    news 
GROUP BY
    category;

-- Zadatak 19: Izlistati prva 3 portala sa najvise vesti 

SELECT   
    portal, 
    COUNT (id) AS najvise_vesti
FROM news 
GROUP BY portal 
LIMIT 3; 

-- Zadatak 20: Izlistati sve kategorije zajedno sa brojem vesti i ukupnim brojem lajkova u tim kategorijama, sortiranih prvo po broju lajkova pa po broju vesti

SELECT  
    category,
    COUNT(id) AS br_vesti,
    SUM(facebook_likes) AS ukupan_br_lajkova
FROM 
    news 
GROUP BY
    category 
ORDER BY 
     SUM(facebook_likes) DESC,
     COUNT(id) ASC;

-- Zadatak 21: Izlistati sve portale i broj vesti na njhovom home page-u

SELECT 
    portal,
    COUNT(id) AS br_vesti 
FROM news
WHERE 
    on_homepage = TRUE 
GROUP BY portal;
   


-- Zadatak 22: Izlistati sve portale koji su imali vise od 100 vesti na home page-u 

SELECT 
    portal,
    COUNT(id) AS br_vesti
FROM 
    news 
WHERE 
    on_homepage = TRUE  
GROUP BY portal
HAVING
    COUNT(id) > 100;

-- Zadatak 23: Izlistati sve portale koji su imali vise od 10 vesti na home page-u dana 2017-10-25 

SELECT 
    portal,
    COUNT(id) AS br_vesti
FROM 
    news 
WHERE 
    on_homepage = TRUE  
    and publish_time BETWEEN '2017-10-25 00:00:00' AND '2017-10-25 23:59:00'
GROUP BY portal
HAVING
    COUNT(id) > 100;


-- Zadatak 24: Izlistati sve portale i broj razlicitih kategorija na tim portalima (nismo radili, HINT COUNT(DISTINCT ...))

SELECT 
    portal,
    COUNT(DISTINCT(category)) AS br_razlicitih_kategorija
FROM
    news
GROUP BY 
    portal;