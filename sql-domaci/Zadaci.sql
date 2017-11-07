-- Napisati upit koji ispisuje gradove ali sa redom sledecim informacijama: naziv drzave, naziv regije, naziv grada

SELECT 
    countries.`name` AS naziv_drzave,
    s.`name` AS naziv_regije,
    c.`name` AS naziv_grada 
    
FROM 
    cities AS c
JOIN 
    states AS s ON s.id = c.state_id 
JOIN 
    countries ON countries.id = s.country_id;
    

-- Napisati upit koji ispipsuje gradove koji imaju populaciju milion ili vise, sortiranim po populaciji opadajuce, sa sledecim informacijama: kratki kod zemlje, naziv zemlje, naziv grada, populacija

SELECT 
    countries.`sortname` AS kod_zemlje,
    countries.`name` AS naziv_zemlje,
    cities.`name` AS naziv_grada,
    cities.`population` AS populacija
FROM 
    cities   
JOIN 
    states ON cities.state_id = states.id
JOIN 
    countries ON states.country_id = countries.id 
WHERE 
    population >= 1000000 
ORDER BY 
    population DESC;

-- Napisati upit koji prikazuje gradove za koje nije uneta populacija (tj populacija je 0) sa kolonama: naziv drzave, naziv regije, naziv grada

SELECT   
    countries.`name` AS naziv_drzave,
    states.`name` AS naziv_regije,    
    cities.`name` AS naziv_grada 
FROM 
    countries    
JOIN 
    states ON countries.id = states.country_id 
JOIN 
    cities ON states.id = cities.state_id; 
WHERE 
    population = 0;


-- Napisati upit koji prikazuje broj gradova za koje nije uneta populacija 

SELECT 
    COUNT(cities.`id`) AS broj_gradova_bez_populacije
FROM 
    cities 
WHERE 
    population = 0;



-- Napisati upit koji prikazuje regije zajedno sa brojem stanovnika u regiji, polja koja se prikazuju su: naziv drzave, naziv regije, broj stanovnika u regiji

SELECT 
    countries.`name` AS naziv_drzave, 
    states.`name` AS naziv_regije, 
    SUM(cities.`population`) AS br_stanovnika_u_regiji
FROM 
    countries 
JOIN 
    states ON countries.id = states.country_id 
JOIN 
    cities ON states.id = cities.state_id 
GROUP BY 
    states.`name`;


-- Napisati upit koji pronalazi 10 regija sa najvise stanovnika, polja koja se prikazuju su: naziv drzave, naziv regije, broj stanovnika u regiji 

SELECT 
    countries.`name` AS naziv_drzave, 
    states.`name` AS naziv_regije, 
    SUM(cities.`population`) AS br_stanovnika_u_regiji
FROM 
    countries 
JOIN 
    states ON countries.id = states.country_id 
JOIN 
    cities ON states.id = cities.state_id 
GROUP BY 
    states.`name` 
ORDER BY 
    SUM(cities.`population`) DESC 
LIMIT 10;


-- Napisati upit koji pronalazi regija sa brojem stanovnika vecim od milion, polja koja se prikazuju su: naziv drzave, naziv regije, broj stanovnika u regiji 

SELECT 
    countries.`name` AS naziv_drzave, 
    states.`name` AS naziv_regije, 
    SUM(cities.`population`) AS br_stanovnika_u_regiji
FROM 
    countries 
JOIN 
    states ON countries.id = states.country_id 
JOIN 
    cities ON states.id = cities.state_id 
GROUP BY 
    states.`name`  
HAVING 
    SUM(cities.`population`) > 1000000;
    
    

-- Napisati upit koji pronalazi 5 regija sa najvise registrovanih gradova, polja koja se prikazuju su: naziv drzave, naziv regije, broj gradova u regiji 
SELECT 
    countries.`name` AS naziv_drzave, 
    states.`name` AS naziv_regije, 
    COUNT(cities.`id`) AS br_gradova_u_regiji
FROM 
    countries 
JOIN 
    states ON countries.id = states.country_id 
JOIN 
    cities ON states.id = cities.state_id 
GROUP BY 
    states.`name`   
ORDER BY 
    COUNT(cities.`id`) DESC 
LIMIT 5;

-- Napisati upit koji pronalazi regije sa nijednim unetim gradom (broj gradova je 0), polja koja se prikazuju su: naziv drzave, naziv regije, broj gradova u regiji 

SELECT 
    countries.`name` AS naziv_drzave, 
    states.`name` AS naziv_regije, 
    COUNT(cities.`id`) AS br_gradova_u_regiji 
    
FROM 
    countries 
JOIN 
    states ON countries.id = states.country_id 
