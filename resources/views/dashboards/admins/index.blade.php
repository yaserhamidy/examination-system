@extends('layout.main')
@section('content')


<style>
	.read-more-btn {
	  font-size: 14px;
	  text-decoration: none;
	}
  
	.read-more-btn i {
	  font-size: 12px;
	}
  </style>
<main class="bmd-layout-content">
			<div class="container-fluid ">

				<!-- content -->
				<!-- breadcrumb -->

				<div class="row  m-1 pb-4 mb-3 ">
					<div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 p-2">
						<div class="page-header breadcrumb-header ">
							<div class="row align-items-end ">
								<div class="col-lg-8">
									<div class="page-header-title text-left-rtl">
										<div class="d-inline">
											<h3 class="lite-text ">Dashboard</h3>
											<span class="lite-text text-gray">Report and analytics</span>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<ol class="breadcrumb float-sm-right">
										<li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
										<li class="breadcrumb-item active">Dashboard</li>
									</ol>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row m-1 mb-2">
					<div class="col-xl-3 col-md-6 col-sm-6 p-2">
						<div class="box-card mini animate__animated animate__flipInY   "><i
								class="fab far fa-chart-bar b-first" aria-hidden="true"></i>
							<span class="c-first"> کتگوریها</span>
							<h3>{{ App\Models\Catagory::count() }}</h3>
							<a href="show_catagory" class="read-more-btn text-primary d-inline-flex align-items-center">
								<i class="fas fa-chevron-left ms-1 p-2"></i>
								اطلاعات بیشتر
							  </a>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 col-sm-6 p-2">
						<div class="box-card mini animate__animated animate__flipInY    "><i
								class="fab far fa-clock b-second" aria-hidden="true"></i>
							<span class="c-second"> امتحانات</span>
							<h3>{{ App\Models\subject::count() }}</h3>
							<a href="show_sub" class="read-more-btn text-primary d-inline-flex align-items-center">
								<i class="fas fa-chevron-left ms-1 p-2"></i>
								اطلاعات بیشتر
							  </a>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 col-sm-6 p-2">
						<div class="box-card mini animate__animated animate__flipInY   "><i
								class="fab far fa-comments b-third" aria-hidden="true"></i>
							<span class="c-third"> سوالات</span>
							<h3>{{ App\Models\question::count() }}</h3>
							<a href="show_question" class="read-more-btn text-primary d-inline-flex align-items-center">
								<i class="fas fa-chevron-left ms-1 p-2"></i>
								اطلاعات بیشتر
							  </a>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 col-sm-6 p-2">
						<div class="box-card mini animate__animated animate__flipInY   "><i
								class="fab far fa-gem b-forth" aria-hidden="true"></i>
							<span class="c-forth">شاگردان</span>
							<h3>{{ App\Models\User::count() }}</h3>
							<a href="show_student" class="read-more-btn text-primary d-inline-flex align-items-center">
								<i class="fas fa-chevron-left ms-1 p-2"></i>
								اطلاعات بیشتر
							  </a>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 col-sm-6 p-2">
						<div class="box-card mini animate__animated animate__flipInY   "><i
								class="fab far fa-gem b-forth" aria-hidden="true"></i>
							<span class="c-forth">نتیجه ها</span>
							<h3>{{ App\Models\result::count() }}</h3>
							<a href="show_result" class="read-more-btn text-primary d-inline-flex align-items-center">
								<i class="fas fa-chevron-left ms-1 p-2"></i>
								اطلاعات بیشتر
							  </a>
						</div>
					</div>
				</div>



				
				
				
				

				</div>


				





			</div>
		</main>


@endsection



