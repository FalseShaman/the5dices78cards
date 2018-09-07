$.ajax({
    method: "POST",
    url: "/getDeckList",
    data: { name: "John", location: "Boston" }
})
    .done(function( msg ) {
        console.log(msg);
    });