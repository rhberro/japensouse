<tr class="@if (!$idea->idea_user_authenticated_count) active @endif">
    <td width="30" class="text-right">
        <span class="fa fa-file-text-o" aria-hidden="true"></span>
    </td>

    <td>
        <a href="{{ route('ideas.show', $idea) }}">{{ $idea->title }}</a>
    </td>

    <td class="text-muted">
        {{ $idea->name }}
    </td>

    <td class="text-right text-muted">
        enviada {{ $idea->created_at->diffForHumans() }}
    </td>
</tr>
