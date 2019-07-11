const set_session_var_form   = document.getElementById("set-session-var-form");
const unset_session_var_form = document.getElementById("unset-session-var-form");
const destroy_session_form   = document.getElementById("destroy-session-form");
const result_div             = document.getElementById("result-div");


/* =============================================================================
        Validate form data and send request to set the session variable
============================================================================= */


set_session_var_form.addEventListener('submit', (e) => {
  e.preventDefault();

  const elements        = e.target.elements;
  const session_key     = elements.session_key.value.trim();
  const session_value   = elements.session_value.value.trim();
  const set_session_var = elements.set_session_var.value.trim();

  //Some basic validation.
  if ( session_key === '' || session_value === '') {
    result_div.innerHTML = "<h3 style='color:rgb(200,0,0);'>Hey! You forgot to fill out part of the form!</h3>";
    return; //return early
  }

  //Construct a parameter string.
  const parameter_string = 'set_session_var=true&session_key=' + session_key + '&session_value=' + session_value;

  fetch('process.php', {
    method:  'POST',
    body:    parameter_string,
    headers: { "Content-Type": "application/x-www-form-urlencoded" }
  })
  .then(res => res.json())
  .then((data) => {
    result_div.innerHTML = "<h3>" + data.message + "</h3>";
  });
  //add a catch()...
});


/* =============================================================================
        Validate form data and send request to unset the session variable
============================================================================= */


unset_session_var_form.addEventListener('submit', (e) => {
  e.preventDefault();

  const elements          = e.target.elements;
  const session_key       = elements.session_key.value.trim();
  const unset_session_var = elements.unset_session_var.value.trim();


  //Some basic validation.
  if (session_key === '') {
    result_div.innerHTML = "<h3 style='color:rgb(200,0,0);'>You must enter a session variable to unset.</h3>";
    return; //return early.
  }

  //Construct a parameter string.
  const parameter_string = 'unset_session_var=' + unset_session_var + '&session_key=' + session_key;

  fetch('process.php', {
    method:  'POST',
    body:    parameter_string,
    headers: { "Content-Type": "application/x-www-form-urlencoded" }
  })
  .then(res => res.json())
  .then((data) => {
    result_div.innerHTML = "<h3>" + data.message + "</h3>";
  });
  //add a catch()...
});


/* =============================================================================
                    Send request to destroy the session
============================================================================= */


destroy_session_form.addEventListener('submit', (e) => {
  e.preventDefault();

  const elements        = e.target.elements;
  const destroy_session = elements.destroy_session.value.trim();

  //Construct a parameter string.
  const parameter_string = 'destroy_session=' + destroy_session;

  fetch('process.php', {
    method:  'POST',
    body:    parameter_string,
    headers: { "Content-Type": "application/x-www-form-urlencoded" }
  })
  .then(res => res.json())
  .then((data) => {
    result_div.innerHTML = "<h3>" + data.message + "</h3>";
  });
});
