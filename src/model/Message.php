<?php
/**
 * Created by PhpStorm.
 * User: alallk
 * Date: 24/07/17
 * Time: 10:34
 */

namespace APIWhatsapp\Model;


class Message
{
    /**
     *	@var integer @Id
     *      @Column(name="id", type="integer")
     *      @GeneratedValue(strategy="AUTO")
     */
    private $id;
    private $text;
    private $createdDate;

    private $author;
}