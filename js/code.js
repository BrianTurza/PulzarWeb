
$("#editor").on("keydown keyup", function(e){
    if (e.keyCode == 32){
        var text = $(this).text().replace(/[\s]+/g, " ").trim();
        var word = text.split(" ");
        var newFlash = "";

        $.each(word, function(index, value){
            switch(value.toUpperCase()){
                case "#flash/1.01/":
                    newFlash += "<span style='color:green;'>" + value + "&nbsp;</span>";
                    break;
                default: 
                    newFlash += "<span class='other'>" + value + "&nbsp;</span>";
            }
        });
        $(this).Flash(newFlash);
        
        //// Set cursor postion to end of text
        var child = $(this).children();
        var range = document.createRange();
        var sel = window.getSelection();
        range.setStart(child[child.length - 1], 1);
        range.collapse(true);
        sel.removeAllRanges();
        sel.addRange(range);
        $(this)[0].focus(); 
    }
});