(function(){
    "use strict";

    var menuLinkType = $("#menu-link-type");
    menuLinkType.off("change");
    menuLinkType.on("change", function(){
        $("#menu-module, #menu-content, #menu-url").hide();
        var menuType = $(this).val();
        $("#menu-" + menuType).show();
    });

    menuLinkType.trigger("change");
})();

