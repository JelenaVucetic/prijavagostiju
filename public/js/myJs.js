$(document).ready(function() {
    $('#table').DataTable();
} );
$(document).ready(function() {
    $('#city-table').DataTable();
} );

$(document).ready(function() {
    $('#state-table').DataTable();
} );

$(document).ready(function() {
    $('#logs-table').DataTable();
} );

$(document).ready(function() {
    $('#guest-table').DataTable();
} );

$(document).ready(function() {
    $('#renting-table').DataTable();
} );

$('#editModal').on('show.bs.modal', function (event) {
    
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('name') // Extract info from data-* attributes3
    var lastname = button.data('lastname')
    var username = button.data('username')
    var email = button.data('email')
    var role = button.data('role')
    var active = button.data('active')
    var id = button.data('id')
    // If necessary, you could intiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    
     modal.find('.modal-body #firstname').val(name) 
     modal.find('.modal-body #lastname').val(lastname) 
     modal.find('.modal-body #username').val(username) 
     modal.find('.modal-body #email').val(email) 
     modal.find('.modal-body #role').val(role) 
     modal.find('.modal-body #active').val(active) 

     modal.find('.confirm-btn').on('click', function (e) {
        e.preventDefault();
        var submitUrl =  '/users/' + id,
            form = $('#edit-user-form'); // change with your form
    
        form.attr('action', submitUrl);
        form.submit();
  })


});

$('#editCityModal').on('show.bs.modal', function (event) {
    
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('name') // Extract info from data-* attributes3
    var underage = button.data('underage')
    var adult = button.data('adult')
    var id = button.data('id')
    // If necessary, you could intiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    
     modal.find('.modal-body #name').val(name) 
     modal.find('.modal-body #local_tax_underage').val(underage) 
     modal.find('.modal-body #local_tax_adult').val(adult) 

     modal.find('.confirm-city-btn').on('click', function (e) {
        e.preventDefault();
        var submitUrl =  '/cities/' + id,
            form = $('#edit-city-form'); // change with your form
    
        form.attr('action', submitUrl);
        form.submit();
  })


});

$('#editStateModal').on('show.bs.modal', function (event) {
    
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('name') // Extract info from data-* attributes3
    var id = button.data('id')
    // If necessary, you could intiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    
     modal.find('.modal-body #name').val(name) 

     modal.find('.confirm-state-btn').on('click', function (e) {
        e.preventDefault();
        var submitUrl =  '/states/' + id,
            form = $('#edit-state-form'); // change with your form
    
        form.attr('action', submitUrl);
        form.submit();
  })


});


$('#editGuestModal').on('show.bs.modal', function (event) {
    
    var button = $(event.relatedTarget) // Button that triggered the modal
    var firstname = button.data('firstname') // Extract info from data-* attributes3
    var id = button.data('id')
    var stateId = button.data('state')
    var lastname = button.data('lastname')
    var gender = button.data('gender')
    var birth = button.data('birth')
    var document = button.data('document')
    var docnumber = button.data('docnumber')
    var expiration = button.data('expiration')
    // If necessary, you could intiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

     modal.find('.modal-body #firstname').val(firstname) 
     modal.find('.modal-body #lastname').val(lastname) 
     modal.find('.modal-body #gender').val(gender) 
     modal.find('.modal-body #state_id').val(stateId) 
     modal.find('.modal-body #date_of_birth').val(birth) 
     modal.find('.modal-body #travel_document').val(document) 
     modal.find('.modal-body #travel_document_number').val(docnumber) 
     modal.find('.modal-body #expiration_date').val(expiration) 

     modal.find('.confirm-guest-btn').on('click', function (e) {
        e.preventDefault();
        var submitUrl =  '/guests/' + id,
            form = $('#edit-guest-form'); // change with your form
    
        form.attr('action', submitUrl);
        form.submit();
  })
});

$('#editLandlordModal').on('show.bs.modal', function (event) {
    
    var button = $(event.relatedTarget) // Button that triggered the modal
    var firstname = button.data('firstname') // Extract info from data-* attributes3
    var id = button.data('id')
    var cityId = button.data('city')
    var lastname = button.data('lastname')
    var birth = button.data('birth')
    var jmbg = button.data('jmbg')
    var address = button.data('address')
    // If necessary, you could intiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

     modal.find('.modal-body #firstname').val(firstname) 
     modal.find('.modal-body #lastname').val(lastname) 
     modal.find('.modal-body #city_id').val(cityId) 
     modal.find('.modal-body #date_of_birth').val(birth) 
     modal.find('.modal-body #jmbg').val(jmbg) 
     modal.find('.modal-body #address').val(address) 

     modal.find('.confirm-landlord-btn').on('click', function (e) {
        e.preventDefault();
        var submitUrl =  '/landlords/' + id,
            form = $('#edit-landlord-form'); // change with your form
    
        form.attr('action', submitUrl);
        form.submit();
  })
});