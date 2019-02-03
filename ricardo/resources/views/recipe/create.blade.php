@extends('recipe.master')

@section('content')
    <div class="container my-3">
        <h1>Formulário de Cadastro :: Receitas</h1>

        <form action="<?= url("/receitas/store"); ?>" method="post">

            <?= csrf_field(); ?>

            <div class="form-group">
                <label for="title">Título da Rceita</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="ingredient">Ingredientes</label>
                <select name="ingredient[]" id="ingredient" multiple class="custom-select form-control" required>
                    <option value="Farinha">Farinha</option>
                    <option value="Leite">Leite</option>
                    <option value="Ovo">Ovo</option>
                    <option value="Chocolate">Chocolate</option>
                    <option value="Chocolate Branco">Chocolate Branco</option>
                    <option value="Açucar">Açucar</option>
                    <option value="Manteiga">Manteiga</option>
                    <option value="Margarina">Margarina</option>
                    <option value="Morango">Morango</option>
                </select>
            </div>

            <div class="form-group">
                <label for="method_of_preparation">Modo de Preparo</label>
                <textarea name="method_of_preparation" id=method_of_preparation" cols="30" rows="3" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar Receita</button>
        </form>
    </div>
@endsection
