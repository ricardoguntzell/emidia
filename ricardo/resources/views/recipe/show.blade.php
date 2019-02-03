@extends('recipe.master')

@section('content')

    <div class="container my-3">
        <h1>Detalhes da Receita:</h1>

        <?php if (!empty($recipe)):?>
            <?php foreach ($recipe as $rep):?>
        <h2>Título: <i class="text-capitalize"><?= $rep->title; ?></i></h2>

                <p class="text-capitalize"><b>Igredientes:</b> <?= str_replace(";", " / ", $rep->ingredient); ?></p>

                <p class="text-capitalize"><b>Modo de Preparo:</b> <?= $rep->method_of_preparation; ?></p>

                <p><b>Data de Criação:</b> <?= date("d/m/Y H:i", strtotime($rep->creation_date)); ?></p>

                <p><b>Última atualização:</b> <?= date("d/m/Y H:i", strtotime($rep->modification_date)); ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

@endsection
