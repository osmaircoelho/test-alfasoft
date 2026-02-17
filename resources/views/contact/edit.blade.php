<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar contato</title>
</head>
<body>
<h1>Editar contato</h1>

@if (session('success'))
    <div style="color: green; margin-bottom: 10px;">
        {{ session('success') }}
    </div>
@endif

@include('contact._form', [
    'action' => route('contacts.update', $contact),
    'method' => 'PUT',
    'buttonLabel' => 'Atualizar',
])

<p style="margin-top: 16px;">
    <a href="{{ route('contacts.show', $contact) }}">Voltar aos detalhes</a> |
    <a href="{{ route('contacts.index') }}">Voltar a lista</a>
</p>
</body>
</html>
