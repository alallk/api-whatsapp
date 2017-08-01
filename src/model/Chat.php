<?php
/**
 * Created by PhpStorm.
 * User: alallk
 * Date: 24/07/17
 * Time: 10:29
 */

namespace APIWhatsapp\Model;


class Chat
{
    /**
     *	@var integer @Id
     *      @Column(name="id", type="integer")
     *      @GeneratedValue(strategy="AUTO")
     */
    private $id;
    private $owner;
    private $members;
    private $title;

}