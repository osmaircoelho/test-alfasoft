<h1>Contatos</h1>

<table>
    <thead>
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
            <td>{{ $contact->nome }}</td>
            <td>{{ $contact->contato }}</td>
            <td>{{ $contact->email }}</td>
            <td class="actions">

                    <a href="#">Editar</a>
                    <span> | </span>
                    <a href="#">Excluir</a>

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
