<?php

session_start();

require_once __DIR__ . '/models/m_users.php';

if (!isUserLoggedIn()) {
    header('Location: /login.php');
    die();
}


//ovde se prihvataju vrednosti polja, popisati sve kljuceve i pocetne vrednosti
$formData = array(
    'username' => '',
    'password' => '',
    'confirm_password' => '',
    'email' => '',
    'first_name' => '',
    'last_name' => ''
);

//ovde se smestaju greske koje imaju polja u formi
$formErrors = array();


//uvek se prosledjuje jedno polje koje je indikator da su podaci poslati sa forme
//odnosno da je korisnik pokrenuo neku akciju
if (isset($_POST["task"]) && $_POST["task"] == "insert") {


    if (isset($_POST["username"]) && $_POST["username"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["username"] = $_POST["username"];

        //Filtering 1
        $formData["username"] = trim($formData["username"]);


        if (strlen($formData['username']) < 5) {

            $formErrors["username"][] = "Username mora imati 5 ili vise karaktera";
        }


        $testUser = usersFetchOneByUsername($formData['username']);

        if (!empty($testUser)) {

            $formErrors["username"][] = "Username je zauzet";
        }
        //Filtering 2
        //Filtering 3
        //Filtering 4
        //...
        //Validation 2
        //Validation 3
        //Validation 4
        //...
    } else {//Ovaj else ide samo ako je polje obavezno
        $formErrors["username"][] = "Polje username je obavezno";
    }



    if (isset($_POST["password"]) && $_POST["password"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["password"] = $_POST["password"];

        if (strlen($formData['password']) < 5) {

            $formErrors["password"][] = "Password mora imati 5 ili vise karaktera";
        }
    } else {//Ovaj else ide samo ako je polje obavezno
        $formErrors["password"][] = "Polje password je obavezno";
    }


    if (isset($_POST["confirm_password"]) && $_POST["confirm_password"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["confirm_password"] = $_POST["confirm_password"];

        if ($formData['confirm_password'] != $formData['password']) {

            $formErrors["confirm_password"][] = "Passwordi nisu isti";
        }
    } else {//Ovaj else ide samo ako je polje obavezno
        $formErrors["confirm_password"][] = "Polje confirm_password je obavezno";
    }





    if (isset($_POST["email"]) && $_POST["email"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["email"] = $_POST["email"];

        //Filtering 1
        $formData["email"] = trim($formData["email"]);
    }

    if (isset($_POST["first_name"]) && $_POST["first_name"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["first_name"] = $_POST["first_name"];

        //Filtering 1
        $formData["first_name"] = trim($formData["first_name"]);
    }

    if (isset($_POST["last_name"]) && $_POST["last_name"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["last_name"] = $_POST["last_name"];

        //Filtering 1
        $formData["last_name"] = trim($formData["last_name"]);
    }
    
    
    if (isset($_FILES["photo"]) && empty($_FILES["photo"]['error'])) {
        //Filtering
        $photoFileTmpPath = $_FILES["photo"]["tmp_name"];
        $photoFileName = basename($_FILES["photo"]["name"]);
        $photoFileMime = mime_content_type($_FILES["photo"]["tmp_name"]);
        $photoFileSize = $_FILES["photo"]["size"];

        //validation
        $photoFileAllowedMime = array("image/jpeg", "image/png", "image/gif");
        $photoFileMaxSize = 5 * 1024 * 1024; // 5 MB

        if (!in_array($photoFileMime, $photoFileAllowedMime)) {
            $formErrors["photo"][] = "Fajl photo je u neispravnom formatu";
        }

        if ($photoFileSize > $photoFileMaxSize) {
            $formErrors["photo"][] = "Fajl photo prelazi maksimalnu dozvoljenu velicinu";
        }
    }

    //Ukoliko nema gresaka 
    if (empty($formErrors)) {

        unset($formData['confirm_password']); // brisemo kljuc confirm_passsword jer ne postoji ta kolona u bazi
        
        $newUserId = usersInsertOne($formData);

        $_SESSION['system_message'] = 'Uspesno ste dodali korisnika';

        $newUserPhotoFileName = $newUserId . '-' . $photoFileName;

        $destinationPath = __DIR__ . '/uploads/users/' . $newUserPhotoFileName;

        if (move_uploaded_file($photoFileTmpPath, $destinationPath)) {

            usersUpdatePhotoFileName($newUserId, $newUserPhotoFileName);

            header('Location: /crud-user-list.php');
            die();
        } else {

            $formErrors['photo'][] = 'Doslo je do greske prilikom upload-a slike';
        }
    }
}


require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-user-insert.php';
require_once __DIR__ . '/views/layout/footer.php';
