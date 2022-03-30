$(document).ready(function () {
  // Send Search Text to the server
  $("#search_women").keyup(function () {
    let searchText = $(this).val();
    if (searchText != "") {
      $.ajax({
        url: "action-women.php",
        method: "post",
        data: {
          query: searchText,
        },
        success: function (response) {
          $("#show-list-women").html(response);
        },
      });
    } else {
      $("#show-list-women").html("");
    }
  });
  // Set searched text in input field on click of search button
  $(document).on("click", "a", function () {
    $("#search_women").val($(this).text());
    $("#show-list-women").html("");
  });
});
