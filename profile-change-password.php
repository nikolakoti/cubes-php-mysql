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

$currentActivePassword = $user['password'];


$formData = array (
    
    'password' => '',
    'confirm_password' => '',
);


$formErrors = array();


if (isset($_POST["task"]) && $_POST["task"] == "insert") {
	
	/*********** filtriranje i validacija polja ****************/
	
        if (isset($_POST["password"]) && $_POST["password"] !== '') {
		//Dodavanje parametara medju podatke u formi
		$formData["password"] = $_POST["password"];
		
		//Filtering 1
		if (mb_strlen($formData["password"]) < 5) {
                    $formErrors["password"][] = 'Password mora imati vise od 5 karaktera';
                }
		
                if (md5($formData['password']) == $currentActivePassword ) {
                    
                     $formErrors["password"][] = 'Uneli ste aktivnu sifru na Vasem profilu';
                }
                
                $allUsers = usersFetchAll(); 
                
                foreach ($allUsers as $oneUser) {
                    
                    if (md5($formData['password']) == $oneUser['password'] ) {
                        
                        $formErrors['password'][] = 'Password je zauzet';
                    }
                    
                }
		
	} else {
		$formErrors["password"][] = "Polje password je obavezno";
	}
        
        
        if (isset($_POST["confirm_password"]) && $_POST["confirm_password"] !== '') {
		
		$formData["confirm_password"] = $_POST["confirm_password"];
		
		if ($formData["confirm_password"] != $formData["password"]) {
                    
                    $formErrors["confirm_password"][] = 'Password-i se ne podudaraju';
                } else if ($formData["confirm_password"] == $formData["password"]) {
                    
                    $formData["password"] = md5($_POST["password"]);
                }
		
	} else {
		$formErrors["confirm_password"][] = "Polje confirm_password je obavezno";
	}
    
	/*********** filtriranje i validacija polja ****************/
	
	
	//Ukoliko nema gresaka 
	if (empty($formErrors)) {
            unset($formData["confirm_password"]); 
            
            usersUpdateOneById($user['id'], $formData); 
            
            $_SESSION['system_message'] = 'Uspesno ste promenili sifru';
                
            header('Location:/profile-preview.php');
            die();
	}
}

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_profile-change-password.php';
require_once __DIR__ . '/views/layout/footer.php';
