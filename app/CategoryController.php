<?php 
	include 'config.php';
	if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

	if (isset($_POST['action'])) {
		
		switch ($_POST['action']) {

			case 'create_category':
				$name_var =  $_POST['name'];
				$slug_var = $_POST['slug'];
				$description_var = $_POST['description'];
				$categoryController = new CategoryController();
				$categoryController->newCategory($name, $description, $slug, $category_id);
			break;

			case 'update_category':
				$id = $_POST['id'];
				$name_var =  $_POST['name'];
				$slug_var = $_POST['slug'];
				$description_var = $_POST['description'];
				$categoryController = new CategoryController();
				$categoryController->updateCategory($id, $name, $description, $slug, $category_id);
			break;

			case 'delete_category':
				$id = $_POST['id'];
				$categoryController = new CategoryController();
				$categoryController->deleteCategory($id);
			break;
		}
	}

	class CategoryController {

		public function getAll(){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer '.$_SESSION['user_data']->token
			),
			));
			$response = curl_exec($curl);
			$response = json_decode($response, true);
			curl_close($curl);
			return $response;
		}

		public function getCategory($id){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories/'.$id,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer '.$_SESSION['user_data']->token
			),
			));
			$response = curl_exec($curl);
			curl_close($curl);
			$response = json_decode($response, true);
			return $response;
		}

		public function newCategory($name, $description, $slug, $category_id){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array(
				'name' => $name,
				'description' => $description,
				'slug' => $slug,
				'category_id' => $category_id
			),
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer '.$_SESSION['user_data']->token
			),
			));
			$response = curl_exec($curl);
			curl_close($curl);
			echo $response;
		}

		public function updateCategory($id, $name, $description, $slug, $category_id){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'PUT',
			CURLOPT_POSTFIELDS => 
				'id='.$id.
				'&name='.$name.
				'&description='.$description.
				'&slug='.$slug.
				'&category_id='.$category_id,
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/x-www-form-urlencoded',
				'Authorization: Bearer '.$_SESSION['user_data']->token
			),
			));
			$response = curl_exec($curl);
			curl_close($curl);
			echo $response;
		}

		function deleteCategory($id){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories/'.$id,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'DELETE',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer '.$_SESSION['user_data']->token
			),
			));
			$response = curl_exec($curl);
			curl_close($curl);
			echo $response;
		}
	}

?>