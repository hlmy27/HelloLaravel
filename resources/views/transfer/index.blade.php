@extends('layouts.app')

@section('content')
    <a href="{{ route('transfer.create') }}" class="btn btn-info btn-sm">Create</a>
    
    @if ($message = Session::get('message'))
        <div class="alert alert-success martop-sm">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-responsive martop-sm">
        <thead>
            <th>ID</th>
            <th>Dari</th>
            <th>Untuk</th>
            <th>Amount</th>
        </thead>
        <tbody>
            @foreach ($transfers as $transfer)
                <tr>
                    <td>{{ $transfer->id }}</td>
                    <td><a href="{{ route('transfer.show', $transfer->id) }}">{{ $transfer->title }}</a></td>
                    <td>
                        <form action="{{ route('transfer.destroy', $transfer->id) }}" method="post">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                            <a href="{{ route('transfer.edit', $transfer->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection