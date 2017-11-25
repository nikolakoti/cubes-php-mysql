<?php
session_start();

require_once __DIR__ . '/models/m_users.php';

if (!isUserLoggedIn()) {
	header('Location: /login.php');
	die();
}

if (isUserLoggedIn()) {
    
    $id = $_SESSION['logged_in_user']['id'];
}

$id = (int) $id;

$user = usersFetchOneById($id); 





$formData = array(
	
	'email' => $user['email'],
	'first_name' => $user['first_name'],
	'last_name' => $user['last_name'],
);

$formErrors = array();

if (isset($_POST["task"]) && $_POST["task"] == "save") {
	
	/*********** filtriranje i validacija polja ****************/
	
    if (isset($_POST["email"]) && $_POST["email"] !== '') {
		
		$formData["email"] = $_POST["email"];
		
		//Filtering 
		$formData["email"] = trim($formData["email"]);
		
		
	} 
        
        if (isset($_POST["first_name"]) && $_POST["first_name"] !== '') {
		
		$formData["first_name"] = $_POST["first_name"];
		
		//Filtering 
		$formData["first_name"] = trim($formData["first_name"]);
                
                if (mb_strlen($formData['first_name']) < 2) {
                    
                    $formErrors['first_name'][] = 'Ime ne moze biti manje od 2 karaktera';
                }
                
                if (mb_strlen($formData['first_name']) > 20) {
                    
                    $formErrors['first_name'][] = 'Ime ne moze biti vece od 20 karaktera';
                }
		
		
	} 
        
        if (isset($_POST["last_name"]) && $_POST["last_name"] !== '') {
		
		$formData["last_name"] = $_POST["last_name"];
		
		//Filtering 
		$formData["last_name"] = trim($formData["last_name"]);
                
                if (mb_strlen($formData['last_name']) < 2) {
                    
                    $formErrors['last_name'][] = 'Prezime ne moze biti manje od 2 karaktera';
                }
                
                if (mb_strlen($formData['last_name']) > 20) {
                    
                    $formErrors['last_name'][] = 'Prezime ne moze biti vece od 20 karaktera';
                }
		
		
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
    
	/*********** filtriranje i validacija polja ****************/
	
	
	//Ukoliko nema gresaka 
	if (empty($formErrors)) {

            usersUpdateOneById($user['id'], $formData);
            
            $_SESSION['system_message'] = 'Uspesno ste izmenili podatke';
            
            if(isset($_FILES['photo']) && empty($_FILES["photo"]['error'])) {
                
                //obrisemo staru sliku 
                
                $oldPhotoPath =  __DIR__ . "/uploads/users/" . $user['photo_filename'];
                
                if (is_file($oldPhotoPath)) {
                    
                    unlink($oldPhotoPath);
                }
                //premestimo novu sliku 
                
                $newPhotoFileName = $user['id'] . '_' . $photoFileName;
                
                $destinationPath = __DIR__ . '/uploads/users/' . $newPhotoFileName;
                        
                //update-ujemo photo_filename 
                
                if (move_uploaded_file($photoFileTmpPath, $destinationPath)) {
                    
                    usersUpdatePhotoFileName($user['id'], $newPhotoFileName);
                    
                   header('Location: /profile-preview.php');
                   die();
                    
                } else {
                    
                    $formErrors['photo'][] = 'Doslo je do greske prilikom upload-a';
                }
                
              
           } else {
                
                header('Location: /profile-preview.php');
                die();
                
            }
    }
}

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_profile-edit.php';
require_once __DIR__ . '/views/layout/footer.php';
