$(document).ready(function () {
    function enableInput(radio, input)
    {
        $('.'+radio).click(function () {
            $('.myforms').attr('disabled', 'disabled').val('');
            $('.'+input).removeAttr('disabled');
        });
    }
   enableInput('car', 'select-car');
   enableInput('home', 'select-home');
   enableInput('jobs', 'select-jobs');
   enableInput('specCar', 'select-s-car');
   enableInput('service', 'select-service');
   enableInput('animal', 'select-animal');
   enableInput('acsses', 'select-acsses');
   enableInput('elect', 'select-elect');
});
