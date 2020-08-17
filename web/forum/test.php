<?php require 'address.php'; /* Tam je premmena $address */ ?>
<?php
if (isset($_GET['submit'])) {
    $input = $_GET['input'];
    if (ord($input[0]) == 32) {
        $input = str_replace("    ", "\t", $input[0]);
        echo $input;
    }
}  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
<link rel="stylesheet" href="<?php echo $address ?>css/bootstrap-4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $address ?>css/font-awesome-5.11.2/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $address ?>css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo $address ?>web/docs/code.css">
</head>
<body>
    <form action="test.php">
        <textarea name="input" id="" cols="30" rows="10"></textarea><br>
        <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
    </form>
    <div>
</div>
<script>
HTMLTextAreaElement.prototype.getCaretPosition = function () { //return the caret position of the textarea
    return this.selectionStart;
};
HTMLTextAreaElement.prototype.setCaretPosition = function (position) { //change the caret position of the textarea
    this.selectionStart = position;
    this.selectionEnd = position;
    this.focus();
};
HTMLTextAreaElement.prototype.hasSelection = function () { //if the textarea has selection then return true
    if (this.selectionStart == this.selectionEnd) {
        return false;
    } else {
        return true;
    }
};
HTMLTextAreaElement.prototype.getSelectedText = function () { //return the selection text
    return this.value.substring(this.selectionStart, this.selectionEnd);
};
HTMLTextAreaElement.prototype.setSelection = function (start, end) { //change the selection area of the textarea
    this.selectionStart = start;
    this.selectionEnd = end;
    this.focus();
};

var textarea = document.getElementsByTagName('textarea')[0]; 

textarea.onkeydown = function(event) {
    
    //support tab on textarea
    if (event.keyCode == 9) { //tab was pressed
        var newCaretPosition;
        newCaretPosition = textarea.getCaretPosition() + "    ".length;
        textarea.value = textarea.value.substring(0, textarea.getCaretPosition()) + "    " + textarea.value.substring(textarea.getCaretPosition(), textarea.value.length);
        textarea.setCaretPosition(newCaretPosition);
        return false;
    }
    if(event.keyCode == 8){ //backspace
        if (textarea.value.substring(textarea.getCaretPosition() - 4, textarea.getCaretPosition()) == "    ") { //it's a tab space
            var newCaretPosition;
            newCaretPosition = textarea.getCaretPosition() - 3;
            textarea.value = textarea.value.substring(0, textarea.getCaretPosition() - 3) + textarea.value.substring(textarea.getCaretPosition(), textarea.value.length);
            textarea.setCaretPosition(newCaretPosition);
        }
    }
    if(event.keyCode == 37){ //left arrow
        var newCaretPosition;
        if (textarea.value.substring(textarea.getCaretPosition() - 4, textarea.getCaretPosition()) == "    ") { //it's a tab space
            newCaretPosition = textarea.getCaretPosition() - 3;
            textarea.setCaretPosition(newCaretPosition);
        }    
    }
    if(event.keyCode == 39){ //right arrow
        var newCaretPosition;
        if (textarea.value.substring(textarea.getCaretPosition() + 4, textarea.getCaretPosition()) == "    ") { //it's a tab space
            newCaretPosition = textarea.getCaretPosition() + 3;
            textarea.setCaretPosition(newCaretPosition);
        }
    } 
}
</script>
</body>
</html>