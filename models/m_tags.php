<?php

require_once __DIR__ . '/m_database.php';

/**
 * 
 * @return array Aarray of associative arrays that represent rows
 */
function tagsFetchAll() {
    $query = "SELECT `tags`.* FROM `tags`";


    return dbFetchAll($query);
}

/**
 * @param scalar $id
 * @return array Associative array that represent one row
 */
function tagsFetchOneById($id) {

    $query = "SELECT `tags`.* "
            . "FROM `tags` "
            . "WHERE `id` = '" . dbEscape($id) . "'";

    return dbFetchOne($query);
}

/**
 * @param int $id
 * @return int Affected rows
 */
function tagsDeleteOneById($id) {

    $query = "DELETE FROM `tags` "
            . "WHERE `id` = '" . dbEscape($id) . "'";

    return dbQuery($query);
}

/**
 * @param array $data Row to insert, associative array
 * @return type
 */
function tagsInsertOne(array $data) {

    $columnsPart = "(`" . implode('`, `', array_keys($data)) . "`)";

    $values = array();

    foreach ($data as $value) {
        $values[] = "'" . dbEscape($value) . "'";
    }

    $valuesPart = "(" . implode(', ', $values) . ")";

    $query = "INSERT INTO `tags` " . $columnsPart . " VALUES " . $valuesPart;


    dbQuery($query);

    return dbLastInsertId();
}

function tagsUpdateOneById($id, $data) {

    $setParts = array();

    foreach ($data as $column => $value) {
        $setParts[] = "`" . $column . "` = '" . dbEscape($value) . "'";
    }

    $setPart = implode(',', $setParts);

    $query = "UPDATE `tags` SET " . $setPart . " WHERE `id` = '" . dbEscape($id) . "'";

    return dbQuery($query);
}

/**
 * @return int Count of all rows in table
 */
function tagsGetCount() {
    $link = dbGetLink();

    $query = "SELECT COUNT(`id`) FROM `tags`";

    return dbFetchColumn($query);
}

function tagsFileRedirect() {


    $tags = "tags";

    switch ($tags) {

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
        case 'tags':
            $newEntityName = 'tag';
        default:
            $newEntityName = 'news';
            break;
    }

    header('Location:/crud-' . $newEntityName . '-list.php');
    die();
}


function tagsFetchAllByProduct ($productId) {
    
    $query = "SELECT `tags`.* FROM `tags` "
            . "JOIN 
	product_tags ON tags.id = product_tags.tag_id
WHERE 
	product_tags.product_id = '" . dbEscape($productId) . "'";


    return dbFetchAll($query);
}