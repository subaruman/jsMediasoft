
function firstOperand() {
      oper1 = prompt("Введите первый операнд:");
    if (isNaN(oper1) === true) {
        alert("Ошибка! Повторите ввод.");
        return firstOperand();
    }
     else return(oper1);
}


function secOperand() {
    let oper2 = prompt("Введите операцию (+, -, *, /):", '');
    if ((oper2 === "+") || (oper2 === "-") || (oper2 === "*") || (oper2 === "/"))
    {
        return(oper2);
    }
    else {
        alert("Ошибка! Повторите ввод.");
       return  secOperand();
    }

}

function thirdOperand() {
    let oper3 = prompt("Введите второй операнд:", '');
    if (isNaN(oper3) === true) {
        alert("Ошибка! Повторите ввод.");
      return   thirdOperand();
    }
    return(oper3);
}

function Calculator(oper1, operation, oper2) {
    let total;
    if (operation === "+")
        total = Number(oper1) + Number(oper2);

    else if (operation === "-")
        total = Number(oper1) - Number(oper2);

    else if (operation === "*")
        total = Number(oper1) * Number(oper2);

    else if (operation === "/")
        total = Number(oper1) / Number(oper2);

    return total;
}


let variable1, variable2, variable3, variableTotal;
variable1 = firstOperand();
variable2 = secOperand();
variable3 = thirdOperand();
variableTotal = Calculator(variable1, variable2, variable3);
alert(variableTotal);