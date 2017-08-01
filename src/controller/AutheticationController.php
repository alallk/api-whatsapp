<?php
spl_autoload_register();
use \APIWhatsapp\Model\User;
use \Jacwright\RestServer\RestException;

require_once __DIR__ . '/../model/User.php';
require_once __DIR__ . '/../service/AuthService.php';


class Authentication
{
    /**
     * Returns a JSON string object to the browser when hitting the root of the domain
     *
     * @url POST /validate
     */
    public function validate($data = null)
    {
        if($data->jwt && $data->jwt != null){
            $auth = new APIWhatsapp\Service\AuthService();
            return $auth->decodeToken($data->jwt);
        }
        throw new RestException(401, "Empty password not allowed");
    }

    /**
     * Logs in a user with the given username and password POSTed. Though true
     * REST doesn't believe in sessions, it is often desirable for an AJAX server.
     *
     * objec json base
     *   {
     *      "login":"",
     *      "password":""
     *   }
     * @url POST /
     */
    public function login($data = null)
    {
        $user = null;
        if($data != null){
            //echo $data->username;
            $user = new User(0,"alallk@msn.com",'123456', null);
        }
        if($user != null){
            $auth = new APIWhatsapp\Service\AuthService();
            return $auth->getToken($user);
        }
            throw new RestException(401, "User not found with the credentials.");
    }

    /**
     * Gets the user by id or current user
     *
     * @url GET /users/$id
     * @url GET /users/current
     */
    public function getUser($id = null)
    {
        // if ($id) {
        //     $user = User::load($id); // possible user loading method
        // } else {
        //     $user = $_SESSION['user'];
        // }

        return array("id" => $id, "name" => null); // serializes object into JSON
    }

    /**
     * Saves a user to the database
     *
     * @url POST /users
     * @url PUT /users/$id
     */
    public function saveUser($id = null, $data)
    {
        // ... validate $data properties such as $data->username, $data->firstName, etc.
        // $data->id = $id;
        // $user = User::saveUser($data); // saving the user to the database
        $user = array("id" => $id, "name" => null);
        return $user; // returning the updated or newly created user object
    }

    /**
     * Get Charts
     *
     * @url GET /charts
     * @url GET /charts/$id
     * @url GET /charts/$id/$date
     * @url GET /charts/$id/$date/$interval/
     * @url GET /charts/$id/$date/$interval/$interval_months
     */
    public function getCharts($id=null, $date=null, $interval = 30, $interval_months = 12)
    {
        echo "$id, $date, $interval, $interval_months";
    }

    /**
     * Throws an error
     *
     * @url GET /error
     */
    public function throwError() {
        throw new RestException(401, "Empty password not allowed");
    }

}