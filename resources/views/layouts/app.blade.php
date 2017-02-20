<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Task PHP</title>

    <!-- CSS & JavaScript -->
  </head>

  <body>
    <div class="container">
      <nav class="navbar navbar-default">
        <ul>
          <li><a href="/home">Home</a></li>
          <li><a href="/contacts">Contacts</a></li>
          <li><a href="/auth/logout">Вийти</a></li>
        </ul>
      </nav>
    </div>

    @yield('content')
  </body>
</html>
