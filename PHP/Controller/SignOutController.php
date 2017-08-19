<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 8/19/2017
 * Time: 4:01 PM
 */

namespace Conntroller;


class SignOutController
{

    private $container;

    /**
     * @return mixed
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param mixed $container
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }

    public function SignOut(){
        session_abort();
        session_destroy();
        header('Location:../../../index.html');
        die('Here');
    }
}