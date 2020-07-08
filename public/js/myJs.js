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

$(document).ready(function() {
    $('#debt-table').DataTable();
} );

$(document).ready(function() {
    $('#inspector-debt-table').DataTable();
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

$('#editDebtModal').on('show.bs.modal', function (event) {
    
    var button = $(event.relatedTarget) // Button that triggered the modal
    var firstname = button.data('firstname') // Extract info from data-* attributes3
    var lastname = button.data('lastname')
    var id = button.data('id')
    var cityId = button.data('city')
    var cityName = button.data('name')
    var birth = button.data('birth')
    var jmbg = button.data('jmbg')
    var address = button.data('address')
    var total = button.data('total')
    var debtid = button.data('debtid')
    // If necessary, you could intiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

     modal.find('.modal-body #firstname').val(firstname) 
     modal.find('.modal-body #lastname').val(lastname) 
     modal.find('.modal-body #city_id').val(cityId) 
     modal.find('.modal-body #date_of_birth').val(birth) 
     modal.find('.modal-body #jmbg').val(jmbg) 
     modal.find('.modal-body #address').val(address) 
     modal.find('.modal-body #total').val(total) 
     modal.find('.modal-body #totalNew').val(total) 
     modal.find('.modal-body #debtid').val(debtid) 
     modal.find('.modal-body #landlordid').val(id) 

     modal.find('.confirm-debt-btn').on('click', function (e) {
        e.preventDefault();
        var submitUrl =  '/payoff/' + id,
        form = $('#edit-debt-form'); // change with your form

        form.attr('action', submitUrl);
        form.submit();
  })
});

$('#deleteGuestModal').on('show.bs.modal', function (event) {
    
    var button = $(event.relatedTarget) // Button that triggered the modal
    var firstname = button.data('firstname') // Extract info from data-* attributes3
    var id = button.data('id')
    var lastname = button.data('lastname')
    var docnumber = button.data('docnumber')
    // If necessary, you could intiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

     modal.find('.modal-body #firstname_delete').val(firstname) 
     modal.find('.modal-body #lastname_delete').val(lastname) 
     modal.find('.modal-body #travel_document_number_delete').val(docnumber) 

     modal.find('.confirm-delete-guest-btn').on('click', function (e) {
        e.preventDefault();
        var submitUrl =  '/guests/' + id,
            form = $('#delete-guest-form'); // change with your form
    
        form.attr('action', submitUrl);
        form.submit();
  })
});

$('#deleteLandlordModal').on('show.bs.modal', function (event) {
    
    var button = $(event.relatedTarget) // Button that triggered the modal
    var firstname = button.data('firstname') // Extract info from data-* attributes3
    var id = button.data('id')
    var lastname = button.data('lastname')
    var jmbg = button.data('jmbg')
    // If necessary, you could intiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

     modal.find('.modal-body #firstname_landlord').val(firstname) 
     modal.find('.modal-body #lastname_landlord').val(lastname) 
     modal.find('.modal-body #jmbg_landlord').val(jmbg) 

     modal.find('.confirm-delete-landlord-btn').on('click', function (e) {
        e.preventDefault();
        var submitUrl =  '/landlords/' + id,
            form = $('#delete-landlord-form'); // change with your form
    
        form.attr('action', submitUrl);
        form.submit();
  })
});

$('#deleteUserModal').on('show.bs.modal', function (event) {
    
    var button = $(event.relatedTarget) // Button that triggered the modal
    var firstname = button.data('name') // Extract info from data-* attributes3

    var id = button.data('id')
    // If necessary, you could intiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

     modal.find('.modal-body #firstname_user').val(firstname) 

     modal.find('.confirm-delete-user-btn').on('click', function (e) {
        e.preventDefault();
        var submitUrl =  '/users/' + id,
            form = $('#delete-user-form'); // change with your form
    
        form.attr('action', submitUrl);
        form.submit();
  })
});


$('#deleteCityModal').on('show.bs.modal', function (event) {
    
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('name') // Extract info from data-* attributes3

    var id = button.data('id')
    // If necessary, you could intiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

     modal.find('.modal-body #city_name').val(name) 

     modal.find('.confirm-delete-city-btn').on('click', function (e) {
        e.preventDefault();
        var submitUrl =  '/cities/' + id,
            form = $('#delete-city-form'); // change with your form
    
        form.attr('action', submitUrl);
        form.submit();
  })
});


$('#deleteStateModal').on('show.bs.modal', function (event) {
    
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('name') // Extract info from data-* attributes3

    var id = button.data('id')
    // If necessary, you could intiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

     modal.find('.modal-body #state_name').val(name) 

     modal.find('.confirm-delete-state-btn').on('click', function (e) {
        e.preventDefault();
        var submitUrl =  '/states/' + id,
            form = $('#delete-state-form'); // change with your form
    
        form.attr('action', submitUrl);
        form.submit();
  })
});



var number = $('#number').val();
  
var names = [];
var debt = [];
for(var c = 0; c < number ; c++){
    names[c] = $('#landlord'+c).val();
    debt[c] = $('#debt'+c).val();
}

var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
    labels: names,
    datasets: [{
    label: '# of Votes',
    data: debt,
    backgroundColor: [
        'rgb(103, 183, 220)',
        'rgb(103, 183, 220)',
        'rgb(103, 183, 220)',
        'rgb(103, 183, 220)',
        'rgb(103, 183, 220)',
        'rgb(103, 183, 220)'
        ],
        borderColor: [
        'rgb(103, 183, 220)',
        'rgb(103, 183, 220)',
        'rgb(103, 183, 220)',
        'rgb(103, 183, 220)',
        'rgb(103, 183, 220)',
        'rgb(103, 183, 220)'
        ],
        borderWidth: 1
    }]
    },
    options: {
        legend: { display: false },
        scales: {
            yAxes: [{
                ticks: {
                beginAtZero: true
                }
            }]
        }
    }
});