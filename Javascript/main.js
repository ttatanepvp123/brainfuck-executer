function countChar(str, Mychar) {//I do not know the function so I do it
    var returner = 0;
    for (let index = 0; index < str.length; index++) {
        if (str[index] == Mychar) {
            returner += 1;
        }
    }
    return returner;
}

function brainfuck(code) {
    var loopNumber = 0;
    var d = new Date();
    var start = (d.getTime() / 10);
    var variable = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
    var pointeur = 0;
    var returner = "";
    if(countChar(code, '[') != countChar(code, ']')){
        return "ERROR : a loop is not closed";
    }
    for (let i = 0; i < code.length; i++) {
        if(((d.getTime() / 10) - start) > 2){
            returner += "\nERROR : the code does not stink be finished\n your code can be wrong optimize";
            return returner;
        } else if(code[i] == "+"){
            variable[pointeur] = variable[pointeur] + 1;
        } else if (code[i] == "-"){
            variable[pointeur] = variable[pointeur] - 1;
        } else if (code[i] == ">"){
            if ((pointeur + 1) > variable.length){
                return "ERROR : variable limit to exceed";
            } else {
                pointeur += 1;
            }
        } else if (code[i] == "<"){
            if ((pointeur - 1) < 0){
                return "ERROR : the pointer can not be below 0";
            } else {
                pointeur -= 1;
            }
        } else if (code[i] == ".") {
            returner += String.fromCharCode(variable[pointeur]);
        } else if (code[i] == ","){
            returner += variable[pointeur].toString();
        } else if (code[i] == "]"){
            if (variable[pointeur] != 0){
                loopNumber = 1;
                while (loopNumber != 0){
                    i -= 1;
                    if (code[i] == ']') {
                        loopNumber += 1;
                    } else if (code[i] == '[') {
                        loopNumber -= 1;
                    }
                }
            }
        }
    }
    return returner;
}
