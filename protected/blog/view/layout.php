<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-theme.min.css">
    <link href="/home.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <title>Victor's Blog</title>
  </head>
  <body ng-app="blog">
    <nav class="navbar navbar-default navbar-fixed-top" style="opacity: .9" role="navigation">
      <div class="container-fluid">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#/">Victor's Blog</a>
          </div>
      </div>
    </nav>
    <div class="row" style="padding-top: 70px">
      <div class="container center-block">
        <div class="col-md-2"></div>
        <div class="col-md-8 col-sm-12" ui-view>
          
        </div>
        <div class="col-md-2">
        </div>
      </div>
    </div>
    <script type="text/javascript" src="/jquery.min.js"></script>
    <script type="text/javascript" src="/bootstrap.min.js"></script>
    <script type="text/javascript" src="/angular.js"></script>
    <script type="text/javascript" src="/angular-ui-router.js"></script>
    <script type="text/javascript" src="/angular-paging.js"></script>
    <script type="text/javascript" src="/angular-sanitize.js"></script>
    <script type="text/javascript" src="/app/app.js"></script>
  </body>
</html>
