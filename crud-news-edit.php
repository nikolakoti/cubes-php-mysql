<?php

session_start();

require_once __DIR__ . '/models/m_users.php'; 

if (!isUserLoggedIn()) {
    header('Location: /login.php'); 
    die();
}

require_once __DIR__ . '/models/m_news.php'; 

require_once __DIR__ . '/models/m_sections.php';

if (empty($_GET['id'])) {
    die('Morate proslediti ID');
}

$id = (int) $_GET['id'];

$oneNews = newsFetchOneById($id);

if (empty($oneNews)) {
    die('Trazeni vest ne postoji');
}


//ovde se prihvataju vrednosti polja, popisati sve kljuceve i pocetne vrednosti
$formData = array(
    'section_id' => $oneNews['section_id'],
    'title' => $oneNews['title'],
    'description' => $oneNews['description'],
    //'photo' => $oneNews['photo'],
    'content' => $oneNews['content'],
    'created_at' => $oneNews['created_at']
    
        //ovde napisati sve kljuceve i pocetne vrednosti
);

//ovde se smestaju greske koje imaju polja u formi
$formErrors = array();


//uvek se prosledjuje jedno polje koje je indikator da su podaci poslati sa forme
//odnosno da je korisnik pokrenuo neku akciju
if (isset($_POST["task"]) && $_POST["task"] == "save") {

    /*     * ********* filtriranje i validacija polja *************** */
    if (isset($_POST["section_id"]) && $_POST["section_id"] !== '') {
		//Dodavanje parametara medju podatke u formi
		$formData["section_id"] = $_POST["section_id"];
		
		//Filtering 1
		$formData["section_id"] = trim($formData["section_id"]);
		
		$sectionsTest = sectionsFetchOneById($formData['section_id']); 
                
                if (empty($sectionsTest)) {
                    //nije pronadjena grupa po ID-ju
                    $formErrors["section_id"][] = "Izabrali ste neodgovarajucu vrednost za polje Section";
                }
   
	} else {//Ovaj else ide samo ako je polje obavezno
		$formErrors["section_id"][] = "Polje Section je obavezno";
	} 
    
    
    
    
    if (isset($_POST["title"]) && $_POST["title"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["title"] = $_POST["title"];

        //Filtering 1
        $formData["title"] = trim($formData["title"]);
    } else {//Ovaj else ide samo ako je polje obavezno
        $formErrors["title"][] = "Polje title je obavezno";
    } 
    
    
        
        if (isset($_POST["description"]) && $_POST["description"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["description"] = $_POST["description"];

        //Filtering 1
        $formData["description"] = trim($formData["description"]);
    } 
    
     if (isset($_POST["content"]) && $_POST["content"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["content"] = $_POST["content"];

        //Filtering 1
        $formData["content"] = trim($formData["content"]);
    } 
    
//     if (isset($_POST["created_at"]) && $_POST["created_at"] !== '') {
//        //Dodavanje parametara medju podatke u formi
//        $formData["created_at"] = $_POST["created_at"];
//
//        //Filtering 1
//        $formData["created_at"] = trim($formData["created_at"]);
//    }
//        
        
    
 /*     * ********* filtriranje i validacija polja *************** */


    //Ukoliko nema gresaka 
    if (empty($formErrors)) {
        
        $newsUpdated = newsUpdateOneById($oneNews['id'], $formData);

        header('location: /crud-news-list.php');
        die();
//Uradi akciju koju je korisnik trazio
    }
}

$sectionList = sectionsGetList();

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-news-edit.php';
require_once __DIR__ . '/views/layout/footer.php';
