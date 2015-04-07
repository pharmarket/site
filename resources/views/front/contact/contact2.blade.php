<!-- app/views/index.php -->

<!doctype html> <html lang="en"> <head> <meta charset="UTF-8"> <title>Laravel and Angular Contact System</title>

    <!-- CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
    <style>
        body        { padding-top:30px; }
        form        { padding-bottom:20px; }
        .Contact    { padding-bottom:20px; }
    </style>

    <!-- JS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> <!-- load angular -->

    <!-- ANGULAR -->

        <script src="{{ asset('js/front/contact/app.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/front/contact/services/contactService.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/front/contact/controllers/mainCtrl.js') }}" type="text/javascript"></script>

</head>
<!-- declare our angular app and controller -->
<body class="container" ng-app="ContactApp" ng-controller="mainController"> <div class="col-md-8 col-md-offset-2">

    <!-- PAGE TITLE =============================================== -->
    <div class="page-header">
        <h2>Laravel and Angular Single Page Application</h2>
        <h4>Contacting System</h4>
    </div>

    <!-- NEW Contact FORM =============================================== -->
    <form ng-submit="submitContact()"> <!-- ng-submit will disable the default form action and use our function -->

        <!-- AUTHOR -->
        <div class="form-group">
            <input type="text" class="form-control input-sm" name="author" ng-model="ContactData.author" placeholder="Name">
        </div>

        <!-- Contact TEXT -->
        <div class="form-group">
            <input type="text" class="form-control input-lg" name="Contact" ng-model="ContactData.text" placeholder="Say what you have to say">
        </div>

        <!-- SUBMIT BUTTON -->
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>

    <!-- LOADING ICON =============================================== -->
    <!-- show loading icon if the loading variable is set to true -->
    <p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

    <!-- THE ContactS =============================================== -->
    <!-- hide these Contacts if the loading variable is true -->
    <div class="Contact" ng-hide="loading" ng-repeat="Contact in Contacts">
        <h3>Contact #@{{ Contact.id }} <small>by @{{ Contact.author }}</h3>
        <p>@{{ Contact.text }}</p>

        <p><a href="#" ng-click="deleteContact(Contact.id)" class="text-muted">Delete</a></p>
    </div>

</div>
</body>
</html>
