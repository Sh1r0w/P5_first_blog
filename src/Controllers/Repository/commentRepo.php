<?php

namespace Controllers\Repository;

use Controllers\Interface\commentInterface;

/* The commentRepo class is a PHP class that implements the commentInterface and provides methods for
creating, reading, deleting, updating, and counting comments in a database. */
class commentRepo implements commentInterface
{
    private $dbase;

    public function __construct()
    {
        $this->dbase = \Controllers\Fonction\db::connectDatabase();
    }

    public function create($content, $idpost)
    {
        $statement = $this->dbase->prepare(
            "INSERT INTO ae_comment(content, addDate, id_user, id_post) VALUES (?, NOW(),?,?)"
        );
        $statement->execute([$content, $_SESSION['idUs'], $idpost]);
    }

    public function read($id)
    {
        $statement = $this->dbase->query(
            "SELECT * FROM ae_comment WHERE id_post = $id AND valide = 1 ORDER BY addDate DESC"
        );
        return $statement;
    }

    public function delete($id)
    {
        $statement = $this->dbase->prepare(
            "DELETE FROM ae_comment WHERE id = $id"
        );
        $statement->execute();
    }

    public function update()
    {
        
    }

    public function count()
    {
        $statement = $this->dbase->query(
            "SELECT id_post, COUNT(*) FROM ae_comment WHERE valide = 1 GROUP BY id_post"
        );

        return $statement;
    }
}