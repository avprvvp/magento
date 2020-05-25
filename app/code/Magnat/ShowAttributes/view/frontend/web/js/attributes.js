define(['jquery'], function ($) {
    return function (config, element) {
        var attributes = $(".data.table.additional-attributes").find(".col.label");
        console.log('count of attributes: ', attributes.length);
    };
});
