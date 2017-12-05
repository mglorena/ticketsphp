<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use PHPUnit\Framework\TestCase;

class DepartamentosTest extends TestCase
{
    public function testFillObjectValid()
    {
        $dep = new Departamentos();
        $dep->nombre = "Taller de Informatica";
        $this->assertClassHasAttribute('nombre', Departamentos::class);
    }
}
