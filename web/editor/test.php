<html> 
<head> 
<script src="js/jquery.min.js" type="text/javascript"></script> 
<script src="js/skulpt.min.js" type="text/javascript"></script> 
<script src="js/skulpt-stdlib.js" type="text/javascript"></script> 

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="codemirror/codemirror.css">
    <link rel="stylesheet" href="codemirror/addon/lint/lint.css">
    <link rel="stylesheet" href="codemirror/theme/material-darker.css">
    <link rel="stylesheet" href="codemirror/addon/hint/show-hint.css">
    <link rel="stylesheet" href="codemirror/addon/fold/foldgutter.css" />
    <style type="text/css">
        body {
            position: relative;
        }

        .CodeMirror {
            margin: 0;
            position: relative;
            width: 100%;
            height: 100%;
            min-width:500px;
            min-height:500px;
        }
    </style>

    <script src="codemirror/codemirror.js"></script>
    <script src="codemirror/addon/comment/comment.js"></script>
    <script src="codemirror/addon/lint/lint.js"></script>
    <script src="codemirror/addon/hint/show-hint.js"></script>
    <script src="codemirror/addon/fold/foldcode.js"></script>
    <script src="codemirror/addon/fold/foldgutter.js"></script>
    <!--<script src="codemirror/addon/fold/comment-fold.js"></script>-->
    <!--<script src="codemirror/addon/fold/brace-fold.js"></script>-->
    <script src="js/codemirror_grammar.js"></script>
    <script src="grammars/pulzar.js"></script>
    <script src="js/demo.js"></script>
    </head>

<body>
<?PHP
$width = "<script>var windowWidth = screen.width; document.writeln(windowWidth); </script>";
$height = "<script>var windowHeight = screen.height; document.writeln(windowHeight); </script>"; 

echo '<div align="right"><h5> Resolution : '.$width.' x '.$height.'</h5></div>';
?>
<div style="margin-left:10%;">
<form method="post" action="test.php"> 
    <button type="submit" id="submit" class="btn btn-success">Submit</button>
    <div style="border: 1px solid black; width: 90%">
<textarea id="code" name="code">
Program Console;
        
echo "hello world";
int x;
for x :: x < 10 :: ++x {
    echo x ** 2;
}
func hello(str name) {
    return "Hello" + "\s" + name;
}
hello : "Brian";
complex a = (5i + 3) * (14 - 3i);
echo a;
</textarea>
</form>
    </div>
    <div style="width:90%;height:300px;resize:both;border: 2px solid black;" name="targetCode"  id="targetCode"></div>
</div>
<script>
        // <![CDATA[
        codemirror_grammar_demo(document.getElementById("code"), [
            {
                language : "pulzar", 
                grammar : pulzar_grammar,
                theme: 'material-darker',
            }
        ]);
        // ]]>
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery.terminal/js/jquery.terminal.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/jquery.terminal/css/jquery.terminal.min.css" rel="stylesheet"/>
</body> 
</html> 