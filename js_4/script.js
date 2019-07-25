/*
field = document.createElement("div");
field.innerHTML = "field";
document.body.insertBefore(field);*/
let field = document.createElement('div');
field.className = "field";
document.body.appendChild(field);

createBox(264);


function createBox(cnt) {
    let box = document.createElement('div');
    for (i = 0; i < cnt; i++){
        let box = document.createElement('div');
        box.className = "box";
        field.appendChild(box);

    }
}


