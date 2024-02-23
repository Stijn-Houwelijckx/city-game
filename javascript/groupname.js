const input = document.querySelector("#groupname");
const output = document.querySelector(".group-name");
const outputContainer = document.querySelector(".output-container");

const createBtn = document.querySelector(".btn");
const errMsg = document.querySelector(".error-message");

function resize_to_fit() {
  let fontSize = window.getComputedStyle(output).fontSize;
  output.style.fontSize = parseFloat(fontSize) - 1 + "px";

  if (output.clientHeight >= outputContainer.clientHeight) {
    resize_to_fit();
  }
}

function processInput() {
  console.log(input.value.length);

  if (input.value.length <= 50) {
    output.innerHTML = this.value;
    output.style.fontSize = "36px"; // Default font size

    resize_to_fit();
  }
}

input.addEventListener("input", processInput);

// ===========================================================================

// createBtn.addEventListener("click", function (e) {
//   // var reSpaces = /^\s|\s$/;
//   var reValid = /^(?!.*\s\s)[A-Za-z0-9-]+( [A-Za-z0-9-]+)*$/;

//   if (input.value === "") {
//     errMsg.style.visibility = "visible";
//     errMsg.innerHTML = "Name cannot be empty";

//     input.style.borderColor = "red";

//     e.preventDefault();
//   } else if (!reValid.test(input.value)) {
//     // console.log("Fout");
//     errMsg.style.visibility = "visible";
//     errMsg.innerHTML =
//       "Choose a valid name. (Letters, numbers, spaces and '-' allowed)";

//     input.style.borderColor = "red";

//     e.preventDefault();
//   } else {
//     errMsg.style.visibility = "hidden";
//   }
// });
