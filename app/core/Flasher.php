<?php

class Flasher{

    static public function setFlash(bool $status, string $message)
    {
        $_SESSION['flash'] = [
            'status' => $status,
            'message' =>$message
        ]; 
    }

    static public function flasher(){
        if (isset($_SESSION['flash'])) {
            $status = ($_SESSION['flash']['status'] == true )?'Success':'Vailed';
            $alert = ($_SESSION['flash']['status'] == true )?'success':'danger';
            $message = $_SESSION['flash']['message'];
            echo '<div class="alert alert-' . $alert . ' alert-dismissible fade show" role="alert">
                        <strong>'. $status .'</strong> '. $message.
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            
            unset($_SESSION['flash']);
        }
    }
}