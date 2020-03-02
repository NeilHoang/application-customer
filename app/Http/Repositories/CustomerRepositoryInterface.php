<?php


namespace App\Http\Repositories;


interface CustomerRepositoryInterface
{
    function index();
    function save($obj);
    function delete($obj);
}
