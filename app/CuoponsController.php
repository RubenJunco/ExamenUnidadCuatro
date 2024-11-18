<?php 
	session_start();

	if (isset($_POST['action'])) {
		switch ($_POST['action']) {
			case 'new_cuopon':
                $name = $_POST['name'];
                $code = $_POST['code'];
                $percentage_discount = $_POST['percentage_discount'];
                $min_amount_required = $_POST['min_amount_required'];
                $min_product_required = $_POST['min_product_required'];
                $start_date = $_POST['start_date'];
                $end_date = $_POST['end_date'];
                $max_uses = $_POST['max_uses'];
                $count_uses = $_POST['count_uses'];
                $valid_only_first_purchase = $_POST['valid_only_first_purchase'];
                $status = $_POST['status'];
                $cuoponsController = new CuoponsController();
                $cuoponsController->newCuopon($name, $code, $percentage_discount, $min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, $count_uses, $valid_only_first_purchase, $status);
			break;
			
            case 'update_cuopon':
                $name = $_POST['name'];
                $code = $_POST['code'];
                $percentage_discount = $_POST['percentage_discount'];
                $min_amount_required = $_POST['min_amount_required'];
                $min_product_required = $_POST['min_product_required'];
                $start_date = $_POST['start_date'];
                $end_date = $_POST['end_date'];
                $max_uses = $_POST['max_uses'];
                $count_uses = $_POST['count_uses'];
                $valid_only_first_purchase = $_POST['valid_only_first_purchase'];
                $status = $_POST['status'];
                $id = $_POST['id'];
                $cuoponsController = new CuoponsController();
                $cuoponsController->updateCuopon($name, $code, $percentage_discount, $min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, $count_uses, $valid_only_first_purchase, $status, $id);
			break;

            case 'delete_cuopon':
                $id = $_POST['id'];
                $cuoponsController = new CuoponsController();
                $cuoponsController->deleteCuopon($id);
            break;
		}
	}

	class CuoponsController {

        public function newCuopon($name, $code, $percentage_discount, $min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, $count_uses, $valid_only_first_purchase, $status) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'name' => $name,
                'code' => $code,
                'percentage_discount' => $percentage_discount,
                'min_amount_required' => $min_amount_required,
                'min_product_required' => $min_product_required,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'max_uses' => $max_uses,
                'count_uses' => $count_uses,
                'valid_only_first_purchase' => $valid_only_first_purchase,
                'status' => $status
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['user_data']->token
            ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            echo $response;
        }

        public function updateCuopon ($name, $code, $percentage_discount, $min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, $count_uses, $valid_only_first_purchase, $status, $id){
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 
                'name='.$name.
                '&code='.$code.
                '&percentage_discount='.$percentage_discount.
                '&min_amount_required='.$min_amount_required.
                '&min_product_required='.$min_product_required.
                '&start_date='.$start_date.
                '&end_date='.$end_date.
                '&max_uses='.$max_uses.
                '&count_uses='.$count_uses.
                '&valid_only_first_purchase='.$valid_only_first_purchase.
                '&status='.$status.
                '&id='.$id,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer ' . $_SESSION['user_data']->token
            ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            echo $response;
        }

        public function deleteCuopon($id){
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons/'. $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['user_data']->token
            ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            echo $response;
        }

        public function getAll(){
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['user_data']->token
            ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response, true);
            return $response;
        }

        public function getCuopon($id){
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons/'.$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['user_data']->token
            ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response, true);
            return $response;
        }
	}
?>