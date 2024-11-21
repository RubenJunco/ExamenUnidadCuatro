<?php 
	if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

	if (isset($_POST['action'])) {
		switch ($_POST['action']) {
			
			case 'new_order':
                $folio = $_POST['folio'];
                $total = $_POST['total'];
                $is_paid = $_POST['is_paid'];
                $client_id = $_POST['client_id'];
                $address_id = $_POST['address_id'];
                $order_status_id = $_POST['order_status_id'];
                $payment_type_id = $_POST['payment_type_id'];
                $coupon_id = $_POST['coupon_id'];
                $presentations0_id = $_POST['presentations0_id'];
                $presentations0_quantity = $_POST['presentations0_quantity'];
                $presentations1_id = $_POST['presentations1_id'];
                $presentations1_quantity = $_POST['presentations1_quantity'];
                $ordersController = new OrdersController();
                $ordersController->newOrder($folio, $total, $is_paid, $client_id, $address_id, $order_status_id, $payment_type_id, $coupon_id, $presentations0_id, $presentations0_quantity, $presentations1_id, $presentations1_quantity);
			break;

            case 'update_order':
                $id = $_POST['id'];
                $order_status_id = $_POST['order_status_id'];
                $ordersController = new OrdersController();
                $ordersController->updateOrder($id, $order_status_id);
            break;

            case 'delete_order':
                $id = $_POST['id'];
                $ordersController = new OrdersController();
                $ordersController->deleteOrder($id, $order_status_id);
            break;
		}
	}

	class OrdersController {

        public function getAll() {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
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
        
        public function getOrdersBtwnDates($beginDate, $endDate){
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/'.$beginDate.'/'.$endDate,
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
        
        public function getOrder($id){
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/details/'.$id,
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

        public function newOrder($folio, $total, $is_paid, $client_id, $address_id, $order_status_id, $payment_type_id, $coupon_id, $presentations0_id, $presentations0_quantity, $presentations1_id, $presentations1_quantity){
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'folio' => $folio,
                'total' => $total,
                'is_paid' => $is_paid,
                'client_id' => $client_id,
                'address_id' => $address_id,
                'order_status_id' => $order_status_id,
                'payment_type_id' => $payment_type_id,
                'coupon_id' => $coupon_id,
                'presentations[0][id]' => $presentations0_id,
                'presentations[0][quantity]' => $presentations0_quantity,
                'presentations[1][id]' => $presentations1_id,
                'presentations[1][quantity]' => $presentations1_quantity
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['user_data']->token
            ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            echo $response;
        }

        public function updateOrder($id, $order_status_id){
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 
            'id='.$id.
            '&order_status_id='.$order_status_id,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer ' . $_SESSION['user_data']->token
            ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            echo $response;
        }

        public function deleteOrder($id){
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/'.$id,
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