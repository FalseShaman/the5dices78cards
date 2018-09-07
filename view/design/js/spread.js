$.ajax({
    method: "POST",
    url: "/getDeckList",
    data: {},
    success: function(response) {
        console.log(response);
    }
});