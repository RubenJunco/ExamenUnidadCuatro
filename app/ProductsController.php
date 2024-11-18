<?php 
	include 'config.php';
	session_start();

	if (!isset($_SESSION['token'])) {
		$_SESSION['token'] = 123;
	}

	if (isset($_POST['action'])) {
		
		switch ($_POST['action']) {
			
			case 'crear_producto':	
				$name_var =  $_POST['name'];
				$slug_var = $_POST['slug'];
				$description_var = $_POST['description'];
				$features_var = $_POST['features'];
				$brand_id = $_POST['brand_id'];
				$cover = $_FILES['cover']["tmp_name"];
				$categories = $_POST['categories'];
				$tags = $_POST['tags'];
				$productsController = new ProductsController();
				$productsController->create($name_var,$slug_var,$description_var,$features_var, $brand_id, $cover, $categories, $tags);
			break; 

			case 'update_producto':
				$name_var =  $_POST['name'];
				$slug_var = $_POST['slug'];
				$description_var = $_POST['description'];
				$features_var = $_POST['features'];
				$brand_id = $_POST['brand_id'];
				$product_id = $_POST['product_id'];
				$categories = $_POST['categories'];
				$tags = $_POST['tags'];
				$productsController = new ProductsController();
				$productsController->update($name_var,$slug_var,$description_var,$features_var, $brand_id, $product_id, $cover, $categories, $tags);
			break; 

			case 'delete_producto':
				$product_id = $_POST['product_id'];
				$productsController = new ProductsController();
				$productsController->delete($product_id);
			break; 
		}
	}

class ProductsController {
	
	public function get(){
		$curl = curl_init();  
			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
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
		$response = json_decode($response);

		if (isset($response->code) && $response->code > 0) {	
			return $response->data;
		}else{
			return [];
		}
	}

	public function getBySlug($slug){
		$curl = curl_init();  
			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/'.$slug,
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
		$response = json_decode($response);

		if (isset($response->code) && $response->code > 0) {
			return $response->data;
		}else{
			return [];
		}
	}

	public function create($name_var,$slug_var,$description_var,$features_var, $brand_id, $cover, $categories, $tags){
		$data = array(
			'name' => $name_var,
			'slug' => $slug_var,
			'description' => $description_var,
			'features' => $features_var,
			'brand_id' => $brand_id,
			'cover'=> $cover,
		);

		$i = 0;
		foreach ($categories as $category) {
			$data['categories['.$i.']'] = intval($category);
			$i++;
		}

		$j = 0;
		foreach ($tags as $tag) {
			$data['tags['.$j.']'] = intval($tag);
			$j++;
		}

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => $data,
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer '.$_SESSION['user_data']->token
			),
		));
		$response = curl_exec($curl); 
		curl_close($curl);  
		$response = json_decode($response);

		if (isset($response->code) && $response->code > 0) {
			header("Location: " . BASE_PATH . "products");
		}else{
			header("Location: " . BASE_PATH . "home?error=1");
		}
	}

	public function update($name_var,$slug_var,$description_var,$features_var, $brand_id, $product_id, $categories, $tags){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'PUT',
			CURLOPT_POSTFIELDS => 
				'name='.$name_var.
				'&slug='.$slug_var.
				'&description='.$description_var.
				'&features='.$features_var.
				'&brand_id='.$brand_id.
				'&id='.$product_id.
				'&categories%5B0%5D='.$categories.
				'&tags%5B0%5D='.$tags,
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/x-www-form-urlencoded',
				'Authorization: Bearer '.$_SESSION['user_data']->token
			),
		));

		$response = curl_exec($curl); 
		curl_close($curl);  
		$response = json_decode($response);

		if (isset($response->code) && $response->code > 0) {
			header("Location: " . BASE_PATH . "home");
		}else{
			header("Location: " . BASE_PATH . "home?error=1");
		}
	}

	public function delete($product_id){
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/'.$product_id,
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
		$response = json_decode($response);

		if (isset($response->code) && $response->code > 0) {
			header("Location: " . BASE_PATH . "home");
		}else{
			header("Location: " . BASE_PATH . "home?error=1");
		}
	}
}

?>