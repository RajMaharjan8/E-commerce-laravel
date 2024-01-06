<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-comm project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </head>
  <body>
    @yield('content')
    {{View::make('footer')}}
  </body>
<style>
  .custom-login{
    height: 500px;
    padding-top: 100px; 
  }
  .detail-img{
    height: 200px;
  }
    .product-image {
        max-width: 100px; /* Set the maximum width of the image */
        height: auto; /* Maintain aspect ratio */
        display: block; /* Ensure proper spacing */
        margin: 0 auto; /* Center the image horizontally */
    }


    .login-container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh; /* Make the container take the full height of the viewport */
    }

    .login-card {
        width: 300px;
        padding: 20px;
        background-color: #ffffff; /* Set a white background color */
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
    }

    .login-card-header {
        background-color: #007bff; /* Set a cool blue background color */
        color: #ffffff; /* Set text color to white */
        text-align: center;
        padding: 10px 0;
        border-radius: 10px 10px 0 0;
    }

    

</style>

<script>
  // Automatically close the alert after 4 seconds
  setTimeout(function() {
      $('#success-alert').fadeOut('slow');
  }, 2000);
</script>
</html>