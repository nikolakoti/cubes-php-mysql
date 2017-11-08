<?php

session_start();


require_once __DIR__ . '/models/m_groups.php';

if (empty($_GET['id'])) {
    die('morate proslediti id');
}

$id = (int) $_GET['id'];

$group = groupsFetchOneById($id);

if (empty($group)) {
    die('Trazeni grupa ne psotoji');
}


//ovde se prihvataju vrednosti polja, popisati sve kljuceve i pocetne vrednosti
$formData = array(
    'title' => $group['title'],
    
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



    

        //Validation 2
        //Validation 3
        //...
    

    
    /*     * ********* filtriranje i validacija polja *************** */


    //Ukoliko nema gresaka 
    if (empty($formErrors)) {
        groupsUpdateOneById($group['id'], $formData);

        header('Location: /crud-group-list.php');
        die();
//Uradi akciju koju je korisnik trazio
    }
}


require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-group-edit.php';
require_once __DIR__ . '/views/layout/footer.php';

