<?php

namespace Controllers;

/* The commentSend class is used for sending comments. */
class commentSend{

    public function commentSend($content, $idpost) {
        
        $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
            "INSERT INTO ae_comment(content, addDate, id_user, id_post) VALUES (?, NOW(),?,?)"
        );
        $statement->execute([$content, $_SESSION['idUs'], $idpost]);
        header('location: /postsRead?id=' . $idpost);

    }
}