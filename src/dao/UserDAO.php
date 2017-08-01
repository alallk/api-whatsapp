<?php
/**
 * Created by PhpStorm.
 * User: alallk
 * Date: 24/07/17
 * Time: 12:12
 */

namespace APIWhatsapp\DAO;


class UserDAO extends AbstractDAO
{
    public function __construct() {
        parent::__construct('src\model\User');
    }
}