<?php
/**
 * Created by PhpStorm.
 * User: alallk
 * Date: 23/07/17
 * Time: 23:07
 */

namespace APIWhatsapp\Model;

/**
 * @Entity
 * @Table(name="person")
 */
class Person
{
    /**
     *	@var integer @Id
     *      @Column(name="id", type="integer")
     *      @GeneratedValue(strategy="AUTO")
     */
    private $id;

    private $name;
    private $chats;
}