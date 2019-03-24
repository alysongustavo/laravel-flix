@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <h3>Detalhe do Usuário</h3>
        </div>
    </div>
    <div class="row">
        {!! Button::primary('Edit')->asLinkTo(route('admin.users.edit', ['user' => $user->id])) !!}
        &nbsp&nbsp
        {!! Button::danger('Delete')
                ->asLinkTo(route('admin.users.destroy', ['user' => $user->id]))
                ->addAttributes(['onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit();"])
        !!}
    </div>
    <?php $formDelete = FormBuilder::plain([
        'id' => 'form-delete',
        'route' => ['admin.users.destroy', 'user' => $user->id],
        'method' => 'DELETE',
        'style' => 'display:nome'
    ]) ?>
    {!!
        form($formDelete)
    !!}
    <br/><br/>
    <div class="row">
        <div class="col-sm">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">#</th>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nome</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
