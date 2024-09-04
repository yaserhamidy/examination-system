@extends('layout.main')

@section('content')

<main class="bmd-layout-content">
    <div class="container-fluid">
        <div class="col-xs-1 col-sm-1 col-md-12 col-lg-12 p-2">
            <div class="card shade h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            @if(request()->has('query') && request()->get('query') != '')
                                <a href="{{ route('show_result') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left mr-2"></i> برگشت
                                </a>
                            @endif
                        </div>
                        <form action="{{ route('show_result') }}" method="GET" class="d-flex align-items-center">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">جوستجو</button>
                                </div>
                                <input type="text" name="query" class="form-control" placeholder="جوستجو سوالات " value="{{ request()->get('query') }}">
                            </div>
                        </form>
                    </div>
                    <hr>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">شماره</th>
                                <th scope="col">نام شاگرد</th>
                                <th scope="col">نام امتحان</th>
                                <th scope="col">جواب درست</th>
                                <th scope="col">جواب غلط</th>
                                <th scope="col">نمره</th>
                                <th scope="col">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $result)
<tr>
    <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $result->student->name }}</td>
        <td>{{ $result->exam ? $result->exam->sub_name : 'N/A' }}</td>      <!-- Accessing the sub_name -->
        <td>{{ $result->correctanswer }}</td>
        <td>{{ $result->incorrectanswer }}</td>
        <td>{{ $result->points }}</td>
   
    <td>
        <div class="row" style="gap:10px">
          
            <a href="resultDelete/{{$result->result_id}}" class='btn btn-danger' style="margin: 0 10px;" >حذف</a> 
        </div>
    </td>
</tr>
@endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{-- Pagination if needed --}}
                        {{-- {{ $results->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection