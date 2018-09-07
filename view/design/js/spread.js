$.ajax({
    method: "POST",
    url: "/getDeckList",
    data: { name: "John", location: "Boston" }
})
    .done(function( msg ) {
        alert( "Data Saved: " + msg );
    });