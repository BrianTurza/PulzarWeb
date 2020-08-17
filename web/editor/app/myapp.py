from flask import Flask, render_template, request

import os
import sys
import time

from lexer import Lexer
from mparser import Parser
from generator import Generation

def proccess(code, shell=False, tools=True):
    if shell == True:
        shell.shell()
    #If file doesnt have .plz file extension, it will raise an error

    # Looks for second argument
    if tools == False:
        lex = Lexer(code)
        tokens = lex.tokenize()
        #Parser
        parse = Parser(tokens,False)
        ast = parse.parse(tokens)
        obj = Generation(ast)
        gen = obj.generate()

        return gen
    else:
        output = "ORIGINAL CODE:\n"
        output += code + "\n"
        #Lexer
        output += "-------------- LEXICAL ANALYSYS ---------------------\n"
        lex = Lexer(code)

        tokens = lex.tokenize()
        output += str(tokens) + "\n"
        #Parser
        output += 22*"-" + " PARSER " + 22*"-" +"\n"

        parse = Parser(tokens,True)
        ast = parse.parse(tokens)
        output += "Abstract Syntax Tree:\n"
        output += str(ast) + "\n"
        output += 17*"-" + "CODE GENERATION" + 18*"-" + "\n"
        obj = Generation(ast)
        gen = obj.generate()
        output += str(gen) + "\n"
        output += "#"*21 + "OUTPUT" + "#"*21 + "\n"


        return [output + "\n", gen]

app = Flask(__name__)

@app.route('/', methods=['post', 'get'])
def main():

    if request.method in ['POST', 'GET']:
        code = request.form.get('code')
        tools = request.form.get('tools')

        if tools == "on": tools = True
        else: tools = False

        if code == None:
            return render_template('index.html', output='', code="Program Console;\nint x = 5;\necho x ** 2;")

        else:
            start = time.time()
            if tools == False:
                output = proccess(code, shell=False, tools=tools)
            else:
                output, gen = proccess(code, shell=False, tools=tools)

            end = time.time()
            t = end - start
            exec_time = "\nExecuted in :{} seconds".format (t)
            print(output)
            return render_template('index.html', output=output, code=code, gen=output, exec_time=exec_time)

if __name__ == "__main__":
    app.debug = True
    app.run(host='0.0.0.0', port=4000)
