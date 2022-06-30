$(document).ready(function () {
    $("#productType").change(function () {
        $(".Book").hide(); $(".Furniture").hide();$(".DVD").hide();
        var inputVal = $(this).val();
        var div = $("." + inputVal);
      
        $(div).show();
    });
});