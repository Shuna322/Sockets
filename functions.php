<?php
class func
{
	public static function checkLoginState($dbh)
	{
		if (!isset($_SESSION))
		{
//			session_start();
			debug_to_console("Auth");
		}
		if (isset($_COOKIE['userid']) && isset($_COOKIE['token']) && isset($_COOKIE['serial']))
		{
			$query = "SELECT * FROM sessions WHERE session_userid = :userid AND session_token = :token AND session_serial = :serial;";

			$userid = $_COOKIE['userid'];
			$token = $_COOKIE['token'];
			$serial = $_COOKIE['serial'];

			$stmt = $dbh->prepare($query);
			$stmt->execute(array(':userid' => $userid,
								 ':token' => $token,
								 ':serial' => $serial));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($row['session_userid'] > 0)
			{
				if (
					$row['session_userid'] == $_COOKIE['userid'] &&
					$row['session_token']  == $_COOKIE['token']  &&
					$row['session_serial'] == $_COOKIE['serial']
					)
				{
					if (
					$row['session_userid'] == $_SESSION['userid'] &&
					$row['session_token']  == $_SESSION['token']  &&
					$row['session_serial'] == $_SESSION['serial']
						)
					{
						return true;
					}
					else
					{
						func::createSession($_COOKIE['email'], $_COOKIE['userid'], $_COOKIE['token'], $_COOKIE['serial']);
						return true;
					}
				}
			}
		}
	}
	public static function createRecord($dbh, $user_email, $user_id)
	{
		$query = "INSERT INTO sessions (session_userid, session_token, session_serial) VALUES (:user_id, :token, :serial);";

		$dbh->prepare("DELETE FROM sessions WHERE session_userid= :session_userid;")->execute(array(':session_userid' => $user_id));

		$token = func::createString(30);
		$serial = func::createString(30);

		func::createCookie($user_email, $user_id, $token, $serial);
		func::createSession($user_email, $user_id,  $token, $serial);

		$stmt = $dbh->prepare($query);
		$stmt->execute(array(':user_id' => $user_id,
							 ':token' => $token,
							 ':serial' => $serial));
	}
	public static function createCookie($user_email, $user_id, $token, $serial)
	{
		setcookie('userid', $user_id, time() + (86400) * 30, "/");
		setcookie('email', $user_email, time() + (86400) * 30, "/");
		setcookie('token', $token, time() + (86400) * 30, "/");
		setcookie('serial', $serial, time() + (86400) * 30, "/");
	}
	public static function deleteCookie()
	{
		setcookie('userid', '', time() - 1, "/");
		setcookie('email', '', time()  - 1, "/");
		setcookie('token', '', time()  - 1, "/");
		setcookie('serial', '', time()  - 1, "/");
	}
	public static function createSession($user_email, $user_id, $token, $serial)
	{
		if (!isset($_SESSION))
		{
			session_start();
		}
		$_SESSION['userid'] = $user_id;
		$_SESSION['token'] = $token;
		$_SESSION['serial'] = $serial;
		$_SESSION['email'] = $user_email;
	}
	public static function createString($len)
	{
		$string = "1qay2wsx3edc4rfv5tgb6zhn7ujm8ik9olpAQWSXEDCVFRTGBNHYZUJMKILOP";

		return substr(str_shuffle($string), 0, 30);
	}
}
function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}
 ?>
