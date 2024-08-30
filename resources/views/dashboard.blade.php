
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .main
        {
            margin-top: 70px;

        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Hospital</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        
                    </li>
                    <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="nav-link">
                            @csrf
                            <button type="submit" class="btn btn-link">
                                <i class="fa fa-sign-out"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div> </div> </div> </div>
    </nav>
    </div>
@yield("nav")
    <div class="container-fluid main">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard">
                                <i class="fa fa-user-md"></i>
                                <span>Doctors</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="patient">
                                <i class="fa fa-wheelchair"></i>
                                <span>Patients</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2>Doctors</h2>
                <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addDoctorModal">
                    <i class="fa fa-plus"></i> Add Doctor
                </button>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Specialty</th>
                            <th>Degree</th>
                            <th>Department</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <form action="read" method='get'></form>
                            <td><input type="hidden" value="{{$item['Doctor_id']}}" name='id'>{{$item['Doctor_id']}}</td>
                            <td><input type="hidden" value="{{$item['doctor_name']}}"name='name'>{{$item['doctor_name']}}</td>
                            <td><input type="hidden" value="{{$item['field']}}" name='field'>{{$item['field']}}</td>
                            <td><input type="hidden" value="{{$item['degree']}}" name='degree'>{{$item['degree']}}</td>
                            <td><input type="hidden" value="{{$item['Department_ID']}}" name='departmentid'>{{$item['Department_ID']}}</td>
                            <td>
                                <img src="doctor/{{$item->image}}" class="rounded-circle" width="50" height="50" alt="No image">
                            </td>
                            
                            <td>
                              
                                    <a href="{{ route('editdoc', $item->Doctor_id)}}"class="btn btn-primary"> edit</a>
                                <a href="{{ route('deletedoc',$item->Doctor_id) }}" class="btn btn-primary">Delete</a>
                                
                                
                            </td>
                            
                        </tr>
                        @endforeach
<!-- More rows to be added dynamically -->
</tbody>
</table>
</main>
</div>
</div>
<!-- Add Doctor Modal -->
<div class="modal fade" id="addDoctorModal" tabindex="-1" role="dialog" aria-labelledby="addDoctorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDoctorModalLabel">Add Doctor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Display general form validation errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Add Doctor Form -->
                <form id="addDoctorForm" action="insertdatadoctor" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">ID</label>
                        <input type="text" class="form-control" name="id" placeholder="Enter ID">
                        @error('id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="dname" placeholder="Enter name">
                        @error('dname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="specialty">Specialty</label>
                        <input type="text" class="form-control" name="dspeciality" placeholder="Enter specialty">
                        @error('dspeciality')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="degree">Degree</label>
                        <input type="text" class="form-control" name="ddegree" placeholder="Enter degree">
                        @error('ddegree')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="department">Department ID</label>
                        <input type="text" class="form-control" name="ddepartment" placeholder="Enter department">
                        @error('ddepartment')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="department">Image</label>
                        <input type="file" class="form-control" name="image" placeholder="Enter image">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


                    
<!-- Delete Doctor Modal -->
<div class="modal fade" id="deleteDoctorModal" tabindex="-1" role="dialog" aria-labelledby="deleteDoctorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteDoctorModalLabel">Delete Doctor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this doctor?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>
</main>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>


