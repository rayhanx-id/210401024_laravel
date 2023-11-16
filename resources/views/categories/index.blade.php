<!doctype html>
<html lang="en">
<head>
	<title>Kelola Kategori</title>
	<link rel="icon" href="../../assets/img/logo.png" type="image/png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<style>
		#sidebar {
			background-color: #F1C376;
		}
		#sidebar ul li a {
			border-bottom: 2px solid rgba(255, 255, 255, 0.285);
		}
		a#sidebarCollapse.btn {
			background-color: #F0A04B;
			border: 0px solid white;
		}
		a#sidebarCollapse.btn:hover {
			background-color: #b77834;
			border: 0px solid white;
		}
		i.fa.fa-bars {
			color: white;
		}
        a.btn.btn-save {
            background-color: #F1C376; 
            border: 0px;
        }
        a.btn.btn-save:hover {
            background-color: #b77834; 
        }
	a#sidebarCollapse.btn {
			background-color: #F0A04B;
			border: 0px solid white;
		}
		a#sidebarCollapse.btn:hover {
			background-color: #b77834;
			border: 0px solid white;
		}
		i.fa.fa-bars {
			color: white;
		}
        a.btn.btn-save {
            background-color: #F1C376; 
            border: 0px;
        }
        a.btn.btn-save:hover {
            background-color: #b77834; 
        }
        button#sidebarCollapse.btn {
			background-color: #F0A04B;
			border: 0px solid white;
		}
		button#sidebarCollapse.btn:hover {
			background-color: #b77834;
			border: 0px solid white;
		}
        button.btn.btn-save {
            background-color: #F1C376; 
            border: 0px;
        }
        button.btn.btn-save:hover {
            background-color: #b77834; 
        }
		.table th{
			border: #DDDDDD 2px solid;
		}
		.table td{
			border: #DDDDDD 2px solid;
		}
	</style>
</head>

<body>

	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar">
			<div class="custom-menu">
				<button type="button" id="sidebarCollapse" class="btn">
					<i class="fa fa-bars"></i>
					<span class="sr-only">Toggle Menu</span>
				</button>
			</div>
			<div class="p-4 pt-5">
				<h1 style="color: white;">Blog</h1>
				
				<ul class="list-unstyled components mb-5">
					<li>
						<a class="text-decoration-none" href="{{ route('index') }}">Dashboard</a>
					</li>
					
					<li>
						<a class="text-decoration-none" href="{{ route('articles.create') }}">Buat Postingan</a>
					</li>
					<li>
						<a class="text-decoration-none" href="{{ route('articles.index') }}">Edit Postingan</a>
					</li>
					<li>
						<a class="text-decoration-none" href="{{ route('categories.index') }}">Kelola Kategori</a>
					</li>
				</ul>	

				<div class="footer">
					<p>
						Copyright &copy; 2023 | rayhanx.com
					</p>
				</div>

			</div>
		</nav>


		<div id="content" class="m-4 m-md-5 mt-5">
			<h2 class="mb-4" style="font-weight: 600;">Buat Kategori</h2>
			
			<div class="d-grid gap-2">
				<label for="exampleFormControlInput1" class="form-label">Tambah Kategori Baru :</label>
				<a href="{{ route('categories.create') }}" class="btn btn-save" type="submit"><i class="fa fa-cloud-upload" aria-hidden="true"></i> <label>Buat Kategori</label></a>
			</div>

			<div class="mt-5">
			<table class="table table-striped table-hover table-light">
					<tr>
						<th>Nama Kategori</th>
						<th>Tindakan</th>
					</tr>
					@foreach($categories as $category)
					<tr>
						<td>{{ $category->name }}</td>
						<td>
							<div class="d-flex">
								<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning text-white me-2">Edit</a>
								<form action="{{ route('categories.destroy', $category->id) }}" method="POST">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger text-white">Delete</button>
								</form>
							</div>
						</td>
					</tr>
					@endforeach
			</table>
			</div>
		</div>

	</div>

	<script src="{{ asset('assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>