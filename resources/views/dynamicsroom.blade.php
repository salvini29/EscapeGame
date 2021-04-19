<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link href="{{ asset('css/roomclock.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> --}}

      <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('026e0136f6ff61d42621', {
      cluster: 'us2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      //alert(JSON.stringify(data));
      //console.log(window.location.href);
      //let datam = data.message;
      //(data.message)['PONER LA PROPIEDAD DEL OBJETO']
      //console.log( (data.message)['2'] );
      if ( (data.message)['2'] == window.location.href && (data.message)['1'] == 'CODIGO1') {
            $("#img").show();
            $("#img2").show();
            $('#change').text('El segundo codigo es 2 pero todo junto y en mayuscula');
      } else if ( (data.message)['2'] == window.location.href && (data.message)['1'] == 'CODIGO2' ) {
            $("#img3").show();
            $("#img4").show();
            $('#change').text('El tercer codigo es 3 pero todo junto y en mayuscula');
      } else if ( (data.message)['2'] == window.location.href && (data.message)['1'] == 'CODIGO3' ) {
            $("#img5").show();
            $("#img6").show();
            $('#change').text('El cuarto codigo es 4 pero todo junto y en mayuscula');
      }
      else if ( (data.message)['2'] == window.location.href && (data.message)['1'] == 'CODIGO4' ) {
          window.location.replace("{{ route('home', ['status' => 'Han completado toda la sala!!']) }}");
      }

    });
  </script>

    <title>Final</title>
  </head>
  <body>

    <div class="d-flex justify-content-center">
      <h1>Dynamics</h1>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-sm">
          
          <br>
          <div id="app"></div>
          <script type="text/javascript" src="{{ asset('js/roomclock.js') }}"></script>
          <br>

        </div>
        <div class="col-sm">
          
              <div class="d-flex justify-content-center">
              <!-- Optional JavaScript; choose one of the two! -->

              <!-- Option 1: Bootstrap Bundle with Popper -->
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

              <!-- Option 2: Separate Popper and Bootstrap JS -->
              <!--
              <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
              -->
              <form>
                @csrf
                <label for="lname">Codigo:</label><br>
                <input type="text" id="text" name="text"><br><br>
                <input type="submit" value="Submit">
              </form>

            </div>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <div class="d-flex justify-content-center">
              <div class="p-3"><img src="{{ asset('roomimg/test.jpg') }}" width="200" height="200"></div>
              <div class="p-3"><img src="{{ asset('roomimg/test.jpg') }}" width="200" height="200" style="display: none;" id="img" /></div>
              <div class="p-3"><img src="{{ asset('roomimg/test.jpg') }}" width="200" height="200" style="display: none;" id="img2" /></div>
              <div class="p-3"><img src="{{ asset('roomimg/test.jpg') }}" width="200" height="200" style="display: none;" id="img3" /></div>
              <div class="p-3"><img src="{{ asset('roomimg/test.jpg') }}" width="200" height="200" style="display: none;" id="img4" /></div>
              <div class="p-3"><img src="{{ asset('roomimg/test.jpg') }}" width="200" height="200" style="display: none;" id="img5" /></div>
              <div class="p-3"><img src="{{ asset('roomimg/test.jpg') }}" width="200" height="200" style="display: none;" id="img6" /></div>
            </div>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            

            <div class="d-flex justify-content-center flex-column col-sm">
              <button type="button" class="collapsible btn btn-warning">Abrir pista</button>
              <div class="content">
                <p id="change" style="display: none;" class="text-center">El primer codigo es 1 pero todo junto y en mayuscula</p>
              </div>
            </div>


        </div>
        <div class="col-sm">

        </div>
      </div>
    </div>

    <script type="text/javascript">
      var coll = document.getElementsByClassName("collapsible");
      var i;
      for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
          this.classList.toggle("active");
          $("#change").show();
          var content = this.nextElementSibling;
          if (content.style.display === "block") {
            content.style.display = "none";
          } else {
            content.style.display = "block";
          }
        });
      }
    </script>

    <script type="text/javascript">
      $("form").on("submit", function (e) {
      var data = $(this).serialize();
      $.ajax({
        type: "POST",
        URL: "{{ route('dynamicsroomsend', ['name' => $name, 'code' => $code]) }}",
        data: data,
        success: function () {
          console.log("funciona");
        }
      });
   
      e.preventDefault();
      });
    </script>
  </body>
</html>