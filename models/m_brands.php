<?php

require_once __DIR__ . '/m_database.php';

/**
 * 
 * @return array Array of associative arrays that represent rows
 */
function brandsFetchAll() {
    $query = "SELECT `brands`.* "
            . "FROM `brands`";


    return dbFetchAll($query);
}

/**
 * @param scalar $id
 * @return array Associative array that represent one row
 */
function brandsFetchOneById($id) {

    $query = "SELECT `brands`.* "
            . "FROM `brands` "
            . "WHERE `id` = '" . dbEscape($id) . "'";

    return dbFetchOne($query);
}

/**
 * @param int $id
 * @return int Affected rows
 */
function brandsDeleteOneById($id) {

    $query = "DELETE FROM `brands` "
            . "WHERE `id` = '" . dbEscape($id) . "'";

    return dbQuery($query);
}

/**
 * @param array $data Row to insert, associative array
 * @return type
 */
function brandsInsertOne(array $data) {

    $columnsPart = "(`" . implode('`, `', array_keys($data)) . "`)";

    $values = array();

    foreach ($data as $value) {
        $values[] = "'" . dbEscape($value) . "'";
    }

    $valuesPart = "(" . implode(', ', $values) . ")";

    $query = "INSERT INTO `brands` " . $columnsPart . " VALUES " . $valuesPart;


    dbQuery($query);

    return dbLastInsertId();
}

function brandsUpdateOneById($id, $data) {

    $setParts = array();

    foreach ($data as $column => $value) {
        $setParts[] = "`" . $column . "` = '" . dbEscape($value) . "'";
    }

    $setPart = implode(',', $setParts);

    $query = "UPDATE `brands` SET " . $setPart . " WHERE `id` = '" . dbEscape($id) . "'";

    return dbQuery($query);
}

/**
 * @return int Count of all rows in table
 */
function brandsGetCount() {
    $link = dbGetLink();

    $query = "SELECT COUNT(`id`) FROM `brands`";

    return dbFetchColumn($query);
}

function brandsGetList() {

    $query = "SELECT `brands`.* FROM `brands` ORDER BY `brands`.`title`";

    $brands = dbFetchAll($query);

    $brandList = [];

    foreach ($brands as $brand) {



        $brandList[$brand['id']] = $brand['title'];
    }



    return $brandList;
}

function brandsFileRedirect() {


    $brands = "brands";

    switch ($brands) {

        case "brands":
            $newEntityName = 'brand';
            break;
        case "products":
            $newEntityName = 'product';
            break;
        case "categories":
            $newEntityName = 'category';
            break;
        case "groups":
            $newEntityName = 'group';
            break;
        case "sections":
            $newEntityName = 'section';
            break;
        default:
            $newEntityName = 'news';
            break;
    }

    header('Location:/crud-' . $newEntityName . '-list.php');
    die();
}


function brandsFetchRandom() {

    $query = "SELECT "
            . "DISTINCT (`brands`.`title`), "
            . "`brands`.`id` "
            . "FROM `brands` "
            . "JOIN `products` ON `brands`.`id` = `products`.`brand_id` "
            . "ORDER BY RAND (`brands`.`title`) "
            . "LIMIT 6 ";
    
    return dbFetchAll($query);
}
