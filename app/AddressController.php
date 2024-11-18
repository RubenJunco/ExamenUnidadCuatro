<?php 
	session_start();

	if (isset($_POST['action'])) {
		
		switch ($_POST['action']) {
			
			case 'new_address':
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $street_number = $_POST['street_number'];
                $postal_code = $_POST['postal_code'];
                $city = $_POST['city'];
                $province = $_POST['province'];
                $phone_number = $_POST['phone_number'];
                $is_billing = $_POST['is_billing'];
                $client_id = $_POST['client_id'];
                $addressController = new AddressController();
                $addressController->newAddress($first_name, $last_name, $street_number, $postal_code, $city, $province, $phone_number, $is_billing, $client_id);
			break;
			
            case 'update_address':
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $street_number = $_POST['street_number'];
                $postal_code = $_POST['postal_code'];
                $city = $_POST['city'];
                $province = $_POST['province'];
                $phone_number = $_POST['phone_number'];
                $is_billing = $_POST['is_billing'];
                $client_id = $_POST['client_id'];
                $id = $_POST['id'];
                $addressController = new AddressController();
                $addressController->updateAddress($first_name, $last_name, $street_number, $postal_code, $city, $province, $phone_number, $is_billing, $client_id, $id);
            break;

            case 'delete_address':
                $id = $_POST['id'];
                $addressController = new AddressController();
                $addressController->deleteAddress($id);
            break;
		}
	}

	class AddressController {

        public function newAddress($first_name, $last_name, $street_number, $postal_code, $city, $province, $phone_number, $is_billing, $client_id) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'street_and_use_number' => $street_number,
                'postal_code' => $postal_code,
                'city' => $city,
                'province' => $province,
                'phone_number' => $phone_number,
                'is_billing_address' => $is_billing,
                'client_id' => $client_id
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '. $_SESSION['user_data']->token
            ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            echo $response;
            $response = json_decode($response, true);
            return $response;
        }

        public function getAddressByClient($id) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses/'. $id,
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

        public function updateAddress($first_name, $last_name, $street_number, $postal_code, $city, $province, $phone_number, $is_billing, $client_id, $id) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 
                'first_name='.$first_name.
                '&last_name='.$last_name.
                '&street_and_use_number='.$street_number.
                '&postal_code='.$postal_code.
                '&city='.$city.
                '&province= '.$province.
                '&phone_number='.$phone_number.
                '&is_billing_address='.$is_billing.
                '&client_id='.$client_id.
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

        public function deleteAddress($id) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses/'. $id,
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
	}
?>


