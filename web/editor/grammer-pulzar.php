<html>
<head>
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
<div style="border: 1px solid black">
    <textarea id="code" name="code">
Program Console;
int x = 5;
float y = 2.5;
echo x ** y;
</textarea>
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
<script src="js/jquery.min.js"></script>
</body>
</html>