<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Serializable;
use Symfony\Component\Security\Core\User\UserInterface;



/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, Serializable {

    
    /**
     * @ORM\Id
     * @ORM\Column(name="user_name", type="string", length=255)
     */
    private $userName;

    /**
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(name="role", type="string", length=255)
     */
    private $role;

    /**
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    function __construct() {
        
    }

    function getUserName() {
        return $this->userName;
    }

    function getPassword() {
        return $this->password;
    }

    function getIsActive() {
        return $this->isActive;
    }

    function getRole() {
        return $this->role;
    }

    function getEmail() {
        return $this->email;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    public function setPassword(string $password): void {
        $this->password = password_hash($password, PASSWORD_BCRYPT, array("cost" => 13));
    }

    function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

    function setRole($role) {
        $this->role = $role;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    public function toString() {
        return $this->getUserName;
    }

    public function getSalt() {
        return null;
    }

    public function eraseCredentials() {
        
    }

    public function getRoles() {
        return array($this->role);
    }

    public function serialize() {
        return serialize(array(
            $this->userName,
            $this->password
        ));
    }


   

    public function unserialize($serialized) {
        list (
                $this->userName,
                $this->password
                ) = unserialize($serialized);
    }

}
