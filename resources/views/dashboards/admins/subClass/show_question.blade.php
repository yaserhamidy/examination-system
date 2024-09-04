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
                              <div class="row">
							  <a href="add_question" class="btn btn-primary">اضافه کردن سوال</a>

							  </div>
								<hr>
								<div class="table-responsive">
									
								<table class="table table-striped">
									<thead>
										<tr>
											<th scope="col">شماره</th>
											<th scope="col">سوال</th>
											<th scope="col">جواب اول</th>
											<th scope="col">جواب دوم</th>
											<th scope="col">جواب سوم</th>
											<th scope="col">جواب چهارم</th>
											<th scope="col">جواب درست</th>
											<th scope="col">نام امتحان</th>
											<th scope="col">عملیات</th>
										</tr>
									</thead>
									<tbody>
										
									<?php
                                   $counter = 0;
									?>
									
										
										
										@foreach($questions as $ques)
										<tr>
											<th scope="row">{{ $loop->iteration }}</th>
											
											
											
											{{-- <th scope="row">{{++$counter}}</th> --}}
											<td>{{$ques->question}}</td>
											<td>{{$ques->answerone}}</td>						
											<td>{{$ques->answertow}}</td>
											<td>{{$ques->answerthree}}</td>
											<td>{{$ques->answerfour}}</td>
											<td>{{$ques->finalanswer}}</td>
											<td>{{$ques->name}}</td>
											
											<td>
												<div class="row d-flex" style=" gap:10px">
													<a href="questionEdit/{{$ques->question_id}}" class='btn btn-primary '  style="margin: 0 10px;" >ویرایش</a>
													<a href="questionDelete/{{$ques->question_id}}" class='btn btn-danger' style="margin: 0 10px;" >حذف</a>
													
												</div>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<div class="d-flex justify-content-center">
									{{$questions->links()}}
								  </div>
							</div>
							</div>

						</div>
					</div>

				</div>


				





			</div>
		</main>


@endsection


