const selectors = {
    dpInline: ".datepicker-inline",
    dpContainer: ".datepicker-container",
    dpToggler: ".datepicker-toggler",
    dpInput: ".datepicker-input",
    dpDayView: ".datepicker-days tbody"
};

const dpOptions = {
    format: "dd/mm/yyyy",
    //startDate: 'd',
    clearBtn: true,
    todayBtn: true,
    disableTouchKeyboard: true,
    multidate: false,
    todayHighlight: true,
    weekStart: 1,
    calendarWeeks: true,
    keyboardNavigation: false
};

$(document).ready(function() {
    const toggle = (datepicker) => {
        $(`#${datepicker} ${selectors.dpInline}`).hide();

        $(`#${datepicker} ${selectors.dpToggler}`).click(() => {
            $(`#${datepicker} ${selectors.dpInline}`).slideToggle();
        });

        $(`#${datepicker} ${selectors.dpInput}`).click(() => {
            $(`#${datepicker} ${selectors.dpInline}`).slideDown();
        });

        $(`#${datepicker} ${selectors.dpDayView}`).click(() => {
            $(`#${datepicker} ${selectors.dpInline}`).slideUp();
        });
    };

    $(selectors.dpContainer).datepicker(dpOptions);

    $(selectors.dpContainer).each((i, datepicker) => {
        toggle(datepicker.id);
    });
});