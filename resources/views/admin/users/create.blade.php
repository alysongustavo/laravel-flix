@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <h3>Novo Usuário</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <?php $icon = Icon::create('fa fa-plus'); ?>
            {!! form($form->add('salve', 'submit', [
                'attr' => ['class' => 'btn btn-primary btn-block'],
                'label' => $icon
            ])) !!}
        </div>
    </div>
</div>
@endsection
