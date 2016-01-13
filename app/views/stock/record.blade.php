    @if (count($records))
        <table>
            <tr>
                <th>name</th>
                <th>&nbsp;</th>
            </tr>
            @foreach ($records as $record)
                <tr>
                    <td>{{ $record->name }}</td>
						<!-- <td>
                        @if (allowed("group/edit"))
                            <a href="{{ URL::route("group/edit") }}?id={{ $group->id }}">edit</a>
                        @endif
                        @if (allowed("group/delete"))
                            <a href="{{ URL::route("group/delete") }}?id={{ $group->id }}" class="confirm" data-confirm="Are you sure you want to delete this group?">delete</a>
                        @endif
						-->
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p>There are no Records.</p>
    @endif
    <!-- @if (allowed("group/add"))
        <a href="{{ URL::route("group/add") }}">add group</a>
    @endif -->
