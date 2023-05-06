$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    $('.festival_start_date').pDatepicker(
        {
            viewMode: 'year/month/day',
            format: 'YYYY/MM/DD',
        }
    );
    $('.publicationYear').pDatepicker(
        {
            viewMode: 'year',
            format: 'YYYY',
            "initialValue": true,
            "minDate": null,
            "maxDate": null,
            "autoClose": true,
            "position": "auto",
            "altFormat": "lll",
            "onlyTimePicker": false,
            "onlySelectOnDate": false,
            "calendarType": "persian",
            "inputDelay": 800,
            "observer": false,
            "calendar": {
                "persian": {
                    "locale": "fa",
                    "showHint": false,
                    "leapYearMode": "algorithmic"
                },
                "gregorian": {
                    "locale": "en",
                    "showHint": false
                }
            },
            "navigator": {
                "enabled": true,
                "scroll": {
                    "enabled": true
                },
                "text": {
                    "btnNextText": "<",
                    "btnPrevText": ">"
                }
            },
            "timePicker": {
                "enabled": false,
                "step": 1,
                "hour": {
                    "enabled": false,
                    "step": null
                },
                "minute": {
                    "enabled": false,
                    "step": null
                },
                "second": {
                    "enabled": false,
                    "step": null
                },
                "meridian": {
                    "enabled": false
                }
            },
            "dayPicker": {
                "enabled": false,
                "titleFormat": "YYYY MMMM"
            },
            "monthPicker": {
                "enabled": false,
                "titleFormat": "YYYY"
            },
            "yearPicker": {
                "enabled": true,
                "titleFormat": "YYYY"
            },

        }
    );
})