JOIN 
    cities ON states.id = cities.state_id 
GROUP BY 
    states.`name` 
HAVING 
    COUNT(cities.`id`) = 0;


-- Napisati upit koji pronalazi 5 regija sa najvise registrovanih gradova ciji naziv pocinje sa slovom 'r', polja koja se prikazuju su: naziv drzave, naziv regije, broj gradova u regiji 
SELECT 
    countries.`name` AS naziv_drzave, 
    states.`name` AS naziv_regije, 
    COUNT(cities.`id`) AS br_gradova_u_regiji, 
FROM 
    countries  
JOIN 
    states ON countries.id = states.country_id 
JOIN 
    cities ON states.id = cities.state_id  
WHERE 
    cities.`name` LIKE 'r%'
GROUP BY 
    states.`name`   
ORDER BY 
    COUNT(cities.`id`) DESC 
LIMIT 5;

-- Napisati upit koji pronalazi 5 regija sa najvise milionskih gradova (broje se gradovi sa populacijom vecom od milion), polja koja se prikazuju su: naziv drzave, naziv regije, broj gradova u regiji

SELECT 
    countries.`name` AS naziv_drzave, 
    states.`name` AS naziv_regije, 
    COUNT(cities.`id`) AS br_gradova_u_regiji, 
FROM 
    countries  
JOIN 
    states ON countries.id = states.country_id 
JOIN 
    cities ON states.id = cities.state_id  
WHERE 
    cities.`population` > 1000000
GROUP BY 
    states.`name`   
ORDER BY 
    COUNT(cities.`id`) DESC 
LIMIT 5;


-- Napisati upit koji pronalazi drzave koje imaju vise od 100 regija, polja koja se prikazuju su id drzave, kratki kod drzave, naziv drzave i broj regija
SELECT 
    countries.`id` AS id_drzave, 
    countries.`sortname` AS kod_drzave, 
    countries.`name` AS naziv_drzave, 
    COUNT(states.`id`) 
FROM 
    countries  
JOIN 
    states ON countries.id = states.country_id 
GROUP BY 
    countries.`name` 
HAVING 
    COUNT(states.`id`) > 100;
    
    

-- Napisati upit koji pronalazi drzave koje imaju vise od 10 regija ciji naziv pocinje sa slovom 'a', polja koja se prikazuju su id drzave, kratki kod drzave, naziv drzave i broj regija

SELECT 
    countries.`id` AS id_drzave, 
    countries.`sortname` AS kod_drzave, 
    countries.`name` AS naziv_drzave, 
    COUNT(states.`id`), 
    
FROM 
    countries  
JOIN 
    states ON countries.id = states.country_id  
WHERE 
    states.`name` LIKE 'a%'
GROUP BY 
    countries.`name` 
HAVING 
    COUNT(states.`id`) > 10;
-- Napisati upit koji prikazuje drzave zajedno sa njihovim brojem stanovnika, sortiranih po broju stanovnika opadajuce, polja koja se prikazuju su id drzave, kratki kod drzave, naziv drzave i broj stanovnika
SELECT 
    countries.`id` AS id_drzave, 
    countries.`sortname` AS kod_drzave, 
    countries.`name` AS naziv_drzave, 
    SUM(cities.`population`) 
    
FROM 
    countries  
JOIN 
    states ON countries.id = states.country_id  
JOIN  
    cities ON states.id = cities.state_id
GROUP BY 
    countries.`name` 
ORDER BY 
    SUM(cities.`population`) DESC

-- Napisati upit koji prolazi drzave koje imaju vise od milion stanovnika, polja koja se prikazuju su id drzave, kratki kod drzave, naziv drzave i broj stanovnika
SELECT 
    countries.`id` AS id_drzave, 
    countries.`sortname` AS kod_drzave, 
    countries.`name` AS naziv_drzave, 
    SUM(cities.`population`) 
    
FROM 
    countries  
JOIN 
    states ON countries.id = states.country_id  
JOIN  
    cities ON states.id = cities.state_id 
GROUP BY 
    countries.`name` 
HAVING  
    SUM(cities.`population`) > 1000000;
-- Napisati upit koji prikazuje prvih 5 drzava sa najvise milionskih gradova 

SELECT 
    countries.`name` AS naziv_drzave, 
    COUNT(cities.`id`) AS br_milionskih_gradova
FROM 
    countries  
JOIN 
    states ON countries.id = states.country_id  
JOIN  
    cities ON states.id = cities.state_id  
WHERE 
    cities.`population` > 1000000
GROUP BY 
    countries.`name` 
ORDER BY 
    COUNT(cities.`id`) DESC 
LIMIT 5;



