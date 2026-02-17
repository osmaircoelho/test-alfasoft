<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalhes do contato</title>
</head>
<body>
<h1>Detalhes do contato</h1>

@if (session('success'))
    <div style="color: green; margin-bottom: 10px;">
        {{ session('success') }}
    </div>
@endif

<p><strong>ID:</strong> {{ $contact->id }}</p>
<p><strong>Nome:</strong> {{ $contact->nome }}</p>
<p><strong>Contato:</strong> {{ $contact->contato }}</p>
<p><strong>E-mail:</strong> {{ $contact->email }}</p>
<p><strong>Criado em:</strong> {{ $contact->created_at }}</p>
<p><strong>Atualizado em:</strong> {{ $contact->updated_at }}</p>

<p>
    <a href="{{ route('contacts.edit', $contact)}}">Editar</a>
</p>

<form action="{{ route('contacts.destroy', $contact) }}"
      method="POST"
      onsubmit="return confirm('Tem certeza que deseja excluir este contato?');" style="display:inline-block;"
>
    @csrf
    @method('DELETE')
    <button type="submit">Excluir</button>
</form>

<p style="margin-top: 16px;">
    <a href="{{ route('contacts.index') }}">Voltar para a lista</a>
</p>
</body>
</html>
