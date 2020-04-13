<?php 

// landlord
function find_landlord_by_id($id) {
    global $db;

    $sql = "select * from landlord ";
    $sql .= "where id='" . db_escape($db, $id) . "' ";
    $sql .= "limit 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $landlord = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $landlord;
}


function find_landlord_by_username($username) {
    global $db;

    $sql = "select * from landlord ";
	$sql .= "where username='" . db_escape($db, $username) . "' ";
	$sql .= "LIMIT 1";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	$landlord = mysqli_fetch_assoc($result); // find first
	mysqli_free_result($result); 
	return $landlord; // returns an assoc. array
}

function validate_landlord($landlord) {

    $errors = [];
    
    // first_name
    if(is_blank($landlord['first_name'])) {
        $errors[] ="First name can't be blank.";
    } elseif (!has_length($landlord['first_name'], ['min' => 2, 'max' => 225])) {
        $errors[] = "First name must be between 2 and 225 characters.";
    }

    // last_name
    if(is_blank($landlord['last_name'])) {
        $errors[] = "Last name can't be blank";
    } elseif(!has_length($landlord['last_name'], ['min' => 2, 'max' => 225])) {
        $errors[] = "Last name must be between 2 and 225 characters";
    }

    // email
    if(is_blank($landlord['email'])) {
        $errors[] = "Email can't be blank";
    } elseif(!has_length($landlord['email'], ['min' => 2, 'max' => 225])) {
        $errors[] = "Email must be between 2 and 225 characters";
    } elseif(!has_valid_email_format($landlord['email'])) {
        $errors[] = "Email must be in valid format";
    }

    // username
    if(is_blank($landlord['username'])) {
        $errors[] = "Usename can't be blank";
    } elseif(!has_length($landlord['username'], ['min' => 2, 'max' => 225])) {
        $errors = "Username must be between 2 and 225 characters";
    } elseif(!has_unique_username($landlord['username'])) {
        $errors[] = "Username not allowed. Try another.";
    }

    // password
    if(is_blank($landlord['password'])) {
        $errors[] = "Password can't be blank.";
    } elseif(!has_length($landlord['password'], array('min' => 12))) {
        $errors[] = "Password must contain 12 or more characters.";
    } elseif (!preg_match('/[A-Z]/', $landlord['password'])) {
        $errors[] = "Password must contain at least 1 uppercase letter.";
    } elseif(!preg_match('/[a-z]/', $landlord['password'])) {
        $errors[] = "Password must contain at least 1 smallcase letter.";
    } elseif(!preg_match('/[0-9]/', $landlord['password'])) {
        $errors[] = "Password must contain at least 1 number.";
    } elseif(!preg_match('/[^A-Za-z0-9\s]/', $landlord['password'])) {
        $errors[] = "Password must contain at least 1 symbol.";
    }

    // confirm_password
    if(is_blank($landlord['confirm_password'])) {
        $errors[] = "Confirm password cannot be blnak.";
    } elseif($landlord['password'] !== $landlord['confirm_password']) {
        $errors[] = "Password and confirm password must match.";
    }

    return $errors;
}


function insert_landlord($landlord) {
    global $db;
    
    $errors = validate_landlord($landlord);

    if(!empty($errors)) {
        return $errors;
    }

    $hashed_password = password_hash($landlord['password'], PASSWORD_BCRYPT);

    $sql = "insert into landlord ";
    $sql .= "(first_name, last_name, email, username, hashed_password) ";
    $sql .= "values (";
    $sql .= "'" . db_escape($db, $landlord['first_name']) . "', ";
    $sql .= "'" . db_escape($db, $landlord['last_name']) . "', ";
    $sql .= "'" . db_escape($db, $landlord['email']) . "', ";
    $sql .= "'" . db_escape($db, $landlord['username']) . "', ";
    $sql .= "'" . $hashed_password . "'";
    $sql .= ")";

    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}


?>