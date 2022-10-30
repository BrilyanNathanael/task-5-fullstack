<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <title>Bloog.</title>
  </head>
  <body>
    @include('partials.navbar')
    
    @yield('content')

    @include('partials.footer')

    @guest
    @include('partials.sign-in')
    @include('partials.register')
    @else
    @include('partials.logout')
    @endguest
    
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function modalAction(param){
          sessionStorage.clear();
            $(`#${param}`).modal('hide');
        }

        function modalOpen(param){
          console.log(param);
            $(`#${param}`).modal('show');
        }

        const errorMsg = $("#errorMsg").val();
        const element = $("#element").val();
        if(errorMsg == 'true')
        {
          $("#search").click();
        }


        function clickSearch(){
          $("#search").click();
        }

        function submitForm(e){
          e.preventDefault();
        }
    </script>
  </body>
</html>