<?php

session_start();

require_once __DIR__ . '/models/m_categories.php';
require_once __DIR__ . '/models/m_groups.php';



$formData = array(
    'title' => '',
    'group_id' => '',
    'description' => ''
);

//ovde se smestaju greske koje imaju polja u formi
$formErrors = array();


//uvek se prosledjuje jedno polje koje je indikator da su podaci poslati sa forme
//odnosno da je korisnik pokrenuo neku akciju
if (isset($_POST["task"]) && $_POST["task"] == "insert") {

    /*     * ********* filtriranje i validacija polja *************** */
    if (isset($_POST["title"]) && $_POST["title"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["title"] = $_POST["title"];

        //Filtering 1
        $formData["title"] = trim($formData["title"]);
        //Filtering 2
        //Filtering 3
        //Filtering 4
        //...
        //Validation 2
        //Validation 3
        //Validation 4
        //...
    }

    if (isset($_POST["group_id"]) && $_POST["group_id"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["group_id"] = $_POST["group_id"];

        //Filtering 1
        $formData["group_id"] = trim($formData["group_id"]);


        $group_idPossibleValues = groupsFetchAll();
    }

    if (isset($_POST["description"]) && $_POST["description"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["description"] = $_POST["description"];

        //Filtering 1
        $formData["description"] = trim($formData["description"]);
    }
    /*     * ********* filtriranje i validacija polja *************** */


    //Ukoliko nema gresaka 
    if (empty($formErrors)) {

        $newCategoryId = categoriesInsertOne($formData);

        header('Location: /crud-category-list.php');
        die();
        //Uradi akciju koju je korisnik trazio
    }
}

$groups = groupsFetchAll();

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-category-insert.php';
require_once __DIR__ . '/views/layout/footer.php';
