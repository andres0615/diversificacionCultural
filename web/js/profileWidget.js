$(document).ready(function(){
    $('#li-profile').click(function(e){
        e.preventDefault();
    });

    var profile_content = null;

    $.ajax({
        type: "POST",
        url: $('#li-profile').data('profwidget'),
        dataType: 'html',
        async: false,
        success: function(data) {
            profile_content = data;
        },
        error: function(){
            console.log('error');
        },
        timeout: 10000
    });

    $('#li-profile').tooltipster({
        content: profile_content,
        contentAsHTML: true,
        trigger: 'click',
        theme: 'tooltipster-custom-template1',
        position: 'bottom-right',
        interactive: true
    });
});