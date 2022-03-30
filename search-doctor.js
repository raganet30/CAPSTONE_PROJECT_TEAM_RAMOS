$(document).ready(function () {
  // Send Search Text to the server
  $("#search-doc").keyup(function () {
    let searchText = $(this).val();
    if (searchText != "") {
      $.ajax({
        url: "action-doc.php",
        method: "post",
        data: {
          query: searchText,
        },
        success: function (response) {
          $("#show-list-doc").html(response);
        },
      });
    } else {
      $("#show-list-doc").html("");
    }
  });
  // Set searched text in input field on click of search button
  $(document).on("click", "a", function () {
    $("#search-doc").val($(this).text());
    $("#show-list-doc").html("");
  });
});