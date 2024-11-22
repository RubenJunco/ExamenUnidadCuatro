<?php 
include 'config.php';
session_start();

if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = 123;
}

if (isset($_POST['action'])) {
    $productsController = new ProductsController();

    switch ($_POST['action']) {
        case 'crear_producto':
            $name_var = $_POST['name'];
            $slug_var = $_POST['slug'];
            $description_var = $_POST['description'];
            $features_var = $_POST['features'];
            $brand_id = $_POST['brand_id'];
            $cover = $_FILES['cover']['tmp_name'];
            $categories = $_POST['categories'];
            $tags = $_POST['tags'];

            $productsController->create(
                $name_var, $slug_var, $description_var, $features_var,
                $brand_id, $cover, $categories, $tags
            );
            break;

        case 'update_producto':
            $product_id = $_POST['id'];
            $name_var = $_POST['name'];
            $slug_var = $_POST['slug'];
            $description_var = $_POST['description'];
            $features_var = $_POST['features'];
            $brand_id = $_POST['brand_id'];
            $categories = $_POST['categories'];
            $tags = $_POST['tags'];
            $cover = !empty($_FILES['cover']['tmp_name']) ? $_FILES['cover']['tmp_name'] : null;

            $productsController->update(
                $name_var, $slug_var, $description_var, $features_var,
                $brand_id, $product_id, $cover, $categories, $tags
            );
            break;

        case 'delete_producto':
            $product_id = $_POST['product_id'];
            $productsController->delete($product_id);
            break;
    }
}

class ProductsController {

    public function get() {
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

        return isset($response->code) && $response->code > 0 ? $response->data : [];
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

    public function create($name_var, $slug_var, $description_var, $features_var, $brand_id, $cover, $categories, $tags) {
        $data = [
            'name' => $name_var,
            'slug' => $slug_var,
            'description' => $description_var,
            'features' => $features_var,
            'brand_id' => $brand_id,
            'cover' => curl_file_create($cover, mime_content_type($cover), basename($cover))
        ];

        foreach ($categories as $i => $category) {
            $data["categories[$i]"] = intval($category);
        }

        foreach ($tags as $j => $tag) {
            $data["tags[$j]"] = intval($tag);
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

        header("Location: " . BASE_PATH . ($response->code > 0 ? "products" : "home?error=1"));
    }

    public function update($name_var, $slug_var, $description_var, $features_var, $brand_id, $product_id, $cover, $categories, $tags) {
        $data = [
            'name' => $name_var,
            'slug' => $slug_var,
            'description' => $description_var,
            'features' => $features_var,
            'brand_id' => $brand_id,
            'id' => $product_id,
        ];

        if ($cover) {
            $data['cover'] = curl_file_create($cover, mime_content_type($cover), basename($cover));
        }

        foreach ($categories as $i => $category) {
            $data["categories[$i]"] = intval($category);
        }

        foreach ($tags as $j => $tag) {
            $data["tags[$j]"] = intval($tag);
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
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => http_build_query($data),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer '.$_SESSION['user_data']->token
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);

        header("Location: " . BASE_PATH . ($response->code > 0 ? "products" : "home?error=1"));
    }

    public function delete($product_id) {
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

        header("Location: " . BASE_PATH . ($response->code > 0 ? "home" : "home?error=1"));
    }
}
?>