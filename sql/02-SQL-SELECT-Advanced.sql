-- Obnavljanje
-- Zadatak: Selektuj sve kategorije bez ponavljanja (DISTINCT) 

SELECT DISTINCT(category) 
FROM products;

-- Zadatak: Selektuj sve kategorije bez ponavljanja (GROUP BY) 

SELECT DISTINCT category
FROM products 
GROUP BY category;

-- Zadatak: Selektuj koja kategorija koliko proizvoda ima 
SELECT 
    category, 
    COUNT(id) AS broj_proizvoda 
FROM 
    products 
GROUP BY 
    category;

-- Zadatak: Selektuj koja kategorija koliko proizvoda ima i sortiraj opadajuce po broju proizvoda 
SELECT 
    category, 
    COUNT(id) AS broj_proizvoda
FROM 
    products 
GROUP BY 
    category 
ORDER BY 
    COUNT(id) DESC;

-- Zadatak: Selektuj koja kategorija ima najvise proizvoda (LIMIT) 
SELECT 
    category, 
    COUNT(id) AS broj_proizvoda
FROM 
    products 
GROUP BY 
    category 
ORDER BY 
    COUNT(id) DESC 
LIMIT 1;

-- Zadatak: Selektuj sve kategorije osim one koja ima najvise proizvoda 
SELECT 
    category, 
    COUNT(id) AS broj_proizvoda
FROM 
    products 
GROUP BY 
    category 
ORDER BY 
    COUNT(id) DESC 
LIMIT 10000
OFFSET 1;
-- Zadatak: Selektuj samo drugu kategoriju koja ima najvise proizvoda 
SELECT 
    category, 
    COUNT(id) AS broj_proizvoda
FROM 
    products 
GROUP BY 
    category 
ORDER BY 
    COUNT(id) DESC 
LIMIT 1 
OFFSET 1;
-- Zadatak: Selektuj kategorije koji imaju vise od 3 proizvoda (GROUP BY HAVING) 

SELECT 
    category, 
    COUNT(id) AS broj_proizvoda
FROM 
    products 
GROUP BY 
    category  
HAVING 
    COUNT(id) > 3 
ORDER BY 
    COUNT(id) DESC;

-- Vise agregatnih funckxija

-- Zadatak: Selektuj kategorije i njihov broj proizvoda, njihovu prosecnu cenu proizvoda i ukupno komada 
SELECT 
    category, 
    COUNT(id) AS broj_proizvoda, 
    SUM(price)/COUNT(id) AS prosecna_cena_proizvoda,
    SUM(quantity) AS ukupno_komada
FROM
    products 
GROUP BY 
    category ;

-- Zadatak: Selektuj brendove i broj kategorija u brendu, broj proizvoda u brendu i prosecnu cenu proizvoda u brendu 

SELECT 
    brand, 
    COUNT(DISTINCT category) AS br_kategorija_u_brendu, 
    COUNT(id) AS br_prozivoda_u_brendu, 
    ROUND(AVG(price), 2) AS prosecna_cena_proizvoda 
FROM products 
GROUP BY brand;


-- Upit u upitu
-- Zadatak: Selektuj sve proizvode iz kategorija koje imaju vise od 5 proizvoda 
SELECT 
    * 
FROM 
    products 
WHERE 
    category IN (  
SELECT 
    category, 
FROM 
    products 
GROUP BY 
    category  
HAVING 
    COUNT(id) > 5 
);

-- Zadatak: Selektuj sve proizvode iz brenda koji imaju vise od 5 proizvoda 

SELECT 
    * 
FROM 
    products 
WHERE 
    brand IN (  
SELECT 
    brand 
FROM 
    products 
GROUP BY 
    brand  
HAVING 
    COUNT(id) > 5 
); 

-- Zadatak: Selektuj proizvode iz kategorije sa najvise proizvoda 

SELECT category FROM products GROUP BY category ORDER BY (id) DESC LIMIT 1;

-- LIMIT nije moguce koristiti u podupitu!!!!!