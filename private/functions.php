<?php

    function url_for($script_path = '/') {
        // add the leading '/' if not present
        // if($script_path[0] != '/') {
        //     $script_path = "/" . $script_path;
        // }
        // return WWW_ROOT . $script_path;
        if ($script_path[0] != '/') {
            return "/" . $script_path;
        }
        return $script_path;
    }

    function u($string="") {
        return urlencode($string);
    }
      
    function raw_u($string="") {
        return rawurlencode($string);
    }
      
    function h($string="") {
        return htmlspecialchars($string);
    }

    function is_post_request() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    function is_get_request() {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    function redirect_to($location) {
        header("Location: " . $location);
        exit;
    }

    function display_errors($errors=array()) {
        $output = '';
        if(!empty($errors)) {
          $output .= "<div class=\"alert alert-info alert-dismissible fade show container mt-3\">";
          $output .= "<button class=\"close\" type=\"button\" data-dismiss=\"alert\" aria-label=\"close\">";
          $output .= "<span aria-hidden=\"true\">&times;</span>";
          $output .= "</button>";
          $output .= "<h6 class=\"alert-heading\">Please fix the following errors.</h6>";
          $output .= "<ul class=\"list-unstyled\">";
          foreach($errors as $error) {
            $output .= "<li>" . h($error) . "</li>";
          }
          $output .= "</ul>";
          $output .= "</div>";
        }
        return $output;
    }

    function get_and_clear_session_message() {
        if(isset($_SESSION['message']) && $_SESSION['message'] != '') {
            $msg = $_SESSION['message'];
            unset($_SESSION['message']);
            return $msg;
        }
    }
      
    function display_session_message() {
        $msg = get_and_clear_session_message();
        if(!is_blank($msg)) {
            return '<div id="message">' . h($msg) . '</div>';
        }
    }

?>