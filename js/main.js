class Checker {

    init() {

        jQuery(document).ready(() => {

            this.setEvents();

        });
    }

    setEvents() {

        jQuery('#new-btn').on('click', () => {

            this.createNewLine();

        });

        jQuery('#fields').on('click', '.remove-btn', (e) => {

            this.removeLine(e);

        });

        jQuery('#check-btn').on('click', () => {

            this.CheckUrls();

        });
    }

    createNewLine() {

        var id = jQuery(".url-input").last().data("id");

        id++;

        var html = '<div class="input-group mt-2">' +
                '<div class="input-group-prepend">' +
                ' <span class="input-group-text" id="basic-addon1">Web url</span>' +
                ' </div>' +
                '<input type="text" class="form-control url-input" placeholder="url" data-id="' + id + '">' +
                '<button type="button" class="btn btn-danger ml-2 remove-btn">Remove</button>' +
                ' </div>';

        jQuery('#fields').append(html);
    }

    removeLine(e) {

        var self = e.currentTarget;

        var element = jQuery(self).parent().find('.url-input').data("id");

        if (element != 1 && element) {

            jQuery(".url-input[data-id='" + element + "']").parent().remove();
        }
    }

    CheckUrls() {

        var elements = jQuery('.url-input');

        var searchingElements = new Array();

        jQuery.each(elements, (key, object) => {

            if (jQuery(object).val() != "") {

                var line = {'id': jQuery(object).data("id"),
                    'url': jQuery(object).val()};

                searchingElements.push(line);
            }

        });

        console.log("searchingElements: ", searchingElements);

        this.ajaxRun(searchingElements);

    }

    ajaxRun(objects) {

        var count1 = objects.length;

        var count2 = 0;

        var response = new Array();

        if (count1) {

            this.loadingInfo();

            jQuery.each(objects, (key, object) => {

                jQuery.ajax({
                    type: 'POST',
                    url: 'php/Api.php',
                    data: {'url': object.url},
                    dataType: 'json',

                    success: (data, textStatus, xhr) => {

                        response.push(data);
                        count2++;

                        if (count2 == count1) {

                            this.responseHandler(response);
                        }

                    },
                    error: function (request, status, error) {

                        jQuery('.response').html("");

                        console.log("internal error: someting get wrong!");

                        window.alert("internal error: someting get wrong!");
                    }

                });

            });

        }

    }

    responseHandler(response) {

        console.log(" == RESPONSE == ");

        var html = "";

        jQuery.each(response, (key, value) => {

            console.log("value.code: ", value.code);
            console.log("value.redirect: ", value.redirect);
            console.log("value.url: ", value.url);

            if (value.code == 404) {
                html += ('url: ' + value.url + ' ======== code: ' + value.code + ' ======== wrong url typed! ' + '<br/>');
            } else {
                if (value.redirect != value.url) {
                    html += ('url: ' + value.url + ' ======== code: ' + value.code + ' ======== redirection: ' + value.redirect + '<br/>');
                } else {
                    html += ('url: ' + value.url + ' ======== code: ' + value.code + ' ======== no redirection' + '<br/>');
                }
            }

        });
        jQuery('.response').html("");
        jQuery('.response').append("<h3>Response:</h3>");
        jQuery('.response').append(html);


    }

    loadingInfo() {
        jQuery('.response').html("");
        jQuery('.response').append("<h3>Fetching data please wait...</h3>");
    }
}
var checker = new Checker();
checker.init();


