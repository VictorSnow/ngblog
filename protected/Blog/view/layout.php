<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/built.min.css">
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
          <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="http://www.vvstate.com">Blog</a></li>
            <li><a href="http://blog.vvstate.com">Wordpress</a></li>
        </ul>
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
    <script type="text/javascript" src="/built.min.js"></script>
    <script type="text/javascript" src="/app/app.js"></script>
</body>
</html>
