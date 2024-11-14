<?php 
	include 'config.php';
	session_start();

	if (!isset($_SESSION['token'])) {
		$_SESSION['token'] = 123;
	}

	if (isset($_POST['action'])) {
		
		switch ($_POST['action']) {
			
			case 'get_presentations':
                $id = $_POST['id'];
                $presentationsController = new PresentationsController();
                $presentationsController->getPresentations($id);
            break;

            case 'get_specific_presentation':
                $id = $_POST['id'];
                $presentationsController = new PresentationsController();
                $presentationsController->getSpecificPresentation($id);
            break;

            case 'new_presentation':
                $description = $_POST['description'];
                $code = $_POST['code'];
                $weight_in_grams = $_POST['weight_in_grams'];
                $status = $_POST['status'];
                $product_id = $_POST['product_id'];
                $amount = $_POST['amount'];
                $presentationsController = new PresentationsController();                
                $presentationsController->newPresentation($description, $code, $weight_in_grams, $status, $cover, $stock, $stock_min, $stock_max, $product_id, $amount);
            break;

            case 'update_presentation':
                $id = $_POST['id'];
                $description = $_POST['description'];
                $code = $_POST['code'];
                $weight_in_grams = $_POST['weight_in_grams'];
                $status = $_POST['status'];
                $product_id = $_POST['product_id'];
                $amount = $_POST['amount'];
                $presentationsController = new PresentationsController();                
                $presentationsController->updatePresentation($id, $description, $code, $weight_in_grams, $status, $stock, $stock_min, $stock_max, $product_id, $amount);
            break;

            case 'update_price_presentation':
                $id = $_POST['id'];
                $price = $_POST['price'];
                $presentationsController = new PresentationsController();
                $presentationsController->updatePricePresentation($id, $price);
            break;

            case 'delete_presentation':
                $id = $_POST['id'];
                $presentationsController = new PresentationsController();
                $presentationsController->deletePresentation($id);
            break;
		}
	}

class PresentationsController {
	
	public function getPresentations($id){
		$curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/product/'.$id,
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
        echo $response;
	}

    public function getSpecificPresentation($id){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/'.$id,
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
        echo $response;
    }

    public function newPresentation($description, $code, $weight_in_grams, $status, $cover, $stock, $stock_min, $stock_max, $product_id, $amount){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'description' => $description,
            'code' => $code,
            'weight_in_grams' => $weight_in_grams,
            'status' => $status,
            'cover'=> $cover,
            'stock' => $stock,
            'stock_min' => $stock_min,
            'stock_max' => $stock_max,
            'product_id' => $product_id,
            'amount' => $amount
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['user_data']->token
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }

    public function updatePresentation($id, $description, $code, $weight_in_grams, $status, $stock, $stock_min, $stock_max, $product_id, $amount){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => 
            'description='.$description.
            '&code='.$code.
            '&weight_in_grams='.$weight_in_grams.
            '&status='.$status.
            '&stock='.$stock.
            '&stock_min='.$stock_min.
            '&stock_max='.$stock_max.
            '&product_id='.$product_id.
            '&id='.$id.
            '&amount='.$amount,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Bearer '.$_SESSION['user_data']->token
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }

    public function updatePricePresentation($id, $price){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/set_new_price',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => 
            'id='.$id.
            '&amount='.$price,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Bearer '.$_SESSION['user_data']->token
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }

    public function deletePresentation($id){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/'.$id,
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