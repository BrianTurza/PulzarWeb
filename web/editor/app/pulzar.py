"""
Pulzar 2018-19

#Author : Brian Turza
#Created : 14/9/2019
"""

import lexer
import parser
import generator
#from flash_shell.main import shell

import os
import platform
import sys
import time
#Check Platform
#If windows
if platform.system() == "Windows":
    os.system("title Pulzar v0.4")
#If linux or mac os
elif platform.system() == "linux" or platform.system() == "darwin":
    sys.stdout.write("\x1b]2; Pulzar v0.4\x07")

def main(code, shell=False, tools=True):
    if shell == True:
        shell.shell()
    #If file doesnt have .plz file extension, it will raise an error

    # Looks for second argument
    if tools == False:
        with open(sys.argv[1], "r") as f:
            code = f.read()
            #Lexer
            lex = lexer.Lexer(code)
            tokens = lex.tokenize()
            #Parser
            parse = parser.Parser(tokens,False)
            ast = parse.parse(tokens)
            obj = generator.Generation(ast)
            gen = obj.generate()
            output = exec(gen)
            return output

    else:
        with open(sys.argv[1], "r") as f:
            code = f.read()
        print("ORIGINAL CODE:")
        print(code)
        #Lexer
        print("-------------- LEXICAL ANALYSYS ---------------------\n")
        lex = lexer.Lexer(code)
                    
        tokens = lex.tokenize()
        print(tokens)
        #Parser
        print(22*"-" + " PARSER " + 22*"-")

        parse = mparser.Parser(tokens,True)
        ast = parse.parse(tokens)
        print("Abstract Syntax Tree:")
        print(ast)
        print(17*"-" + "CODE GENERATION" + 18*"-")
        obj = generator.Generation(ast)
        gen = obj.generate()
        print(gen)
        print("#"*21,"OUTPUT","#"*21)
        output = exec(gen)
        return output
#---------------------------------------------------------------------------
