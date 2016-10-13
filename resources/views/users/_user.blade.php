<tr>
    <td width="30" class="text-right">
        <span class="fa fa-file-text-o" aria-hidden="true"></span>
    </td>
    <td>
        <a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
    </td>

    <td class="text-right text-muted">
        cadastrado {{ $user->created_at->diffForHumans() }}
    </td>
</tr>
