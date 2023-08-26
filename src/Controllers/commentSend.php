<?php

namespace Controllers;

class commentSend{

    public function commentSend($content, $idpost) {
        $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
            "INSERT INTO ae_comment(content, addDate, id_user, id_post) VALUES (?, NOW(),?,?)"
        );
        $statement->execute([$content, $_SESSION['idUs'], $idpost]);
        header('location: /postsRead?action=postsRead&id=' . $idpost);

    }
}