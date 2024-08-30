
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
                <h2>Patient</h2>
                <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addDoctorModal">
                    <i class="fa fa-plus"></i> Add Patient
                </button>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            
                            <th>Address</th>
                            <th>Telephone</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Blood Type</th>
                            <th>Cafeteria id</th>
                            <th>Bill id</th>
                            
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patient as $p)
                        <tr>
                            <form action="updateordelete" method="get">
                            <td><input type="hidden" value="" name='id'>{{$p->Patient_id}}</td>
                            <td><input type="hidden" value=""name='fname'>{{$p->fname}}</td>
                            <td><input type="hidden" value=""name='lname'>{{$p->lname}}</td>
                            
                            <td><input type="hidden" value="" name='address'>{{$p->Address}}</td>
                            <td><input type="hidden" value="" name='telephone'>{{$p->telephone}}</td>
                            <td><input type="hidden" value="" name='gender'>{{$p->gender}}</td>
                            <td><input type="hidden" value="" name='age'>{{$p->age}}</td>
                            <td><input type="hidden" value="" name='blood_type'>{{$p->Blood_type}}</td>
                            <td><input type="hidden" value="" name='cafe_id'>{{$p->Cafeteria_id}}</td>
                            <td><input type="hidden" value="" name='bill_id'>{{$p->Bill_id}}</td>
                            
                            
                            <td>
                            <a href="{{ route('editpatient', $p->Patient_id)}}"class="btn btn-primary"> edit</a>

                            <a href="{{ route('deletepatient',$p->Patient_id) }}" class="btn btn-primary">Delete</a>

                            </td>
                            </form>
                        </tr>
                        @endforeach
<!-- More rows to be added dynamically -->
</tbody>
</table>
</main>
</div>
</div>
<!-- Add Patient Modal -->
<div class="modal fade" id="addDoctorModal" tabindex="-1" role="dialog" aria-labelledby="addDoctorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDoctorModalLabel">Add Patient</h5>
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

                <!-- Add Patient Form -->
<form id="addPatientForm" action="insertdatapatient" method="post">
    @csrf
    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" class="form-control" name="id" placeholder="Enter ID">
        @error('id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="fname">First Name</label>
        <input type="text" class="form-control" name="fname" placeholder="Enter First Name">
        @error('fname')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="text" class="form-control" name="lname" placeholder="Enter Last Name">
        @error('lname')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" placeholder="Enter Address">
        @error('address')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="telephone">Telephone</label>
        <input type="text" class="form-control" name="telephone" placeholder="Enter Telephone">
        @error('telephone')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="gender">Gender</label>
        <input type="text" class="form-control" name="gender" placeholder="Enter Gender">
        @error('gender')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="age">Age</label>
        <input type="text" class="form-control" name="age" placeholder="Enter Age">
        @error('age')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="btype">Blood Type</label>
        <input type="text" class="form-control" name="btype" placeholder="Enter Blood Type">
        @error('btype')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="c_id">Cafeteria ID</label>
        <input type="text" class="form-control" name="c_id" placeholder="Enter Cafeteria ID">
    </div>

    <div class="form-group">
        <label for="b_id">Bill ID</label>
        <input type="text" class="form-control" name="b_id" placeholder="Enter Bill ID">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

                  
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
</main>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>