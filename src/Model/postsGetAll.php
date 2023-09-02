<?php

namespace Model;

/*class postsGetAll
{
    public $result;
    public function postsGetAll()
    {
       

        $statement = \Controllers\Fonction\db::connectDatabase()->query(
            "SELECT * FROM ae_post a LEFT JOIN ae_user e ON a.id_user = e.id ORDER BY a.addDate DESC"
        );
        return $statement->fetch();
    }
}*/