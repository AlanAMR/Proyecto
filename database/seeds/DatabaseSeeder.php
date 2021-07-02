<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
        	Este script se ejecuta despues de inicializar la base de datos
			Se utiliza para "seedear" (rellenar) la base de datos con la informacion que le indiquemos.
		*/

        // 1) Usuarios
        $this->call('UsersSeeder');

        // 2) Estados de las responsivas
        $this->call('ResponsivasEstadosSeeder');

        // 3)  Usuarios que entregan Responsivas
        $this->call('UsuariosEntregasResponsivasSeeder');

        // 4) Usuarios que autorizan responsivas 
        $this->call('UsuariosAutorizanResponsivasSeeder');
        
        // 5) Tipos de insumos
        $this->call('TiposInsumosSeeder');
        
        // 6) Roles de Usuarios
        $this->call('RolesSeeder');

        // 7) Responsivas-Movimientos 
        $this->call('CelularesSeeder');

        // 8) Responsivas-Movimientos 
        $this->call('ChipsSeeder');

        // 9) Responsivas-Movimientos 
        $this->call('LaptopsSeeder');
        
        // 10) Responsivas de ejemplo
        $this->call('ResponsivasSeeder');
        
        // 11) Sugerencias para el modulo de celulares
        $this->call('SugerenciasCelularesSeeder');

        // 12) Sugerencias para el modulo de laptops 
        $this->call('SugerenciasLaptopsSeeder');

        // 13) colores
        $this->call('ColoresSeeder');

        // 14) Info Usuarios
        $this->call('InfoUsuariosSeeder');

        // 15) Templates
        $this->call('TemplateSeeder');

        // 16) Permisos
        $this->call('PermisosSeeder');

        // 17) Empresas
        $this->call('EmpresasSeeder');

        // 18) Articulos
        $this->call('ArticulosSeeder');

        // 19) Areas
        $this->call('AreasSeeder');

        // 19) Areas
        $this->call('HorariosSeeder');

    }
}
