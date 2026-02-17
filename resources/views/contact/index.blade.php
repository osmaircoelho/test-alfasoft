<h1>Contatos</h1>

<table>
    <thead>
    @if( session('success'))
        <div style="color: green; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <tr>
        <th>Nome</th>
        <th>Contato</th>
        <th>E‑mail</th>
        <th>Ações</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($contacts as $contact)
        <tr>
            <td>
                <a href="{{ route('contacts.show', $contact) }}">
                    {{ $contact->nome }}
                </a>
            </td>
            <td>{{ $contact->contato }}</td>
            <td>{{ $contact->email }}</td>

            <td class="actions">
                @auth
                <a href="{{ route('contacts.edit', $contact->id) }}">
                    <button>Editar</button>
                </a>

                        <span> | </span>

                    <form action="{{ route('contacts.destroy', $contact->id) }}"
                        method="POST" style="display:inline"
                        onsubmit="return confirm('Tem certeza que deseja excluir este contato?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                @endauth
            </td>
        </tr>


    @empty
        <tr>
            <td colspan="4">Nenhum contato encontrado.</td>
        </tr>
    @endforelse
    </tbody>
</table>

<div style="margin-top: 12px;">
    {{ $contacts->links() }}
</div>
