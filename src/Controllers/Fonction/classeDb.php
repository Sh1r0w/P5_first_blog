<?php

namespace Controllers\Fonction;

class Db
{
    private static $selfConnect;
    private $database;
    public $dbConnect;
/**
     * This PHP function creates or connects to a MySQL database and creates tables if they don't
     * exist.
     *
     * @return The code is returning an instance of the PDO class, which represents a connection to a
     * database.
     */
    public function __construct()
    {
        $user = $_ENV['USER'];
        $pwd = $_ENV['PWD'];
        $db = $_ENV['DATABASE'];
        $server = $_ENV['SERVER'];
// We create or connect to the database and create tables.

        try {
            $this->database = new \PDO("mysql:host=$server;utf8", $user, $pwd);
            if ($this->database->exec("CREATE DATABASE IF NOT EXISTS $db")) {
                $this->database = new \PDO("mysql:host=$server;dbname=$db;utf8", $user, $pwd);
                $this->database->exec("CREATE TABLE IF NOT EXISTS ae_connect (
        id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        log VARCHAR(255) NOT NULL,
        pwd VARCHAR(255) NOT NULL
        )");
                $this->database->exec("CREATE TABLE IF NOT EXISTS ae_user (
            id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
            firstname VARCHAR(255) NOT NULL,
            lastname VARCHAR(255) NOT NULL,
            pictures VARCHAR(255),
            citation VARCHAR(255),
            cv VARCHAR(255),
            social_network_facebook VARCHAR(255),
            social_network_instagram VARCHAR(255),
            social_network_x VARCHAR(255),
            social_network_linkedin VARCHAR(255),
            social_network_github VARCHAR(255),
            social_network_gitlab VARCHAR(255),
            globalAdmin INT DEFAULT '0',
            id_login INT NOT NULL,
            FOREIGN KEY (id_login) REFERENCES ae_connect (id) ON DELETE CASCADE ON UPDATE NO ACTION
            )");
                $this->database->exec("CREATE TABLE IF NOT EXISTS ae_post (
                id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                title VARCHAR(255) NOT NULL,
                chapo VARCHAR(255) NOT NULL,
                content VARCHAR(500) NOT NULL,
                author VARCHAR(255) NOT NULL,
                addDate DATETIME NOT NULL,
                updDate DATETIME NOT NULL,
                id_user INT NOT NULL,
                picture VARCHAR(255),
                valide INT DEFAULT '0',
                FOREIGN KEY (id_user) REFERENCES ae_user (id) ON DELETE CASCADE ON UPDATE NO ACTION
                )");
                $this->database->exec("CREATE TABLE IF NOT EXISTS ae_comment (
                    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                    content VARCHAR(255) NOT NULL,
                    addDate DATETIME NOT NULL,
                    id_user INT NOT NULL,
                    id_post INT NOT NULL,
                    valide INT DEFAULT '0',
                    FOREIGN KEY (id_user) REFERENCES ae_user (id) ON DELETE CASCADE ON UPDATE NO ACTION,
                    FOREIGN KEY (id_post) REFERENCES ae_post (id) ON DELETE CASCADE ON UPDATE NO ACTION
                    )");
                echo "<script>alert(\"base de donnée créer\")</script>";
                header("Location: home");
            } else {
                $this->dbConnect = new \PDO("mysql:host=$server;dbname=$db;utf8", $user, $pwd);
            }
        } catch (\Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

/**
 * The function `connectDatabase` returns an instance of the `Db` class if it is not already
 * instantiated.
 *
 * @return an instance of the "Db" class.
 */
    public static function connectDatabase(): object
    {
        if (is_null(self::$selfConnect)) {
            self::$selfConnect = new Db();
        }
        return self::$selfConnect;
    }
}
