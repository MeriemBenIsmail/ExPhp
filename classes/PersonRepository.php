<?php
include_once 'autoload.php';

class PersonRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('person');
    }

}
?>