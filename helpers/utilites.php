<?php

use App\Repositories\DBRepository;
function table( $table ) {
    $db_repo = new DBRepository( $table );
    return $db_repo->table();
}

function db_repo($table)
{
    return new DBRepository( $table );
}