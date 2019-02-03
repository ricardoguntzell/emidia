@extends('recipe.master')

@section('content')
    <div class="container my-3">
        <h1>Formulário de Edição :: Receitas</h1>

        <form action="<?= url("/receitas/update", ['id' => $recipe->id]); ?>" method="post">

            <?php $ingredient = explode(";", $recipe->ingredient); ?>
            <?= csrf_field(); ?>
            <?= method_field('PUT'); ?>

            <div class="form-group">
                <label for="title">Título da Rceita</label>
                <input type="text" name="title" id="title" class="form-control" required value="<?= $recipe->title; ?>">
            </div>

            <div class="form-group">
                <label for="ingredient">Ingredientes</label>
                <select name="ingredient[]" id="ingredient" multiple class="custom-select form-control" required>
                    <option value="Farinha" <?= (is_array($ingredient) && in_array("Farinha", $ingredient)) ? " selected" : ""; ?> >
                        Farinha
                    </option>
                    <option value="Leite" <?= (is_array($ingredient) && in_array("Farinha", $ingredient)) ? " selected" : ""; ?>>Leite</option>
                    <option value="Ovo" <?= (is_array($ingredient) && in_array("Ovo", $ingredient)) ? " selected" : ""; ?>>Ovo</option>
                    <option value="Chocolate" <?= (is_array($ingredient) && in_array("Chocolate", $ingredient)) ? " selected" : ""; ?>>Chocolate</option>
                    <option value="Chocolate Branco" <?= (is_array($ingredient) && in_array("Chocolate Branco", $ingredient)) ? " selected" : ""; ?>>Chocolate Branco</option>
                    <option value="Açucar" <?= (is_array($ingredient) && in_array("Açucar", $ingredient)) ? " selected" : ""; ?>>Açucar</option>
                    <option value="Manteiga" <?= (is_array($ingredient) && in_array("Manteiga", $ingredient)) ? " selected" : ""; ?>>Manteiga</option>
                    <option value="Margarina" <?= (is_array($ingredient) && in_array("Margarina", $ingredient)) ? " selected" : ""; ?>>Margarina</option>
                    <option value="Morango" <?= (is_array($ingredient) && in_array("Morango", $ingredient)) ? " selected" : ""; ?>>Morango</option>
                </select>
            </div>

            <div class="form-group">
                <label for="method_of_preparation">Modo de Preparo</label>
                <textarea name="method_of_preparation" id=method_of_preparation" cols="30" rows="3" class="form-control"
                          required><?= $recipe->method_of_preparation; ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar Receita</button>
        </form>
    </div>
@endsection
