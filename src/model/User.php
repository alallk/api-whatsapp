<?php
namespace APIWhatsapp\Model;

require_once __DIR__ . '/Entity.php';

/**
 * @Entity
 * @Table(name="user")
 */
class User extends Entity {

    /**
     *	@var integer @Id
     *      @Column(name="id", type="integer")
     *      @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @var string @Column(type="string", length=255, unique=true, nullable=false)
     */
    private $login;
    /**
     *
     * @var string @Column(type="string", length=255)
     */
    private $password;
    /**
     * @OneToOne(targetEntity="Person")
     * @JoinColumn(name="person_id", referencedColumnName="id")
     */
    private $person;

    /**
     * User constructor.
     * @param int $id
     * @param string $login
     * @param string $password
     * @param $person
     */
    public function __construct($id, $login, $password, $person)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->person = $person;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param mixed $person
     */
    public function setPerson($person)
    {
        $this->person = $person;
    }

    public function toArray(){
        if($this->person){
            return [
                'id'=>$this->id,
                'login'=>$this->login,
                'password'=>$this->password,
                'person'=>$this->person.$this->toArray()
            ];
        }
        return [
            'id'=>$this->id,
            'login'=>$this->login,
            'password'=>$this->password
        ];
    }



}