$("#username").on("invalid", function (event) {
  console.log("Inside username");
  event.target.setCustomValidity("Can't be empty");
});

$("#password").on("invalid", function (event) {
  console.log("Inside password");
  event.target.setCustomValidity("Can't be empty");
});
