-- Napisati upit koji bise proizvod sa ID-jem 32

DELETE 
FROM 
    products 
WHERE 
    id = 32;

-- Napisati upit koji brise sve proizvode iz kategorije 'Ves masina' 

DELETE 
FROM 
    products 
WHERE 
    category = 'Ves masina';
-- Napisati upit koji brise proizvode sa ID-jevima 13, 23, 33 
DELETE 
FROM 
    products 
WHERE 
    id IN(13,23,33); 

-- CRUD - CREATE/READ/UPDATE/DELETE

