@extends('layout.main')
@section('content')


<main class="bmd-layout-content">
			<div class="container-fluid ">

				<!-- content -->
				<!-- breadcrumb -->

								
					<div class="col-xs-1 col-sm-1 col-md-12 col-lg-12 p-2">
						<div class="card shade h-100">
							<div class="card-body">
								<div class="d-flex justify-content-between align-items-center">
									<div>
										@if(request()->has('query') && request()->get('query') != '')
										<a href="{{ route('show_student') }}" class="btn btn-outline-secondary">
											<i class="fas fa-arrow-left mr-2"></i> برگشت
										</a>
										@endif
										<a href="add_student" class="btn btn-primary">اضافه کردن شاگرد</a>
									</div>
									<form action="{{ route('show_student') }}" method="GET" class="d-flex align-items-center">
										<div class="input-group">
											<div class="input-group-append">
												<button class="btn btn-primary" type="submit">جوستجو</button>
											</div>
											<input type="text" name="query" class="form-control" placeholder="جوستجو امتحان " value="{{ request()->get('query') }}">
										</div>
									</form>
								</div>
								<hr>
								<table class="table table-striped">
									<thead>
										<tr>
											<th scope="col">شماره</th>
											<th scope="col">نام</th>
											<th scope="col">ایمیل آدرس</th>
											{{-- <th scope="col">رمز عبور</th> --}}
											<th scope="col">عملیات</th>
										</tr>
									</thead>
									<tbody>
										
									
									
									<?php

                                   $counter = 0;
                                                                     
									?>
										
										@foreach($students as $stud)
										<tr>
											<th scope="row">{{++$counter}}</th>
											
											<td>{{$stud->name}}</td>
											<td>{{$stud->email}}</td>
											{{-- <td>{{$stud->password}}</td> --}}
											<td>
												<div class="row" style="gap:10px">
													<a href="studentEdit/{{$stud->id}}" class='btn btn-primary'  style="margin: 0 10px;" >ویرایش</a>
													<a href="studentDelete/{{$stud->id}}" class='btn btn-danger' style="margin: 0 10px;" >حذف</a>
													
												</div>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<div class="d-flex justify-content-center">
									{{$students->links()}}
								  </div>
							</div>

						</div>
					</div>

				</div>


				





			</div>
		</main>


@endsection



