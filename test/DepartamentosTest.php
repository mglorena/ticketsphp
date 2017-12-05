<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use PHPUnit\Framework\TestCase;

class DepartamentosTest extends TestCase
{
    public function testFillNewDepto() {

        $dep = new Departamentos();
        $dep->nombre = "Taller de Informatica";
        $dep->nombreresponsable = "Ing. Lobo";
        $dep->ispublico = true;
        $dep->autorespemail = "mlgarcia@unsa.edu.ar";
        date_default_timezone_set('America/Argentina/Salta');
        $dep->created = date("d/m/Y");
        $dep->updated = date("d/m/Y");
        $dep->firma = "Dgoys";


        # check is atributo existe
        $this->assertClassHasAttribute('nombre', Departamentos::class);
        $this->assertClassHasAttribute('nombreresponsable', Departamentos::class);
        $this->assertClassHasAttribute('ispublico', Departamentos::class);
        $this->assertClassHasAttribute('autorespemail', Departamentos::class);
        $this->assertClassHasAttribute('created', Departamentos::class);
        $this->assertClassHasAttribute('updated', Departamentos::class);
        $this->assertClassHasAttribute('firma', Departamentos::class);

  
        $this->assertNotEmpty($dep->nombre);
        $this->assertNotEmpty($dep->nombreresponsable);
        $this->assertNotEmpty($dep->ispublico);
        $this->assertNotEmpty($dep->autorespemail);
        $this->assertNotEmpty($dep->firma);
        $this->assertNotEmpty($dep->created);
        $this->assertNotEmpty($dep->updated);
        
        #check si los atributos tienen valor
        $this->assertEquals("Taller de Informatica", $dep->nombre);
        $this->assertEquals("Ing. Lobo", $dep->nombreresponsable);
        $this->assertEquals(true, $dep->ispublico);
        $this->assertEquals("mlgarcia@unsa.edu.ar", $dep->autorespemail);
        date_default_timezone_set('America/Argentina/Salta');
        $this->assertEquals(date("d/m/Y"), $dep->created);
        $this->assertEquals(date("d/m/Y"), $dep->updated);
        $this->assertEquals("Dgoys", $dep->firma);
    }

    public function testGetById() {

        $depId = 3;
        $dep = new Departamentos();
        $dep->GetById($depId);
        $this->assertNotNull($dep);
        $this->assertNotEmpty($dep->nombre);
        $this->assertNotEmpty($dep->nombreresponsable);
        $this->assertNotEmpty($dep->updated);
        $this->assertNotEmpty($dep->created);
        $this->assertNotEmpty($dep->firma);
        $this->assertNotEmpty($dep->ispublico);
        $this->assertNotEmpty($dep->autorespemail);
        $this->assertNotEmpty($dep->depid);
                
    }

    public function testInsertDepartamento() {
        $dep = new Departamentos();
        $dep->nombre = "Taller de Herrería";
        $dep->nombreresponsable = "Ing. Lobo";
        $dep->ispublico = true;
        $dep->autorespemail = "mlgarcia@unsa.edu.ar";
        date_default_timezone_set('America/Argentina/Salta');
        $dep->created = date("d/m/Y");
        $dep->updated = date("d/m/Y");
        $dep->firma = "Dgoys";
        $depId = $dep->SaveNew();

        $depnew = $dep->GetById($depId);
        $this->assertNotNull($depnew);
        $this->assertNotEmpty($depnew->nombre);
        $this->assertNotEmpty($depnew->nombreresponsable);
        $this->assertNotEmpty($dep->updated);
        $this->assertNotEmpty($dep->created);
        $this->assertNotEmpty($dep->firma);
        $this->assertNotEmpty($dep->ispublico);
        $this->assertNotEmpty($dep->autorespemail);
        $this->assertNotEmpty($dep->depid);
        
        #check valores recien insertados
        $this->assertEquals("Taller de Herrería", $depnew->nombre);
        $this->assertEquals("Ing. Lobo", $depnew->nombreresponsable);
    }

    public function testUpdateDepartamento() {
        $depId = 10;
        $dep = new Departamentos();
        $dep->GetById($depId);
        $dep->nombreresponsable = "Antonio Sarapura";
        $dep->ispublico = false;
        $dep->autorespemail = "sarapuraa@unsa.edu.ar";
        $dep->firma = "Deposito Patrimonio - Dgoys";
        $dep->Update();
        $this->assertNotNull($dep);
        $this->assertNotEmpty($dep->nombreresponsable);
        $this->assertNotEmpty($dep->nombre);
        $this->assertNotEmpty($dep->updated);
        $this->assertNotEmpty($dep->created);
        $this->assertNotEmpty($dep->firma);
        $this->assertTrue($dep->ispublico);
        $this->assertNotEmpty($dep->autorespemail);
        $this->assertNotEmpty($dep->depid);
        $this->assertEquals("Taller de Informatica", $dep->nombre);
        $this->assertEquals("Antonio Sarapura", $dep->nombreresponsable);
    }
 public function testGetAllDepartamentos() {
        $dep = new Departamentos();
        $list = $dep->GetAll();
        $this->assertNotNull($list);
        $this->assertGreaterThan(2,sizeof($list));
        $dep = $list[0];
        $this->assertEquals("Automotores", $dep->nombre);
        
    }
}
