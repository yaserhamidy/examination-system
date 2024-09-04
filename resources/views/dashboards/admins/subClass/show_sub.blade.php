@extends('layout.main')
@section('content')


<main class="bmd-layout-content">
			<div class="container-fluid ">

				<!-- content -->
				<!-- breadcrumb -->

				

				
			


				
				
				
					<div class="col-xs-1 col-sm-1 col-md-12 col-lg-12 p-2">
						<div class="card shade h-100">
							<div class="card-body">
								<!-- <h5 class="card-title">Table Item</h5> -->
								<div class="col-md-12">
									@if(session('status'))
									<div class="alert alert-success">{{session('status')}}</div>
						
									@endif
					
								</div>
								<div class="d-flex justify-content-between align-items-center">
								<div>
									@if(request()->has('query') && request()->get('query') != '')
									<a href="{{ route('show_sub') }}" class="btn btn-outline-secondary">
										<i class="fas fa-arrow-left mr-2"></i> برگشت
									</a>
									@endif
									<a href="add_sub" class="btn btn-primary">اضافه کردن امتحان</a>
								</div>
								<form action="{{ route('show_sub') }}" method="GET" class="d-flex align-items-center">
									<div class="input-group">
										<div class="input-group-append">
											<button class="btn btn-primary" type="submit">جوستجو</button>
										</div>
										<input type="text" name="query" class="form-control" placeholder="جوستجو امتحان " value="{{ request()->get('query') }}">
									</div>
								</form>
							</div>
								<hr>
								<div class="table-responsive">
									
									<table class="table table-striped">
										<thead>
											<tr>
												<th scope="col">شماره</th>
												<th scope="col">نام</th>
												<th scope="col">وضعیت</th>
												<th scope="col">زمان</th>
												<th scope="col">تعداد سوالات</th>
												<th scope="col">مجموعه نمرات</th>
												<th scope="col">نام کتگوری</th>
												<th scope="col">عملیات</th>
												<th scope="col">فعال و غیر فعال کردن امتحان</th>
												<th scope="col">جزئیات</th>
												
											</tr>
										</thead>
										<tbody>
	
											
										<?php
	
									   $counter = 0;
																		 
										?>
											@foreach($subject as $sub)
											<tr>
												<th scope="row">{{ $loop->iteration }}</th>
												<td>{{ $sub->sub_name }}</td>
												<td>{{ $sub->status }}</td>
												<td>{{ $sub->timer }}</td>
												<td>{{ $sub->question_count }}</td>
												<td>{{ $sub->total_score }}</td>
												<td>{{ $sub->name }}</td>
												<td>
													<div class="row" style="gap:10px">
														<a href="subjectEdit/{{ $sub->sub_classesses_id }}" class='btn btn-primary' style="margin: 0 10px;">ویرایش</a>
														<a href="subjectDelete/{{ $sub->sub_classesses_id }}" class='btn btn-danger' style="margin: 0 10px;">حذف</a>
													</div>
												</td>
												<td>
													<div>
														<a class="btn btn-primary text-center" href="{{ route('activate_sub', $sub->sub_classesses_id) }}">فعال </a>
													</div>
											
													<div>
														<a class="btn btn-danger text-center" href="{{ route('deactivate_sub', $sub->sub_classesses_id) }}">غیر فعال </a>
													</div>
												</td>
												<td>
												<div>
														<a href="{{ route('show_questions', $sub->sub_classesses_id) }}" class="btn btn-primary">جزئیات</a>
													</div>
												</td>
													
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								<div class="d-flex justify-content-center">
									{{$subject->links()}}
								  </div>
							</div>

						</div>
					</div>

				</div>


				





			</div>
		</main>


@endsection


