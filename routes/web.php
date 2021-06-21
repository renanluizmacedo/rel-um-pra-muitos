<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\Categoria;
use App\Models\Produto;

Route::get('/categorias', function () {
    $cat = Categoria::all();

    if(count($cat) == 0){
        echo "<h4>Você não possui nenhuma categoria cadastrada</h4>";
    }
    else{
        foreach($cat as $c){
            echo "<p>$c->id  - $c->nome</p>";
        }
    }
});

Route::get('/produtos', function () {
    $prod = Produto::all();

    if(count($prod) == 0){
        echo "<h4>Você não possui nenhum produto cadastrado</h4>";
    }
    else{
        echo "<table>";
        echo "<thead>
                <tr>
                    <td>Nome</td>
                    <td>Estoque</td>
                    <td>Preco</td>
                    <td>Categoria</td>
                </tr>
            </thead>";
        foreach($prod as $p){
            echo "<tr>";
            echo "<td>".$p->id ."</td>";
            echo "<td>".$p->nome ."</td>";
            echo "<td>".$p->preco ."</td>";
            echo "<td>".$p->estoque ."</td>";
            echo "<td>".$p->categoria->nome ."</td>";
            echo "</tr>";

        }
    }
});
