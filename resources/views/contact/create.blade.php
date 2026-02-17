<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Novo contato</title>
</head>
<body>
<h1>Novo contato</h1>

@include('contact._form', [
    'action' => route('contacts.store'),
    'method' => 'POST',
    'buttonLabel' => 'Salvar',
])

<p>
    <a href="{{ route('contacts.index') }}">Voltar para a lista</a>
</p>
</body>
</html>
