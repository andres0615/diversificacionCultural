var playWaiting = false;
var lastCell = null;
function cellOver(dom)
{
  if (!playWaiting) {
    dom.style.background = 'rgba(255,255,255,.7)';
    lastCell = dom;
    $('#posx').html(dom.getAttribute("x"));
    $('#posy').html(dom.getAttribute("y"));
  }
}
function cellClear(dom)
{
  dom.style.background = '';
}
function disableAllCell()
{
  var string = 'string';
   console.log(string);
  $('#gridtable').addClass('clear');
  $('.playGameLink').each(function (i, obj) {
    obj.className = '';
  });
}
$(document).ready(function () {
  var ads = document.getElementsByClassName('afs_ads'), ad = ads[ads.length - 1];
  if (!ad || ad.innerHTML.length == 0 || ad.clientHeight === 0)
  {
    disableAllCell();
    $('#error_display').html('<r1>Please disable AdBlock and refresh to continue...</r1>');
  }
  $(document).delegate('.playGameLink', 'click', function (e) {
    e.preventDefault();
    lastCell.className = 'clicked';
    if (playWaiting)
      return;
    var url = $(this).attr('href'), x = lastCell.getAttribute("x"), y = lastCell.getAttribute("y");
    playWaiting = true;
    $.ajax({url: url, type: 'post', data: {x: x, y: y}, dataType: 'json', success: function (data) {
        if (data.error) {
          if (data.error === 'limit') {
            disableAllCell();           
          }
          else {
            $("#result").html('data.err_msg');
            $("#result").show();
            alert(data.err_msg);
          }
        } else {
          window.open(mtv.nonSslBaseUrl + 'member/paid_ads_interaction_' + data.adId + '.html', '_self');
          playWaiting = false;
        }
      }, error: function (jqXHR, textStatus, errorThrown) {
        console.log("AJAX error:" + textStatus);
        $('#result').html(errorThrown);
      }, complete: function () {
        playWaiting = false;
      }});
  })
});