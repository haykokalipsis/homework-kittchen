$(document).ready(function(){
    $(".center").slick({
        dots: false,
        infinite: true,
        centerMode: true,
        slidesToShow: 4,
        slidesToScroll: 2,
        arrows: true,
        /*nextArrow: '<button class="btn slick-next"><i class="fa fa-angle-right"></i></btn>',
        prevArrow: '<button class="btn slick-prev"><i class="fa fa-angle-left"></i></btn>'*/
    });


    $('#typeTable').click(function () {
        $('#typeTable').attr('class', 'btn btn-success chooseTypeBtn');
        $('#typeList').attr('class', 'btn btn-light chooseTypeBtn');
        $('.showProducts').attr('class','col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 showProducts');
        $('.advWindows').css('width','155px');
        $('.advWindImage').css('float', 'none').css('width', '155px');
        $('.advWindImage img').css('width', '155px');
        $('.advWindText').css('padding', '5px').css('width', '155px');
        $('.advWindText p').css('margin', '0 auto 1rem auto');
    });
    $('#typeList').click(function () {
        $('#typeList').attr('class', 'btn btn-success chooseTypeBtn');
        $('#typeTable').attr('class', 'btn btn-light chooseTypeBtn');
        $('.showProducts').attr('class','col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 showProducts');
        $('.advWindows').css('width','100%');
        $('.advWindImage').css('margin', '5px auto').css('width', '145px');
        $('.advWindImage img').css('width', '145px');
        $('.advWindText').css('padding-left', '20px').css('width', 'auto');
        $('.advWindText p').css('margin', '5px 0');
    });
    $('#catTable').click(function () {
        $('#catTable').attr('class', 'btn btn-success chooseTypeBtn');
        $('#catList').attr('class', 'btn btn-light chooseTypeBtn');
        $('.showProducts').attr('class','col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 showProducts');
        $('.advWindows').css('width','155px');
        $('.advWindImage').css('float', 'none').css('width', '155px');
        $('.advWindImage img').css('width', '155px');
        $('.advWindText').css('padding', '5px').css('width', '155px');
        $('.advWindText p').css('margin', '0 auto 1rem auto');
    });

    $('#catList').click(function () {
        $('#catList').attr('class', 'btn btn-success chooseTypeBtn');
        $('#catTable').attr('class', 'btn btn-light chooseTypeBtn');
        $('.showProducts').attr('class','col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 showProducts');
        $('.advWindows').css('width','100%');
        $('.advWindImage').css('margin', '5px auto').css('width', '145px');
        $('.advWindImage img').css('width', '145px');
        $('.advWindText').css('padding-left', '20px').css('width', 'auto');
        $('.advWindText p').css('margin', '5px 0');
    });
});
$(function(){
    $(".adClass").click(function () {
        $('#qnimate').addClass('popup-box-on');
    });

    $(".removClass").click(function () {
        $('#qnimate').removeClass('popup-box-on');
    });
});

let ind = false;
$('#ownPostEdit').click(function () {
    if (ind === false) {
        $('#headPost').removeAttr('disabled');
        $('#ownPostEdit>i').attr('class', 'fa fa-undo');
        ind = true;
    }
    else {
        $('#headPost').attr('disabled', 'disable');
        $('#ownPostEdit>i').attr('class', 'fa fa-pencil-square-o');
        ind = false;
    }
});

let indexControl = false;
$('#edit-control-button').click(function () {
    if (indexControl === false) {
        $('.myInputs').removeAttr('disabled');
        $('#postText').removeAttr('disabled');
        $('#edit-control-button').html('Отменить');
        indexControl = true;
    }
    else {
        $('.myInputs').attr('disabled', 'disable');
        $('#postText').attr('disabled', 'disable');
        $('#edit-control-button').html('Редактировать');
        indexControl = false;
    }
});

