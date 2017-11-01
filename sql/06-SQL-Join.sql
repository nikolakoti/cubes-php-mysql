-- Zadatak: Napisati UPDATE upite da se prenesu kljuceve od brenda i kategorija u tabelu products
UPDATE products SET brand_id = 1 WHERE brand = 'Apple'; 
UPDATE products SET brand_id = 2 WHERE brand = 'Beko'; 
UPDATE products SET brand_id = 3 WHERE brand = 'Bosh'; 
UPDATE products SET brand_id = 4 WHERE brand = 'Gorenje'; 
UPDATE products SET brand_id = 5 WHERE brand = 'HTC'; 
UPDATE products SET brand_id = 6 WHERE brand = 'Huawei'; 
UPDATE products SET brand_id = 7 WHERE brand = 'LG'; 
UPDATE products SET brand_id = 8 WHERE brand = 'Samsung'; 
UPDATE products SET brand_id = 9 WHERE brand = 'Sony'; 

UPDATE products SET category_id = 1 WHERE category = 'Mobilni Telefon'; 
UPDATE products SET category_id = 2 WHERE category = 'Televizor'; 
UPDATE products SET category_id = 3 WHERE category = 'Frizider'; 
UPDATE products SET category_id = 4 WHERE category = 'Ves masina'; 
UPDATE products SET category_id = 5 WHERE category = 'Sporet';
-- Zadatak: Obrisati polja brand i category iz tabele products

-- SQL JOIN (INNER JOIN)

-- Zadatak: Selektuj id proizvoda, naziv proizvoda, id kategorije i naziv kategorije
SELECT 
    products.id, products.title, products.category_id, 
    categories.title AS category_title
FROM
    products 
JOIN 
    categories ON products.category_id = categories.id;
-- Zadatak: Selektuj id proizvoda, naziv proizvoda, id brenda i naziv brenda
SELECT 
    p.id, 
    p.title, 
    b.id as brand_id,
    b.title as brand_title
FROM
    products as p
JOIN 
    brands as b ON p.brand_id = b.id;


-- Zadatak: Selektuj id proizvoda, naziv proizvoda, id kategorije i naziv kategorije, id brenda i naziv brenda

SELECT 
    p.id, 
    p.title, 
    c.id as category_id, 
    c.title as category_title,
    b.id as brand_id,
    b.title as brand_title
FROM
    products as p
JOIN 
    brands as b ON p.brand_id = b.id 
JOIN 
    categories as c on c.id = p.category_id;


-- Zadatak: Ubaciti proizvod bez kategorije i proizvod bez brenda, ubaciti brendove i kategorije bez proizvoda 

-- SQL LEFT JOIN
-- Zadatak: Selektuj id proizvoda, naziv proizvoda, id kategorije i naziv kategorije  ZA SVE PROIZVODE I ONE KOJI NEMAJU KATEGORIJU
SELECT 
    products.id, products.title, products.category_id, 
    categories.title AS category_title
FROM
    products 
LEFT JOIN 
    categories ON products.category_id = categories.id;
-- Zadatak: Selektuj id proizvoda, naziv proizvoda, id brenda i naziv brenda  ZA SVE PROIZVODE I ONE KOJI NEMAJU BREND 
SELECT 
    p.id, 
    p.title, 
    b.id as brand_id,
    b.title as brand_title
FROM
    products as p
LEFT JOIN 
    brands as b ON p.brand_id = b.id;
-- Zadatak: Selektuj id proizvoda i naziv proizvoda za sve proizvode koji NEMAJU KATEGORIJU

SELECT 
    products.id, 
    products.title, 
    products.category_id, 
    categories.id, 
    categories.title
FROM 
    products 
LEFT JOIN  
    categories on products.category_id = categories.id
WHERE 
    categories.id IS NULL;
-- SQL RIGHT JOIN

-- Zadatak: Selektuj nazive kategorija koje nemaju proizvode
SELECT 
    categories.id, 
    categories.title, 
    products.id, 
    products.category_id 
FROM 
    categories 
LEFT JOIN 
    products on categories.id = products.category_id 
WHERE 
    products.category_id IS NULL; 

SELECT 
    categories.id, 
    categories.title, 
    products.id, 
    products.category_id 
FROM 
    products
RIGHT JOIN 
    categories on categories.id = products.category_id 
WHERE 
    products.id IS NULL;

-- Zadatak: Selektuj nazive brendova koji nemaju proizvode

SELECT 
    brands.id, 
    brands.title, 
    products.id, 
    products.category_id 
FROM 
    products
RIGHT JOIN 
    brands on brands.id = products.brand_id 
WHERE 
    products.id IS NULL;