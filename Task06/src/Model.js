import {
    messageOutput,
    hangman
} from "./View.js";

export let
    block_greeting = document.getElementById("greeting"),
    block_information = document.getElementById("information"),
    block_showGame = document.getElementById("show-game"),
    block_message = document.getElementById("message"),
    block_result = document.getElementById("result"),
    canvas = document.getElementById("canvas"),
    block_resultText = document.getElementById("resultText"),
    btn_nextInfo = document.getElementById("nextInfo"),
    btn_nextShowGame = document.getElementById("nextShowGame"),
    btn_checkLetter = document.getElementById("checkLetter"),
    btn_replayGame = document.getElementById("replayGame"),
    field_name = document.getElementById("name"),
    field_getLetter = document.getElementById("getLetter"),
    text_info = document.getElementById("info"),
    progress,
    remainingLetters = [],
    spaces = "",
    attmepss,
    hidden_word,
    openLetters,
    words = ["лотерея","ключица","лошадка","флейта","лавочник","арбалетчик","спортзал","муляж","козерог","Мальдивы"];

let getLetter;

String.prototype.replaceAt=function(index, replacement) {
  return this.substr(0, index) + replacement+ this.substr(index + replacement.length);
}


export function checkLetter() {
    if (field_getLetter.value === "" || field_getLetter.value.length > 1) {
        alert("Введите одну букву!");
    } else{
        let tempCount = 0;
        getLetter = field_getLetter.value;
        for (let i = 0; i < remainingLetters.length; i++) {
            if (remainingLetters[i] === getLetter.toUpperCase()) {
                progress = progress.replaceAt(i + 1, getLetter.toUpperCase())
                remainingLetters = remainingLetters.replaceAt(i, " ");
                tempCount = tempCount + 1;
                openLetters = openLetters + 1;
            }
            
        }

        if(tempCount === 0){
            attmepss = attmepss - 1;
        }
        hangman(attmepss, progress);
        field_getLetter.value = "";
        if(openLetters === remainingLetters.length){
            messageOutput("win");
        }
    }
}

export function makeWord() {
    hidden_word = words[Math.floor(Math.random() * words.length)].toUpperCase();
    spaces = "";
    for(let i = 0; i < hidden_word.length-2; i++) {
        spaces += "_";
    }
    remainingLetters = [];
    progress = hidden_word[0] + spaces + hidden_word[hidden_word.length-1];
    for(let i = 0; i < hidden_word.length-2; i++) {
        remainingLetters += hidden_word[i + 1];
    }
    console.log(remainingLetters);
    attmepss = 6;
    openLetters = 0;
    hangman(6, progress);
}