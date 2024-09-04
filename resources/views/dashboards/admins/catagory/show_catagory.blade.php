@extends('layout.main')
@section('content')

<main class="bmd-layout-content">
    <div class="container-fluid ">
        <div class="col-xs-1 col-sm-1 col-md-12 col-lg-12 p-2">
            <div class="card shade h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if(session('status'))
                            <div class="alert alert-success">{{session('status')}}</div>
                            @endif
                        </div>
                    </div>
					<div class="d-flex justify-content-between align-items-center">
						<div>
							@if(request()->has('query') && request()->get('query') != '')
							<a href="{{ route('show_catagory') }}" class="btn btn-outline-secondary">
								<i class="fas fa-arrow-left mr-2"></i> برگشت
							</a>
							@endif
							<a href="add_catagory" class="btn btn-primary">اضافه کردن کتگوری</a>
						</div>
						<form action="{{ route('show_catagory') }}" method="GET" class="d-flex align-items-center">
							<div class="input-group">
								<div class="input-group-append">
									<button class="btn btn-primary" type="submit">جوستجو</button>
								</div>
								<input type="text" name="query" class="form-control" placeholder="جوستجو کتگوری " value="{{ request()->get('query') }}">
							</div>
						</form>
					</div>
                    <hr>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">شماره</th>
                                <th scope="col">نام</th>
                                <th scope="col">معلومات</th>
                                <th scope="col">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 0; ?>
                            @foreach($catagories as $cat)
                            <tr>
                                <th scope="row">{{++$counter}}</th>
                                <td>{{$cat->name}}</td>
                                <td>{{$cat->description}}</td>
                                <td>
                                    <div class="row" style="gap:10px">
                                        <a href="catagoryEdit/{{$cat->cat_id}}" class='btn btn-primary' style="margin: 0 10px;">ویرایش</a>
                                        <a href="catagoryDelete/{{$cat->cat_id}}" class='btn btn-danger' style="margin: 0 10px;">حذف</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{$catagories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection