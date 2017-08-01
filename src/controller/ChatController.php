<?php
use \Jacwright\RestServer\RestException;

class ChatController
{

    /**
     * Returns a JSON string object to the browser when hitting the root of the domain
     *
     * @url GET /
     */
    public function getBase()
    {
        return "Hello World";
    }

}