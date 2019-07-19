const films = [
    {
        title: 'The Green Mile',
        creationYear: 1999,
        country: ['USA'],
        budget: '$60 000 000',
        actors: [
            {
                name: 'Tom Hanks',
                age: 63,
                role: 'Paul Edgecomb',
            },
            {
                name: 'David Morse',
                age: 65,
                role: 'Brutus Howell',
            },
            {
                name: 'Michael Clarke Duncan',
                age: 54,
                role: 'John Coffey',
            },
        ],
        director: {
            name: 'Frank Darabont',
            age: 60,
            oscarsCount: 0,
        }
    },
    {
        title: 'Inception',
        creationYear: 2010,
        country: ['USA'],
        budget: '$160 000 000',
        actors: [
            {
                name: 'Leonardo DiCaprio',
                age: 44,
                role: 'Cobb',
            },
            {
                name: 'Joseph Gordon-Levitt',
                age: 38,
                role: 'Arthur',
            },
            {
                name: 'Ellen Page',
                age: 32,
                role: 'Ariadne',
            },
            {
                name: 'Tom Hardy',
                age: 41,
                role: 'Eames',
            },
        ],
        director: {
            name: 'Christopher Nolan',
            age: 48,
            oscarsCount: 0,
        }
    },
    {
        title: 'Forrest Gump',
        creationYear: 1994,
        country: ['USA'],
        budget: '$55 000 000',
        actors: [
            {
                name: 'Tom Hanks',
                age: 63,
                role: 'Forrest Gump',
            },
            {
                name: 'Robin Wright',
                age: 53,
                role: 'Jenny Curran',
            },
            {
                name: 'Sally Field',
                age: 72,
                role: 'Mrs. Gump',
            },
        ],
        director: {
            name: 'Robert Zemeckis',
            age: 68,
            oscarsCount: 1,
        }
    },
    {
        title: 'Interstellar',
        creationYear: 2014,
        budget: '$165 000 000',
        country: ['USA','Great Britain', 'Canada'],
        actors: [
            {
                name: 'Matthew McConaughey',
                age: 49,
                role: 'Cooper',
            },
            {
                name: 'Anne Hathaway',
                age: 36,
                role: 'Brand',
            },
            {
                name: 'Jessica Chastain',
                age: 42,
                role: 'Murph',
            },
            {
                name: 'Michael Caine',
                age: 86,
                role: 'Professor Brand',
            },
            {
                name: 'Matt Damon',
                age: 48,
                role: 'Mann',
            },
        ],
        director: {
            name: 'Christopher Nolan',
            age: 48,
            oscarsCount: 0,
        }
    },
    {
        title: 'Catch Me If You Can',
        creationYear: 2002,
        budget: '$52 000 000',
        country: ['USA', 'Canada'],
        actors: [
            {
                name: 'Tom Hanks',
                age: 63,
                role: 'Carl Hanratty',
            },
            {
                name: 'Leonardo DiCaprio',
                age: 36,
                role: 'Frank Abagnale Jr.',
            },
            {
                name: 'Christopher Walken',
                age: 76,
                role: 'Frank Abagnale',
            },
            {
                name: 'Amy Adams',
                age: 44,
                role: 'Brenda Strong',
            },
        ],
        director: {
            name: 'Steven Spielberg',
            age: 72,
            oscarsCount: 4,
        }
    },
];

averageAgeActors();
console.log("\n");
actorsWithHanks();
console.log("\n");
budgetFilms();



function averageAgeActors(){
    let avgAge = 0, i = 0;
    for (let key in films ){
        if (films[key].director.oscarsCount === 0){
            for (let cnt in films[key].actors) {
                avgAge +=  films[key].actors[cnt].age;
                i++;
            }
        }
    }
    avgAge = avgAge / i;
    console.log("Средний возраст актеров = " + Math.round(avgAge));
}



function actorsWithHanks() {
    console.log("Список актеров игравших с Хэнксом:");
    for (let key in films){
        for (let cnt in films[key].actors)
            if (films[key].actors[cnt].name === 'Tom Hanks' && films[key].creationYear > 1995){
                for (let cntAct in films[key].actors){
                    if (films[key].actors[cntAct].name !== 'Tom Hanks') {
                        console.log(films[key].actors[cntAct].name);
                    }
                }
            }
    }
}


function budgetFilms(){
    let sumBudget = 0, strBudget = "";
    let hanks = false;

    for (let key in films) {
        if (films[key].director.age < 70){
            hanks = false;
            for (let cnt in films[key].actors){
                if (films[key].actors[cnt].name === 'Tom Hanks'){
                    hanks = true;
                    break;
                } else  if (hanks === false) {
                    strBudget = parseInt(films[key].budget.replace(/\D+/g,""));
                    sumBudget += strBudget;
                    hanks = true;
                    break;
                }
            }
        }
    }
    console.log("Сумма бюджетов " + sumBudget);
}
