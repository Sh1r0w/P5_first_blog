<?php

namespace Model;

class countComment
{
    public function countComment()
    {
        $statement = \Controllers\Fonction\db::connectDatabase()->query(
            "SELECT id_post, COUNT(*) FROM ae_comment GROUP BY id_post"
        );
        // var_dump($statement->fetchAll());
        return $statement->fetchAll(\PDO::FETCH_NUM);
    }
}