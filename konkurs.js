var word;
var count;
var numId;
var pos;

let words = [
  ["Выеб ", "города ", "и ", "заработал ", "денег "],
  ["Время ", "пострелять, ", "между ", "нами ", "пальба "],
  ["Мы ", "танцуем ", "у ", "бара ", "весь ", "день"],
  ["Ой, ", "как ", "намаялась ", "я ", "с ", "тобой "],
  ["Ночью ", "ехать ", "лень, ", "пробыл ", "до ", "утра "],
  ["Твоя ", "песенка ", "спета, ", "колонки ", "молчат "],
  ["Можно ", "даже ", "неба ", "коснуться ", "рукой "],
  ["Оказалось, ","вокруг ","тебя ","весь ","мир "],
  ["Каждому ","по ","факту ","рядом ","нужен ","человек "],
  ["Ее ","улыбка, ","мама, ","кругом ","голова "],
  ["Я ","от ","тебя ","письма ","не ","получаю "],
  ["Сам ","себе ","кричал: ","Ухожу ","навсегда "],
  ["Ще ","не ","вмерла ","Украина, ","если ","мы ","гуляем ","так! "],
  ["И ","без ","тебя ","мне ","никак "],
  ["Забуду ","имя ","любимое ","моё, ","твоё ","именно "],
  ["В ","конце ","пути ","ничего ","уже ","не ","вернуть "],
  ["Звук ","поставим ","на ","всю ","и ","соседи ","не ","спят "],
  ["Мне ","никогда ","не ","будет ","скучно ","с ","тобою "],
  ["Небо ","самолётам, ","а ","цензура ","для ","артиста "],
  ["Я ","просто ","делаю ","своё ","музло "],
  ["Пусть ","теперь ","нас ","никто ","не ","найдёт "],
  ["На ","баре ","синие, ","мы ","танцуем ","под "]
];

function change(id) {
  numId = Number(id);
  if (numId <= 5) {
    count = 0;
    pos = id-1;
  }
  else if (numId > 5 && numId <= 10) {
    count = 1;
    pos = id - words[count].length - 1;
  }
  else if (numId > 10 && numId <= 16) {
    count = 2;
    pos = id - words[count].length - 5;
  }
  else if (numId > 16 && numId <= 22) {
    count = 3;
    pos = id - words[count].length - 5 - 6;
  }
  else if (numId > 22 && numId <= 28) {
    count = 4;
    pos = id - words[count].length - 5 - 6 - 6;
  }
  else if (numId > 28 && numId <= 33) {
    count = 5;
    pos = id - 7 - 5 - 6 - 6 - 5;
  }
  else if (numId > 33 && numId <= 38) {
    count = 6;
    pos = id - 7 - 5 - 6 - 6 - 5 - 5;
  }
  else if (numId > 38 && numId <= 43) {
    count = 7;
    pos = id - 7 - 5 - 6 - 6 - 5 - 5 - 5;
  }
  else if (numId > 43 && numId <= 49) {
    count = 8;
    pos = id - 6 - 5 - 6 - 6 - 5 - 5 - 5 - 6;
  }
  else if (numId > 49 && numId <= 54) {
    count = 9;
    pos = id - 7 - 5 - 6 - 6 - 5 - 5 - 5 - 6 - 5;
  }
  else if (numId > 54 && numId <= 60) {
    count = 10;
    pos = id - 6 - 5 - 6 - 6 - 5 - 5 - 5 - 6 - 6 - 5;
  }
  else if (numId > 60 && numId <= 65) {
    count = 11;
    pos = id - 7 - 5 - 6 - 6 - 5 - 5 - 5 - 6 - 6 - 5-5;
  }
  else if (numId > 65 && numId <= 73) {
    count = 12;
    pos = id - 4 - 5 - 6 - 6 - 5 - 5 - 5 - 6 - 6 - 5-5-8;
  }
  else if (numId > 73 && numId <= 78) {
    count = 13;
    pos = id - 7 - 5 - 6 - 6 - 5 - 5 - 5 - 6 - 6 - 5-5-8-5;
  }
  else if (numId > 78 && numId <= 84) {
    count = 14;
    pos = id - words[count].length - 5 - 6 - 6 - 5 - 5 - 5 - 6 - 6 - 5-5-8-5-6;
  }
  else if (numId > 84 && numId <= 91) {
    count = 15;
    pos = id - 5 - 5 - 6 - 6 - 5 - 5 - 5 - 6 - 6 - 5-5-8-5-6-7;
  }
  else if (numId > 91 && numId <= 99) {
    count = 16;
    pos = id - 4 - 5 - 6 - 6 - 5 - 5 - 5 - 6 - 6 - 5-5-8-5-6-7-8;
  }
  else if (numId > 99 && numId <= 106) {
    count = 17;
    pos = id - 5 - 5 - 6 - 6 - 5 - 5 - 5 - 6 - 6 - 5-5-8-5-6-7-8-7;
  }
  else if (numId > 106 && numId <= 112) {
    count = 18;
    pos = id - words[count].length - 5 - 6 - 6 - 5 - 5 - 5 - 6 - 6 - 5-5-8-5-6-7-8-7-6;
  }
  else if (numId > 112 && numId <= 117) {
    count = 19;
    pos = id - 7 - 5 - 6 - 6 - 5 - 5 - 5 - 6 - 6 - 5-5-8-5-6-5-7-8-7-6;
  }
  else if (numId > 117 && numId <= 123) {
    count = 20;
    pos = id - words[count].length - 5 - 6 - 6 - 5 - 5 - 5 - 6 - 6 - 5-5-8-5-6-5-7-8-7-6-6;
  }
  else if (numId > 123 && numId <= 129) {
    count = 21;
    pos = id - words[count].length - 5 - 6 - 6 - 5 - 5 - 5 - 6 - 6 - 5-5-8-5-6-5-7-8-7-6-6-6;
  }
  word = words[count][pos];
  document.getElementById(id).innerHTML = word;
}
