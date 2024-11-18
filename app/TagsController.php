<?php 
	session_start();

	if (isset($_POST['action'])) {
		
		switch ($_POST['action']) {
			
			case 'new_tag':
                $name = $_POST['name'];
                $description = $_POST['description'];
                $slug = $_POST['slug'];
                $tagController = new TagController();
                $tagController->newTag($name, $description, $slug);
            break;

			case 'update_tag':
                $name = $_POST['name'];
                $description = $_POST['description'];
                $slug = $_POST['slug'];
                $id = $_POST['id'];
                $tagController = new TagController();
                $tagController->updateTag($name, $description, $slug, $id);
            break;
            
			case 'delete_tag':
                $id = $_POST['id'];
                $tagController = new TagController();
                $tagController->deleteTag($id);
            break;
            
		}
	}

	class TagController {
        public function newTag($name, $description, $slug) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags',
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
                'slug' => $slug
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['user_data']->token
            ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            echo $response;
        }

        public function getAllTags(){
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags',
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

        public function getTag($id){
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags/'.$id,
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

        public function updateTag($name, $description, $slug, $id){
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 
                'name='.$name.
                '&description='.$description.
                '&slug='.$slug.
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

        public function deleteTag($id){
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags/'.$id,
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


