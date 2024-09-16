<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
class UpdateCodigoRandom extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'codigo:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualizar el código random de los usuarios cada 2 minutos';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Obtener todos los usuarios
        $usuarios = User::all();

        // Iterar sobre cada usuario para generar y actualizar el código random
        foreach ($usuarios as $usuario) {
            // Generar código de 6 dígitos
            $codigoRandom = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

            // Actualizar el código random del usuario
            $usuario->codigo_random = $codigoRandom;
            $usuario->save(); // Guardar el cambio en la base de datos
        }

        // Mensaje en consola indicando que se actualizaron los códigos
        $this->info('Códigos random actualizados correctamente');

        return Command::SUCCESS;
    }
}
