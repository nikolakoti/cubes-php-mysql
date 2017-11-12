

<?php

session_start(); 

require_once __DIR__ . '/models/m_users.php'; 

if (!isUserLoggedIn()) {
    header('Location: /login.php'); 
    die();
}

require_once __DIR__ . '/models/m_brands.php';



$formData = array(
    'title' => '',
    'website_url' => ''
        //ovde napisati sve kljuceve i pocetne vrednosti
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
    } else {//Ovaj else ide samo ako je polje obavezno
        $formErrors["title"][] = "Polje title je obavezno";
    }



    if (isset($_POST["website_url"]) && $_POST["website_url"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["website_url"] = $_POST["website_url"];

        //Filtering 1
        $formData["website_url"] = trim($formData["website_url"]);
    }
    /*     * ********* filtriranje i validacija polja *************** */


    //Ukoliko nema gresaka 
    if (empty($formErrors)) {
        //Uradi akciju koju je korisnik trazio 

        $newBrandId = brandsInsertOne($formData);
        
        brandsRedirect();
    }
}

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-brand-insert.php';
require_once __DIR__ . '/views/layout/footer.php';

