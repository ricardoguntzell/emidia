@extends('recipe.master')

@section('content')

    <div class="container my-3">
        <h1>Listagem de Receitas</h1>

        <?php if (!empty($recipes)): ?>
        <table class="table table-striped table-hover">
            <thead class="bg-primary text-white">
            <tr>
                <th>Título</th>
                <th>Ingredientes</th>
                <th>Modo de Preparo</th>
                <th>Atualizado por último</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($recipes as $recipe) : ?>
            <?php
            $linkReadMode = url("/receitas/" . $recipe->name_url);
            $linkEditItem = url("/receitas/editar/" . $recipe->name_url);
            $linkRemoveItem = url("/receitas/remover/" . $recipe->name_url);

            $ingred = explode(";", $recipe->ingredient);
            $modificationDate = (!is_null($recipe->modification_date)) ? $recipe->modification_date : $recipe->creation_date;
            ?>
            <tr>
                <td><?= $recipe->title; ?></td>
                <td>
                    <ul class="list-group">
                    <?php foreach ($ingred as $ing):  ?>
                        <li class="list-inline"><i><?= $ing; ?></i></li>
                    <?php endforeach; ?>
                    </ul>
                </td>
                <td><?= $recipe->method_of_preparation; ?></td>
                <td><?= date("d/m/Y H:i", strtotime($modificationDate)); ?></td>
                <td>
                    <a href="<?= $linkReadMode; ?>">Ver mais</a> |
                    <a href="<?= $linkEditItem; ?>">Editar</a> |
                    <a href="<?= $linkRemoveItem; ?>">Remover</a></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>

    </div>

@endsection
