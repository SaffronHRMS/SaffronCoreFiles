<script type="text/javascript" src="jquery-1.3.2.js"></script>
function callAJAX(url, pageElement, callMessage)
{
$(document).ready(function(){
  $("form").submit(function(){
    alert("Submitted");
  });

  $('#personal_btn').click(function()
  {
    $('#waiting').show(500);
    //$('#emp_personal').hide(0);
    $('#message').hide(0);

    $.ajax(
    {
      type : 'POST',
      url : 'http://local.tech.com/index.php/hrms_emp_detail_controller',
      dataType : 'json',
      data: 
      {
        fname : $('#fname').val(),
        mname : $('#mname').val(),
        lname : $('#lname').val(),
        gender : $('#gender').val(),
        dob : $('#popupDatepicker').val(),
        marital : $('#marital').val(),
        nationality : $('#nationality').val()
      },
      success : function(data)
      {
        $('#waiting').hide(500);
        $('#message').removeClass().addClass((data.error === true) ? 'error' : 'success')
        .text(data.msg).show(500);
        
      /*  if (data.error === true)
        $('#emp_personal').show(500);
      */},
      error : function(XMLHttpRequest, textStatus, errorThrown)
      {
        $('#waiting').hide(500);
        $('#message').removeClass().addClass('error')
        .text('Something goes wrong !!').show(500);
        $('#emp_personal').show(500);
      }
    });
    return false;
  });
});
}
/*
function callAJAX(url, pageElement, callMessage) {
      //document.getElementById(pageElement).innerHTML = callMessage;
      
      var fn=document.getElementById("fname");
      var ln=document.getElementById("lanme");
      try {
        req = new XMLHttpRequest(); /* e.g. Firefox */
/*      } catch(e) {
          try {
          req = new ActiveXObject("Msxml2.XMLHTTP");
*/   /* some versions IE */
  /*        } catch (e) {
              try {
              req = new ActiveXObject("Microsoft.XMLHTTP");
*/  /* some versions IE */
 /*             } catch (E) {
                 req = false;
              }
          }
      }
 
      req.onreadystatechange = function() {responseAJAX(pageElement);};
    req.open("POST",url,true);
      req.send();
 
  }

function responseAJAX(pageElement) {
    var output = 'success';
    if(req.readyState == 4) {
         if(req.status == 200) {
              output = req.responseText;
              //document.getElementById(pageElement).innerHTML = output;
            }
       }
   }
*/