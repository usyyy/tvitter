<?php
require_once __DIR__ . '/../sql-helper.inc.php';
require_once 'registration.inc.php';
/**
 * Class for ajax registration methods
 *
 * @param object db_connection
 *
 * @method check_password_match [used in the ajax password check]
 *
 */
class AjaxUserLogin extends AjaxUserRegistration
{

    private $db_connection;

    function __construct()
    {
        $sql_helper = new SqlHelper();
        $this->db_connection = $sql_helper->get_db_connection();
    }

    /**
    * @method check_password_match
    *
    * goals of the function include...
    *   1. Recieve login form username and password
    *   2. Use the posted username to retrieve its associated password in the database
    *   3. Compare the form password with the database password
    *
    * @param string [username]
    * @param string [password]
    *
    * @return string (indicate whether both passwords match)
    */
    public static function check_password_match($username, $password)
    {
        global $db_connection;

        $login_form_password = $password;

        $statement = $db_connection->prepare("SELECT `password` FROM `users` WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $statement->store_result();
        $statement->bind_result($password_returned);

        while ($statement->fetch()) {
            $db_password = $password_returned;
        }

        $statement->close();

        if (password_verify($login_form_password, $db_password)) {
            return "match";
        }
        else {
            return "non match";
        }

    }

}
