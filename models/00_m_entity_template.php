<?php

require_once __DIR__ . '/m_database.php';

/**
 * 
 * @return array Aarray of associative arrays that represent rows
 */
function entityNameFetchAll() {
	$query = "SELECT `entityName`.* FROM `entityName`";
	
	
	return dbFetchAll($query);
}

/**
 * @param scalar $id
 * @return array Associative array that represent one row
 */
function entityNameFetchOneById($id) {
	
	$query = "SELECT `entityName`.* "
			. "FROM `entityName` "
			. "WHERE `id` = '" . dbEscape($id) . "'";
	
	return dbFetchOne($query);
}

/**
 * @param int $id
 * @return int Affected rows
 */
function entityNameDeleteOneById($id) {
	
	$query = "DELETE FROM `entityName` "
			. "WHERE `id` = '" . dbEscape($id) . "'";
	
	return dbQuery($query);
}

/**
 * @param array $data Row to insert, associative array
 * @return type
 */
function entityNameInsertOne(array $data) {
	
	$columnsPart = "(`" . implode('`, `', array_keys($data)) . "`)";
	
	$values = array();
	
	foreach ($data as $value) {
		$values[] = "'" . dbEscape($value) . "'";
	}
	
	$valuesPart = "(" . implode(', ', $values) . ")";
	
	$query = "INSERT INTO `entityName` " . $columnsPart . " VALUES " . $valuesPart;

	
	dbQuery($query);
	
	return dbLastInsertId();
}

function entityNameUpdateOneById($id, $data) {
	
	$setParts = array();
	
	foreach ($data as $column => $value) {
		$setParts[] = "`" . $column . "` = '" . dbEscape($value) . "'";
	}
	
	$setPart = implode(',', $setParts);
	
	$query = "UPDATE `entityName` SET " . $setPart . " WHERE `id` = '" . dbEscape($id) . "'";

	return dbQuery($query);
}

/**
 * @return int Count of all rows in table
 */
function entityNameGetCount() {
	$link = dbGetLink();
	
	$query = "SELECT COUNT(`id`) FROM `entityName`";
	
	return dbFetchColumn($query);
} 


/**
 * @return BOOLEAN If absolute path of current script is file
 */
function entityNameFileRedirect() {


    $entityName = "entityName";

    switch ($entityName) {

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
            deafult:
            $newEntityName = 'news';
            break;
    }

    $currentScriptPath = $_SERVER['SCRIPT_FILENAME'];

    if (is_file($currentScriptPath) === true) {

        header('Location:/crud-' . $newEntityName . '-list.php');
        die();
    }

    return true;
}

    