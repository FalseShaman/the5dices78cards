$.ajax({
    method: "POST",
    url: "/getDeckList",
    data: {name: "John", location: "Boston"},
    success: function(data) {
        console.log(data);
    }
});