<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Categorías adaptadas a la temática de asados
        $category = Category::factory()->create([
            'name' => 'Cortes Tradicionales',
        ]);

        $category2 = Category::factory()->create([
            'name' => 'Preparaciones Regionales',
        ]);

        Post::factory()
        ->hasAttached($category)
        ->create([
            'title' => 'Chivo al Asador',
            'content' => '<div>
<strong>Ingredientes</strong><br>
- 1 chivo entero limpio<br>
- Sal gruesa<br>
- Ajo y perejil picado<br>
- Agua y vino blanco (para rociar)<br><br>

<strong>Preparación</strong><br>
1. Preparar el fuego con leña o carbón y dejar que se formen brasas.<br>
2. Ensartar el chivo en una cruz o estaca, abrirlo bien y atarlo con alambre.<br>
3. Condimentar con sal y ajo/perejil.<br>
4. Cocinar a fuego lento durante 4 a 5 horas, girando ocasionalmente.<br>
5. Rociar con una mezcla de agua y vino para que no se seque.<br>
6. Servir caliente con papas o ensalada criolla.
</div>',
            'thumbnail' => 'https://www.cucinare.tv/wp-content/uploads/2022/04/asador.jpg',
            'user_id' => 1,
            'created_at' => '2025-05-30',
            'updated_at' => '2025-05-30 ',
            'is_published' => true
        ]);

        Post::factory()
        ->hasAttached($category2)
        ->create([
            'title' => 'Empanadas Salteñas a la Parrilla',
            'content' => '<div>
<strong>Ingredientes</strong><br>
- 500g carne picada a cuchillo<br>
- 2 cebollas<br>
- 1 papa hervida<br>
- Pimentón, ají molido y comino<br>
- Tapas de empanadas criollas<br><br>

<strong>Preparación</strong><br>
1. Rehogar cebolla en grasa o aceite.<br>
2. Agregar carne, especias y papas cortadas en cubos.<br>
3. Dejar enfriar y armar empanadas.<br>
4. Sellar bien los bordes con repulgue.<br>
5. Cocinar a la parrilla sobre plancha o chapa hasta dorar.<br>
6. Servir calientes con limón.
</div>',
            'thumbnail' => 'empanadas_saltenas.png',
            'user_id' => 1,
            'created_at' => '2025-05-30',
            'updated_at' => '2025-05-30',
            'is_published' => true
        ]);
    }
}
