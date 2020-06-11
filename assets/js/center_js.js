function format_number(n) {
    return parseFloat(n).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}

function blockUI(){
    let block = '<div class="display-block"><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
    if($('body .display-block').hasClass('display-block') === false) {
        $('body').prepend(block);
        $('.display-block').css({
            'width': '100%',
            'height': '100%',
            'position': 'fixed',
            'background-color': 'rgba(0, 0, 0, 0.4)',
            'top': 0,
            'display': 'flex',
            'justify-content': 'center',
            'align-items': 'center'
        }).addClass('zIndex');
    }
}

function unblockUI(sleep){
    sleep = typeof sleep === "undefined" ? 1000: sleep;
    setTimeout(function(){
        $('.display-block').remove();
    }, sleep);
}
