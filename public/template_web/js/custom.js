// Javascript to enable link to tab
if (location.hash) {
  $('a[href=\'' + location.hash + '\']').tab('show');
}
var activeTab = localStorage.getItem('activeTab');
if (activeTab) {
  $('a[href="' + activeTab + '"]').tab('show');
}

$('body').on('click', 'a[data-toggle=\'tab\']', function (e) {
  e.preventDefault()
  var tab_name = this.getAttribute('href')
  if (history.pushState) {
    history.pushState(null, null, tab_name)
  }
  else {
    location.hash = tab_name
  }
  localStorage.setItem('activeTab', tab_name)

  $(this).tab('show');
  return false;
});
$(window).on('popstate', function () {
  var anchor = location.hash ||
    $('a[data-toggle=\'tab\']').first().attr('href');
  $('a[href=\'' + anchor + '\']').tab('show');
});

// See All

function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("readBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "See All";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "See Less";
    moreText.style.display = "inline";
  }
}

// Payment Method Accordion
    $('input[name="payment_method"]').on('click', function () {
        var $value = $(this).attr('value');
        $('.payment-method-details').slideUp();
        $('[data-method="' + $value + '"]').slideDown();
    });

// Rating Select Star Method
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46156385-1', 'cssscript.com');
  ga('send', 'pageview');

$( document ).ready(function() {});
function AddCart(id){
    $.ajax({
        url: '/add-to-cart/'+id,
        type: 'GET',
    }).done(function(response) {
        RenderCart(response);
    });
}

$("#change-item-cart .si-close button").on("click", function () {
    $.ajax({
        url: '/del-cart/'+$(this).data("id"),
        type: 'GET',
    }).done(function(response) {
        RenderCart(response);
    });
});

function RenderCart(response){
    $("#change-item-cart").empty();
    $("#change-item-cart").html(response);
    $("#total-quanty-show").text($("#total-quanty-cart").val());
}

$(document).ready(function(){
    $('#qty_input').prop('disabled', true);
    $('#plus-btn').click(function(){
        $('#qty_input').val(parseInt($('#qty_input').val()) + 1 );
    });
    $('#minus-btn').click(function(){
        $('#qty_input').val(parseInt($('#qty_input').val()) - 1 );
        if ($('#qty_input').val() == 0) {
            $('#qty_input').val(1);
        }

    });
});
$('.ratings').rating(function(vote, event){
    let request = {
        rating: vote,
        product_id: $('#product_id').val()
    }
});
