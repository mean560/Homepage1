<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search</title>

  <link rel="stylesheet" href="searchcss.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/font-awesome.min.css">

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>

<body>

  <div class="middle">
    <div class="header">
      <div class="w3-padding w3-xxxlarge ">
        <i class="far fa-file-alt" style="font-size:70px;"></i>
        Search
      </div>

      <div class="container">
        <form action="/action_page.php">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" style="font-size:16px;" name="search">
            <div class="input-group-btn">
              <button class="btn" type="submit"><i class="glyphicon glyphicon-search" style="font-size:18px;"></i></button>
            </div>
          </div>
        </form>
      </div>

    </div>
    <aside class="left">
      <!-- <p>Sort By</p> -->
      <span class="my-text">
        Sort By
      </span>
      <form>
        <div class="radio">
          <label><input type="radio" name="optradio">Newest First</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Oldest First</label>
        </div>
        <span class="my-text">
          Refine By
        </span>

        <p>Database</p>
        <div class="checkbox">
          <label><input type="checkbox" value="">Google Scholar</label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" value="">Scopus</label>
        </div>
        <div class="checkbox disabled">
          <label><input type="checkbox" value="">ISI</label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" value="">TCI</label>
        </div>
      </form>
    </aside>
    <div class="content">

    </div>
    <aside class="right">
    </aside>
  </div>


</body>

</html>