var pulzar_grammar = {
        
// prefix ID for regular expressions used in the grammar
"RegExpID"                          : "RE::",
    
"Extra"                             : {
    
    "fold"                          : "brace"

},
    
// Style model
"Style"                             : {
    
     "comment"                      : "comment"
    ,"atom"                         : "atom"
    ,"keyword"                      : "keyword"
    ,"this"                         : "keyword"
    ,"builtin"                      : "builtin"
    ,"operator"                     : "operator"
    ,"identifier"                   : "variable"
    ,"property"                     : "attribute"
    ,"number"                       : "number"
    ,"string"                       : "string"
    ,"regex"                        : "string-2"
    
},

// Lexical model
"Lex"                               : {
    
     "comment"                      : {"type":"comment","tokens":[
                                    // line comment
                                    // start, end delims  (null matches end-of-line)
                                    [  "\\",  null ],
                                    // block comments
                                    // start,  end    delims
                                    [  "|**",   "**|" ]
                                    ]}
    ,"identifier"                   : "RE::/[_A-Za-z$][_A-Za-z0-9$]*/"
    ,"this"                         : "RE::/this\\b/"
    ,"property"                     : "RE::/[_A-Za-z$][_A-Za-z0-9$]*/"
    ,"number"                       : [
                                    // floats
                                    "RE::/\\d*\\.\\d+(e[\\+\\-]?\\d+)?/",
                                    "RE::/\\d+\\.\\d*/",
                                    "RE::/\\.\\d+/",
                                    // integers
                                    // hex
                                    "RE::/0x[0-9a-fA-F]+L?/",
                                    // binary
                                    "RE::/0b[01]+L?/",
                                    // octal
                                    "RE::/0o[0-7]+L?/",
                                    // decimal
                                    "RE::/[1-9]\\d*(e[\\+\\-]?\\d+)?L?/",
                                    // just zero
                                    "RE::/0(?![\\dx])/"
                                    ]
    ,"string"                       : {"type":"escaped-block","escape":"\\","tokens":
                                    // start, end of string (can be the matched regex group ie. 1 )
                                    [ "RE::/(['\"])/",   1 ]
                                    }
    ,"regex"                        : {"type":"escaped-block","escape":"\\","empty":false,"tokens":
                                    // javascript literal regular expressions can be parsed similar to strings
                                    [ "/",    "RE::#/[gimy]{0,4}#" ]
                                    }
    ,"operator"                     : {"tokens":[
                                    "+", "-", "++", "--", "mod", ">>", "<<", ">>>",
                                    "*", "/", "**", "|", "&", "!", "~",
                                    ">", "<", "<=", ">=", "!=", "!==",
                                    "=", "==", "===", "+=", "-=", "%=",
                                    ">>=", ">>>=", "<<=", "*=", "/=", "|=", "&="
                                    ]}
    ,"delimiter"                    : {"tokens":[
                                    "(", ")", "[", "]", "{", "}", ",", "=", ";", "?", ":",
                                    "+=", "-=", "*=", "/=", "%=", "&=", "|=", "^=", "++", "--",
                                    ">>=", "<<="
                                    ]}
    ,"atom"                         : {"autocomplete":true,"tokens":[
                                    "True", "False", 
                                    "None", "undefined",
                                    ]}
    ,"keyword"                      : {"autocomplete":true,"tokens":[ 
                                    "Program","if", "while", "with", "else", "do", "try", "finally",
                                    "return", "break", "continue", "new", "delete", "throw",
                                    "var", "const", "let", "func", "catch", "void",
                                    "for", "switch", "case", "default", "class", "import", "yield",
                                    "in", "typeof", "instanceof"
                                    ]}
    ,"builtin"                      : {"autocomplete":true,"tokens":[ 
                                    "echo", "print", "factorial"
                                    ]}

},

// Syntax model (optional)
"Syntax"                            : {
    
    "pulzar"                   : {"sequence":[".", "property"]}

},

// what to parse and in what order
"Parser"                            : [
                                    "comment",
                                    "number",
                                    "string",
                                    "regex",
                                    "keyword",
                                    "operator",
                                    "atom",
                                    [ "'}' | ')' | this | builtin | identifier | dotProperty", "dotProperty*" ]
                                    ]

};
