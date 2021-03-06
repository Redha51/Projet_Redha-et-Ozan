// Function pour le select
$(document).ready(function(){
    $('select').formSelect();

    // Function pour la date
    $('.datepicker').datepicker({
      format: 'yyyy/mm/dd',
      selectMonths: true,
    });

    // Function pour l'alerte inscription
    $('#alert_close').click(function(){
      $( "#alert_box" ).fadeOut( "slow", function() {
      });
    });

    // Function pour la taille max du texte
    jQuery('textarea#comment').characterCounter();

  });
  
// Function pour le sidebar
document.addEventListener('DOMContentLoaded', function(){
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, {});
    });

// Function pour la checkbox
var btn = document.getElementById("sendbtn");
var check = document.getElementById("checkbox");
btn.disabled = true;

function activation(){
    if(check.checked === true){
        btn.disabled = false;
    }
    else
    {
        btn.disabled = true;
    }
}




