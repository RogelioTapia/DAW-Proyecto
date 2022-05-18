<?php

session_start(); 
	if (isset($_SESSION['user_id']) &&
		isset($_SESSION['user_email'])){

		include "../db_conn.php";

		if(isset($_POST['id_products'])){

				$id=$_POST['id_products'];

				if (empty($id)){
					$em= "The ID is required";
					header("Location: ../add-book.php?error=$em");
					exit;
				}else{
					$sql="INSERT INTO books (id_products) VALUES (?)";
					$stmt= $conn->prepare($sql);
					$res= $stmt->execute([$id]);

					if($res){
							$sm= "Successfully inserted";
							header("Location: ../add-book.php?success=$sm");
					exit;
					}else{
						$em= "Unknown Error!!";
					header("Location: ../add-book.php?error=$em");
					exit;
					}
				}
		}else{
			header("Location: ../admin.php");
			exit;
		}
	}


		if (isset($_POST['book_title'])       &&
        isset($_POST['description']) &&
        isset($_POST['photo'])      &&
        isset($_POST['price'])    &&
        isset($_POST['quantity'])      &&
        isset($_POST['manufacturer'])    &&
        isset($_POST['origin'])){

		$title       = $_POST['book_title'];
		$description = $_POST['description'];
		$photo      = $_POST['photo'];
		$price  = $_POST['price'];
		$quantity  = $_POST['quantity'];
		$manufacturer  = $_POST['manufacturer'];
		$origin  = $_POST['origin'];

		# making URL data format
		$user_input = 'title='.$title.'&description='.$description.'&photo='.$photo.'&price='.$price. '&quantity='.$quantity. '&manufacturer='.$manufacturer. '&origin='.$origin;

		#simple form Validation

        $text = "book title";
        $location = "../add-book.php";
        $ms = "error";
		is_empty($title, $text, $location, $ms, $user_input);

		$text = "description";
        $location = "../add-book.php";
        $ms = "error";
		is_empty($description, $text, $location, $ms, $user_input);

		$text = "photo";
        $location = "../add-book.php";
        $ms = "error";
		is_empty($author, $text, $location, $ms, $user_input);

		$text = "price";
        $location = "../add-book.php";
        $ms = "error";
		is_empty($category, $text, $location, $ms, $user_input);
        

        $text = "quantity";
        $location = "../add-book.php";
        $ms = "error";
		is_empty($category, $text, $location, $ms, $user_input);
        

        $text = "manufacturer";
        $location = "../add-book.php";
        $ms = "error";
		is_empty($category, $text, $location, $ms, $user_input);
        

        $text = "origin";
        $location = "../add-book.php";
        $ms = "error";
		is_empty($category, $text, $location, $ms, $user_input);
        

         $sql  = "INSERT INTO books (title,
                                            description,
                                            photo,
                                            price,
                                            quantity,
                                            manufacturer,
                                            origin)
                         VALUES (?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
			    $res  = $stmt->execute([$title, $description, $photo, $price, $quantity, $manufacturer, $origin]);





}else{
  header("Location: login.php");
  exit;
} 