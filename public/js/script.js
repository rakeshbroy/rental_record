// form validation

$("#" + $("form").attr("id")).submit(function (event) {
  var alert_box = $("#alert-box");
  var errorlist = $("<ul></ul");
  var errors = [];
  if ($("#username").val() === "") {
    errors.push("Username cant be empty!");
  }
  if ($("#password").val() === "") {
    errors.push("Password cant be empty!");
  }
  console.log(errors);
  if (errors.length > 0) {
    if (alert_box.children().length > 0) {
      console.log(alert_box.children().length);
      alert_box.empty();
    }
    errors.forEach(function (error) {
      $("<li>" + error + "</li>").appendTo(errorlist);
    });
    errorlist.css({ color: "red", border: "solid 1px red" });
    errorlist.appendTo(alert_box);
    alert_box.removeClass("d-none");
    event.preventDefault();
  }
  return;
});

// $("#" + $("form").attr("id")).submit(function (event) {
//   console.log("second form");
//   event.preventDefault();
// });

// enable button
var value;
$("input").on("input", function (event) {
  value = $(event.target).val().length;
});
$("input").on("change", function (event) {
  if (value == 0) {
    event.preventDefault();
    event.stopPropagation();
  }
});
