
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
                
                    <li class="nav-user">
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
                        <li class="nav-user">
                            <a class="nav-link active" href="dashboard">
                                <i class="fa fa-user-md"></i>
                                <span>Doctors</span>
                            </a>
                        </li>
                        <li class="nav-user">
                            <a class="nav-link" href="../patient">
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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Telephone</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Blood type</th>
                            <th>Cafeteria_ID</th>
                            <th>Bill_ID</th>
                            
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <form action="{{ route('updatepatient', $user->Patient_id) }}" method='post'>
                            @csrf
                            @method('PUT')
                            <td><input type="hidden" value="{{$user->Patient_id}}" name='Patient_id'></td>
                            <td><input type="text" value="{{$user->fname}}"name='fname'></td>
                            <td><input type="text" value="{{$user->lname}}" name='lname'></td>
                            <td><input type="text" value="{{$user->Address}}" name='Address'></td>
                            <td><input type="text" value="{{$user->telephone}}" name='telephone'></td>
                            <td><input type="text" value="{{$user->age}}" name='age'></td>
                            <td><input type="text" value="{{$user->gender}}" name='gender'></td>
                            <td><input type="text" value="{{$user->Blood_type}}" name='Blood_type'></td>
                            
                            <td><input type="text" value="{{$user->Cafeteria_id}}" name='cafeteria_id'></td>
                            <td><input type="text" value="{{$user->Bill_id}}" name='bill_id'></td>
                            
                            
                            <td>
                            <button type="submit">Update</button>
                            </td>
                            </form>
                            
                        </tr>
        
<!-- More rows to be added dynamically -->
</tbody>
</table>
</main>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

