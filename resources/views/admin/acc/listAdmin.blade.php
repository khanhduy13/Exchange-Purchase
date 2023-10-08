@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Tên Người Dùng</th>
                <th>Email</th>
                <th>Trạng Thái</th>
                <th>Cập Nhật Lần Cuối</th>

                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accs as $key => $acc)
                @php
                    $stt = $key + 1;
                @endphp
                <tr>

                    <td>{{ $stt }}</td>
                    <td>{{ $acc->tennd }}</td>
                    <td>{{ $acc->email }}</td>
                    <td>{!! \App\Helpers\Helper::active($acc->trangthai) !!}</td>
                    <td>{{ $acc->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/accs/edit/{{ $acc->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow({{ $acc->id }}, '/admin/accs/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
