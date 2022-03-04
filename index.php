<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>PHP Task | Register</title>
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-60">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                  <div class="mb-md-5 mt-md-4 pb-5">
      
                    <h2 class="fw-bold mb-2 text-uppercase">Sign Up</h2>
              <form action="form_submit.php" autocomplete="off" method="post" id="login">
                    <div class="form-outline form-white mb-4">
                        <input type="text" id="name" class="form-control form-control-lg" name="full_name" minlength="2" required/>
                        <label class="form-label" for="name">Name</label>
                    </div>
                    <div class="form-outline form-white mb-4">
                      <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email" required/>
                      <label class="form-label" for="typeEmailX">Email</label>
                    </div> 
                    <div class="form-outline form-white mb-4">
                      <input type="password" id="password" class="form-control form-control-lg" minlength="6" name="password" required/>
                      <label class="form-label" for="password">Password</label>
                    </div>
      
      
                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Create Account</button>
      
                </form>
                  </div>
      
                 
      
                </div>
              </div>
            </div>
          </div>


    <div id="loading"></div>
    <script src="main.js"></script>
</body>
</html>