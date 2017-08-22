<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 8/19/2017
 * Time: 10:57 AM
 */

namespace Model;


class Settings_page_model
{

    private $id;
    private $name;
    private $last_name;
    private $username;
    private $e_mail;
    private $profile_image_path;
    private $work_place;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getEMail()
    {
        return $this->e_mail;
    }

    /**
     * @param mixed $e_mail
     */
    public function setEMail($e_mail)
    {
        $this->e_mail = $e_mail;
    }

    /**
     * @return mixed
     */
    public function getProfileImagePath()
    {
        return $this->profile_image_path;
    }

    /**
     * @param mixed $profile_image_path
     */
    public function setProfileImagePath($profile_image_path)
    {
        $this->profile_image_path = $profile_image_path;
    }

    /**
     * @return mixed
     */
    public function getWorkPlace()
    {
        return $this->work_place;
    }

    /**
     * @param mixed $work_place
     */
    public function setWorkPlace($work_place)
    {
        $this->work_place = $work_place;
    }


    public function AccountSettings()
    {

        require '../config/db.config.php';

        $conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $getData = 'SELECT `id`,`name`,`last_name`,`username`,`e_mail`,`profile_image_path`,`work_place` FROM `user_data` WHERE `id` = "' . $this->getId() . '"';

        $data = $conn->query($getData);

        $row = $data->fetch_assoc();

        $this->setId($row['id']);
        $this->setName($row['name']);
        $this->setLastName($row['last_name']);
        $this->setUsername($row['username']);
        $this->setEMail($row['e_mail']);
        $this->setProfileImagePath($row['profile_image_path']);
        $this->setWorkPlace($row['work_place']);
    }

}