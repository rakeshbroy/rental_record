<?php


	// perform all actions necessary to log in an landlord
	function log_in_landlord($landlord) {
		// regenerating the ID protects the landlord from session fixation.
		session_regenerate_id();
		$_SESSION['landlord_id'] = $landlord['id'];
		$_SESSION['last_login'] = time();
		$_SESSION['username'] = $landlord['username'];
		return true;
 	}


 	// Perform all actions necessary to log out an landlord
 	function log_out_landlord() {
 		unset($_SESSION['landlord_id']);
 		unset($_SESSION['last_login']);
 		unset($_SESSION['username']);
 		// session_distroy(); // optional: distroy the whole landlord
 		return true;
 	}

 	// is_logged_in() contains all the logic for determining if a
	// request should be considered a "logged in" request or not.
	// It is the core of require_login() but it can also be called
	// on its own in other contexts (e.g. display one link if an landlord
	// is logged in and display another link if they are not)
	function is_logged_in() {
	  // Having a landlord_id in the session serves a dual-purpose:
	  // - Its presence indicates the landlord is logged in.
	  // - Its value tells which landlord for looking up their record.
	  return isset($_SESSION['landlord_id']);
	}

	// Call require_login() at the top of any page which needs to
	// require a valid login before granting acccess to the page.
	function require_login() {
	  if(!is_logged_in()) {
	    redirect_to(url_for('/landlord/login.php'));
	  } else {
	    // Do nothing, let the rest of the page proceed
	  }
}

?>