<form action="{{ $action }}" method="POST">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif

    <div>
        <label for="nome">Nome</label><br>
       <input type="text" id="nome" name="nome" value="{{ old('nome', $contact->nome) }}">
        @error('nome')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="contato">Contato (9 digitos)</label><br>
       <input type="text" id="contato" name="contato" value="{{ old('contato', $contact->contato) }}">
        @error('contato')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="email">E-mail</label><br>
        <input type="email" id="email" name="email" value="{{ old('email', $contact->email) }}">
        @error('email')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">
        {{ $buttonLabel }}
    </button>
</form>
