<?php

namespace Model\User;

class UserPushModel
{
    private $count = 0;

    /**
     * The function `userPush` is responsible for updating or creating a user in the database based on
     * the provided data.
     *
     * @param \Controllers\Fonction\Factory fact The parameter `` is an instance of the `Factory`
     * class from the `Controllers\Fonction` namespace.
     */
    public function userPush(\Controllers\Fonction\Factory $fact)
    {
        $openSession = $fact->instance(
            'Controllers\Fonction',
            'Session'
        );

        if ($this->img !== null) {
            unlink($openSession->img);
            $openSession->img = $this->img;
        }

        if ($this->deleteImg == 1) {
            unlink($openSession->img);
            $openSession->img = null;
        }

        if ($this->deletePdf == 1) {
            unlink($openSession->pdf);
            $openSession->pdf = null;
        }

        if ($this->pdf !== null) {
            unlink($openSession->pdf);
            $openSession->pdf = $this->pdf;
        }

        if ($_SESSION['idUs'] === null) {
            $statement = $fact->instance(
                '\Controllers\Repository',
                'UserRepo'
            )->userCreate($_SESSION['idCo']);
            $statement->execute(
                [
                    $this->firstname,
                    $this->lastname,
                    $this->img,
                    $this->citation,
                    $_SESSION['idCo'],
                    $this->count,
                    $this->pdf,
                    $this->socialFacebook,
                    $this->socialInstagram,
                    $this->socialX,
                    $this->socialLinkedin,
                    $this->socialGithub,
                    $this->socialGitlab,
                    ]
            );
        } else {
            $statement = $fact->instance('\Controllers\Repository', 'UserRepo')->userUpdate($_SESSION['idCo']);
            $statement->execute(
                [
                    $this->firstname,
                    $this->lastname,
                     $this->img = $openSession->img,
                     $this->citation, $this->pdf = $openSession->pdf,
                     $this->socialFacebook,
                     $this->socialInstagram,
                     $this->socialX,
                     $this->socialLinkedin,
                     $this->socialGithub,
                     $this->socialGitlab,
                    ]
            );
        }
        self::openSession($fact, $openSession);
    }

    /**
     * The openSession function retrieves user information from a repository and assigns it to the
     * openSession object.
     *
     * @param fact The parameter `` is an instance of a class that is responsible for creating
     * objects. It is used to create an instance of the `Repository` class.
     * @param openSession The  parameter is an object that will be populated with data from
     * the  array. It is used to store information about the user session, such as the user's
     * first name, last name, citation, ID, admin status, and PDF file.
     */
    public function openSession(\Controllers\Fonction\Factory $fact, object $openSession)
    {

        $list = $fact->instance(
            '\Controllers\Repository',
            'UserRepo'
        )->userRead($_SESSION['idCo']);

        $openSession->firstname = $list['firstname'];
        $openSession->lastname = $list['lastname'];
        $openSession->citation = $list['citation'];
        $openSession->idUs = $list['id'];
        $openSession->admin = $list['globalAdmin'];
        $openSession->pdf = $list['cv'];
        $openSession->facebook = $list['social_network_facebook'];
        $openSession->instagram = $list['social_network_instagram'];
        $openSession->x = $list['social_network_x'];
        $openSession->linkedin = $list['social_network_linkedin'];
        $openSession->github = $list['social_network_github'];
        $openSession->gitlab = $list['social_network_gitlab'];
    }

    /**
     * The above function is a magic method in PHP that allows you to dynamically set a property value.
     *
     * @param name The name of the property being set.
     * @param value The value parameter is the value that you want to assign to the property.
     */
    public function __set(string $name, mixed $value)
    {
        $this->$name = $value;
    }

    /**
     * The above function is a magic method in PHP that allows accessing object properties using the
     * __get() method.
     *
     * @param name The parameter "name" is the name of the property that is being accessed.
     *
     * @return The value of the property with the name specified by the parameter  is being
     * returned.
     */
    public function __get(string $name)
    {
        return $this->$name;
    }

    /**
     * The __isset function in PHP checks if a property exists in an object.
     *
     * @param name The parameter "name" is the name of the property that is being checked for
     * existence.
     *
     * @return the result of the `isset()` function called on the property `` of the current
     * object.
     */
    public function __isset(string $name)
    {
        return isset($this->$name);
    }
}
