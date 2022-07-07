$(document).ready(function () {
  
    $("#productType").change(function () {
        $(".weight").hide(); $(".height").hide();$(".size").hide();
        var inputVal = $(this).val();
        if(inputVal!="Choose..."){
        var div = $("." + inputVal);
        $(div).show();
    }
    });

});


