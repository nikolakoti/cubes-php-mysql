<?php

session_start();

require_once __DIR__ . '/models/m_categories.php';
require_once __DIR__ . '/models/m_groups.php';

if (empty($_GET['id'])) {
    die('morate proslediti id');
}

$id = (int) $_GET['id'];

$category = categoriesFetchOneById($id);

if (empty($category)) {
    die('Trazeni brend ne psotoji');
}


//ovde se prihvataju vrednosti polja, popisati sve kljuceve i pocetne vrednosti
$formData = array(
    'title' => $category['title'],
    'group_id' => $category['group_id'],
    'description' => $category['description']
        //ovde napisati sve kljuceve i pocetne vrednosti
);

//ovde se smestaju greske koje imaju polja u formi
$formErrors = array();


//uvek se prosledjuje jedno polje koje je indikator da su podaci poslati sa forme
//odnosno da je korisnik pokrenuo neku akciju
if (isset($_POST["task"]) && $_POST["task"] == "save") {

    /*     * ********* filtriranje i validacija polja *************** */

    if (isset($_POST["title"]) && $_POST["title"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["title"] = $_POST["title"];

        //Filtering 1
        $formData["title"] = trim($formData["title"]);
    } else {//Ovaj else ide samo ako je polje obavezno
        $formErrors["title"][] = "Polje title je obavezno";
    }



    if (isset($_POST["group_id"]) && $_POST["group_id"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["group_id"] = $_POST["group_id"];

        //Filtering 1
        $formData["group_id"] = trim($formData["group_id"]);


        $group_idPossibleValues = groupsFetchAll();

        //Validation videti da li je prosledjena vrednost medju opcijama
        if (!in_array($formData["group_id"], $group_idPossibleValues)) {
            $formErrors["group_id"][] = "Izabrali ste neodgovarajucu vrednost za polje group_id";
        }

        //Validation 2
        //Validation 3
        //...
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
        categoriesUpdateOneById($category['id'], $formData);

        header('Location: /crud-category-list.php');
        die();
//Uradi akciju koju je korisnik trazio
    }
}
$groups = groupsFetchAll();

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-category-edit.php';
require_once __DIR__ . '/views/layout/footer.php';
