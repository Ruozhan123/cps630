var app = angular.module("myApp", ["ngRoute"]);

app.config(function ($routeProvider) {
  $routeProvider
    .when("/", { templateUrl: "home.html", controller: "HomeController" })

    .when("/aboutus", {
      templateUrl: "aboutus.html",
      controller: "AboutUsController"
    })
    .when("/contactus", {
      templateUrl: "contactus.html",
      controller: "ContactUsController"
    })
    .when("/signup", {
      templateUrl: "signup.html",
      controller: "SignupController"
    })
    .when("/signin", {
      templateUrl: "signin.html",
      controller: "SigninController"
    })
    .when("/checkout", {
      templateUrl: "checkout.html",
      controller: "ShoppingController"
    })
    .when("/payment", {
      templateUrl: "payment.html",
      controller: "PaymentController"
    })
    .when("/review", {
      templateUrl: "reviews.html",
      controller: "ReviewController"
    })
    .when("/cart", {
      templateUrl: "cart.html",
      controller: "CartController"
    })
    .otherwise({ redirectTo: "/" });
});

app.controller("HomeController", function ($scope) {
  $scope.message = "Hello from HomeController";
});

app.controller("AboutUsController", function ($scope) {
  $scope.message = "Hello from AboutUsController";
});

app.controller("ContactUsController", function ($scope) {
  $scope.message = "Hello from ContactUsController";
});

app.controller("SignupController", function ($scope) {
  $scope.message = "Hello from SignupController";
});

app.controller("SigninController", function ($scope) {
  $scope.message = "Hello from SigninController";
});

app.controller("CheckoutController", function ($scope) {
  $scope.message = "Hello from CheckoutController";
});

app.controller("PaymentController", function ($scope) {
  $scope.message = "Hello from PaymentController";
});

app.controller("ReviewController", function ($scope) {
  $scope.message = "Hello from ReviewController";
});

app.controller("CartController", function ($scope) {
  $scope.message = "Hello from CartController";
});
