@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <h3>Listagem de Usuários</h3>
    </div>
    <div class="row">
        {!! Button::primary('Novo Usuário')->asLinkTo(route('admin.users.create')) !!}
    </div>
    <br/>
    <div class="row">
        {!! Table::withContents($users->items())
                ->striped()
                   ->callback('Ações', function($field, $user) {
                        $linkEdit = route('admin.users.edit', ['user' => $user->id]);
                        $linkShow = route('admin.users.show', ['user' => $user->id]);
                        return Button::link('Edit')->asLinkTo($linkEdit).'|'.
                            Button::link('View')->asLinkTo($linkShow);
                   })!!}
    </div>

    {!! $users->links() !!}
</div>
@endsection
