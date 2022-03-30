$(document).ready(function () {
  // Send Search Text to the server
  $("#search_pregnant").keyup(function () {
    let searchText = $(this).val();
    if (searchText != "") {
      $.ajax({
        url: "action-pregnant.php",
        method: "post",
        data: {
          query: searchText,
        },
        success: function (response) {
          $("#show-list-pregnant").html(response);
        },
      });
    } else {
      $("#show-list-pregnant").html("");
    }
  });
  // Set searched text in input field on click of search button
  $(document).on("click", "a", function () {
    $("#search_pregnant").val($(this).text());
    $("#show-list-pregnant").html("");
  });
});
