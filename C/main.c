#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include <string.h>
#define BUFFER_SIZE 250
#define SIZE_TABLE 20

int count(char* str, char myChar){
    int returner = 0;
    for(size_t i = 0; i < strlen(str); i++)
    {
        if (str[i] == myChar) {
            returner += 1;
        }
    }
    return returner;
}

int brainfuck(char* code, char* output){
    int variable[SIZE_TABLE] = {0};
    int pointer = 0;

    if (count(code, '[') != count(code, ']')) {
        code = "ERROR : a loop is not closed";
        return 1;
    }
    
    for(size_t i = 0; i < strlen(code); i++){
        if (code[i] == '+') {
            variable[pointer] ++;
        } else if (code[i] == '-') {
            variable[pointer] --;
        } else if (code[i] == '>') {
            if((pointer + 1) > SIZE_TABLE){
                code = "ERROR : variable limit to exceed";
                return 1;
            } else {
                pointer++;
            }
        } else if (code[i] == '<') {
            if((pointer - 1) < 0){
                code = "ERROR : the pointer can not be below 0";
                return 1;
            } else {
                pointer--;
            }
        } else if (code[i] == '.') {
            sprintf(output, "%s%c", output, variable[pointer]);
        } else if (code[i] == ',') {
            sprintf(output, "%s%d", output, variable[pointer]);
        } else if (code[i] == ']') {
            if (variable[pointer] != 0) {
                while(code[i] != '['){
                    i--;
                }
            } 
        }
    }
    return 0;
}

int main(int argc, char const *argv[])
{
    char code[BUFFER_SIZE] = {0};
    char output[BUFFER_SIZE] = {0};
    fgets(code, BUFFER_SIZE, stdin);
    brainfuck(code,output);
    printf("output : %s", output);
    return 0;
}
