import time

def brainfuck(code):
    loopNumber = 0
    start = time.time()
    i = 0
    variable = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
    pointeur = 0
    returner = ""
    if code.count('[') != code.count(']'):
        return "ERROR : a loop is not closed"
    while i != (len(code)):
        if (time.time() - start) > 2:
            returner += "\nERROR : the code does not stink be finished\n your code can be wrong optimize"
            return returner
        if code[i] == "+":
            variable[pointeur] = variable[pointeur] + 1
        if code[i] == "-":
            variable[pointeur] = variable[pointeur] - 1
        if code[i] == ">":
            if (pointeur + 1) > (len(variable) - 1):
                return "ERROR : variable limit to exceed"
            else:
                pointeur += 1
        if code[i] == "<":
            if (pointeur - 1) < 0:
                return "ERROR : the pointer can not be below 0"
            else:
                pointeur -= 1
        if code[i] == ".":
            returner += chr(variable[pointeur])
        if code[i] == ",":
            returner += str(variable[pointeur])
        if code[i] == "]":
            if variable[pointeur] != 0:
                loopNumber = 1
                while loopNumber !=0:
                    i -= 1
                    if code[i] == "[":
                        loopNumber -= 1
                    elif code[i] == "]":
                        loopNumber += 1
        i += 1
    return returner

quitBrainfuck = False
while quitBrainfuck == False:
    code = input("Brainfuck code : ")
    print(brainfuck(code))
    tmp = input("do you want to leave? [Yes/No] : ")
    if tmp.upper() == "YES":
        quitBrainfuck = True