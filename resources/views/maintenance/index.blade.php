@extends('tables')
@section('tablesstyles')
@endsection

@section('tablecontent')
    <div class="table-container">


        <div class="t-header">{{ __('messages.maintenance') }}</div>
        <div class="table-responsive">
            <table id="copy-print-csv" class="table custom-table">
                <thead>
                    <tr>
                        <th>{{ __('messages.id') }}</th>
                        <th>{{ __('messages.vin') }}</th>
                        <th>{{ __('messages.model') }}</th>
                        <th>{{ __('messages.driver') }}</th>
                        <th>{{ __('messages.entry_time') }}</th>
                        <th>{{ __('messages.state') }}</th>
                        <th>{{ __('messages.edit') }}</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->id }}</td>
                            <td>{{ $d->vehicle->vin }}</td>
                            <td>{{ $d->vehicle->model }}</td>

                            <td>{{ $d->driver->{'name' . localePrefix()} }}</td>
                            <td>{{ $d->entry_time }}</td>
                            <td>
                                @if ($d->status === 'pending')
                                    <button class="btn btn-warning btn-rounded">{{ __('messages.pending') }}</button>
                                @elseif ($d->status === 'in_progress')
                                    <button class="btn btn-primary btn-rounded">{{ __('messages.in_progress') }}</button>
                                @endif
                            </td>

                            <td><a href="{{ route('maintenance.edit', $d->id) }}" class="btn btn-primary btn-sm edit-garage">{{ __('messages.edit') }}</a>

                                <form action="{{ route('maintenance.destroy', $d->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('messages.Are_you_sure_you_want_to_delete_this_item?') }}')">{{ __('messages.delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
@endsection

@section('tablescripts')
@endsection
