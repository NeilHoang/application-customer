<?php


namespace App\Http\Services;


interface CustomerServiceInterface
{
    function getAll();
    function create($request);
    function delete($id);
    function update($id,$request);
}
