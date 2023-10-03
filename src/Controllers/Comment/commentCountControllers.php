<?php

namespace Controllers\Comment;

class CommentCountControllers
{
/**
 * The function initializes a variable called "count" with the result of a count query on a CommentRepo
 * instance.
 *
 * @param \Controllers\Fonction\Factory fact The parameter `` is an instance of the class
 * `Controllers\Fonction\Factory`.
 *
 * @return The code is returning the result of the `count()` method called on an instance of the
 * `CommentRepo` class. The `count()` method is fetching all the rows from the database using
 * `fetchAll()` method with `PDO::FETCH_NUM` fetch style. The result is being assigned to the ``
 * property of the current object.
 */
    public $count;
    public function __construct(\Controllers\Fonction\Factory $fact)
    {
        return $this->count = $fact->instance(
            'Controllers\Repository',
            'CommentRepo'
        )->count()->fetchAll(\PDO::FETCH_NUM);
    }
}
