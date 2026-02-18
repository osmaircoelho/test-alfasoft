<style>

    tbody tr:nth-child(even) {
        background-color: #b4b4b4;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

<div style="display:flex; align-items:center; justify-content:flex-start; gap:12px;">
    <h1 style="margin:0 12px 0 0;">Contatos</h1>

    <div style="display:flex; align-items:center; gap:12px;">
        <a href="{{ route('contacts.create') }}">
            <button type="button">Novo contato</button>
        </a>
    </div>
    <div>
    @auth
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth

        @guest
            <a href="{{ route('login') }}">
                <button type="button">Login</button>
            </a>
        @endguest
    </div>
</div>

<table>
    <thead>
    @if( session('success'))
        <div style="color: green; margin-bottom: 10px; font-weight: bold; font-size: 20px; margin: 8px 0;">
            {{ session('success') }}
        </div>
    @endif

   <tr style="text-align:left;">
       <th>Nome</th>
       <th>Contato</th>
       <th>E‑mail</th>
       <th style="text-align: center !important;">Ações</th>
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
