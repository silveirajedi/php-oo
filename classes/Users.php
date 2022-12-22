<?php

namespace classes;

/**
 *
 */

class Users
{
    public $firstName;
    public $lastName;
    private $email;
    private $document;

    private $error;

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    public function setUser($firstName, $lastName, $email)
    {
        $this->setFirstname($firstName);
        $this->setLastname($lastName);

        if (!$this->setEmail($email)) {
            $this->error = "O e-mail {$this->getEmail()} não é válido!";
            return false;
        }

        return true;
    }

    /**
     * @return mixed
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param mixed $document
     */
    private function setDocument($document): void
    {
        $this->document = $document;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname): void
    {
        $this->firstName = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname): void
    {
        $this->lastName = filter_var($lastname, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }


    /**
     * @param $email
     * @return bool
     */
    public function setEmail($email): bool
    {
        $this->email = $email;
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        } else {
            return false;
        }
    }


}