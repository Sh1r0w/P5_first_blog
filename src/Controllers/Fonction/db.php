<?php
namespace Controllers\Fonction;

require '../src/controllers/fonction/params.php';

class db
{

    public static function database()
    {
        $user = $_ENV['USER'];
        $pwd = $_ENV['PWD'];
        $db = $_ENV['DATABASE'];
        $server = $_ENV['SERVER'];

        // We create or connect to the database and create tables.

        try {

            $database = new \PDO("mysql:host=$server;utf8", $user, $pwd);

            if ($database->exec("CREATE DATABASE IF NOT EXISTS $db")) {

                $database = new \PDO("mysql:host=$server;dbname=$db;utf8", $user, $pwd);

                $database->exec(
                    "CREATE TABLE IF NOT EXISTS ae_connect (
        id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        log VARCHAR(30) NOT NULL,
        pwd VARCHAR(30) NOT NULL
        )"
                );

                $database->exec(
                    "CREATE TABLE IF NOT EXISTS ae_user (
            id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            pictures VARCHAR(30),
            citation VARCHAR(30),
            globalAdmin INT DEFAULT '0',
            id_login INT NOT NULL,
            FOREIGN KEY (id_login) REFERENCES ae_connect (id) ON DELETE CASCADE ON UPDATE NO ACTION
            )"
                );

                $database->exec(
                    "CREATE TABLE IF NOT EXISTS ae_post (
                id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                title VARCHAR(30) NOT NULL,
                txt VARCHAR(30) NOT NULL,
                addDate DATETIME NOT NULL,
                id_user INT NOT NULL,
                FOREIGN KEY (id_user) REFERENCES ae_user (id) ON DELETE CASCADE ON UPDATE NO ACTION
                )"
                );

                $database->exec(
                    "CREATE TABLE IF NOT EXISTS ae_comment (
                    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                    txt VARCHAR(30) NOT NULL,
                    addDate DATETIME NOT NULL,
                    id_user INT NOT NULL,
                    id_post INT NOT NULL,
                    FOREIGN KEY (id_user) REFERENCES ae_user (id) ON DELETE CASCADE ON UPDATE NO ACTION,
                    FOREIGN KEY (id_post) REFERENCES ae_post (id) ON DELETE CASCADE ON UPDATE NO ACTION
                    )"
                );


                echo "<script>alert(\"base de donnée créer\")</script>";
            }else {
                //echo "<script>alert(\"base de donnée déjà créer\")</script>";
            }
        } catch (\Exception $e) {


            die('Erreur : ' . $e->getMessage());
        }
    }

    public static function connectDatabase()
    {


        $user = $_ENV['USER'];
        $pwd = $_ENV['PWD'];
        $db = $_ENV['DATABASE'];
        $server = $_ENV['SERVER'];

        try {
            $database = new \PDO("mysql:host=$server;dbname=$db;utf8", $user, $pwd);

            return $database;

            //echo 'Base déjà créer';
        } catch (\Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
