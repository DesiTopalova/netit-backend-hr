<?php


namespace App\Service\EmploymentService;


use App\Entity\Employment;

interface EmploymentServiceInterface
{
public function create(Employment $employment):bool;
public function edit(Employment $employment):bool;
public function delete(Employment $employment):bool;
}