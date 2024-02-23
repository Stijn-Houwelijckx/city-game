const addFellowBtn = document.querySelector(".add-fellow");
const fellowsContainer = document.querySelector("#fellows");
const inputBox = fellowsContainer.querySelector(".input-box");

const startBtn = document.querySelector(".btn");
const errMsg = document.querySelector(".error-message");

let fellowInputs = document.querySelectorAll(".fellow-name");

let fellowCount = 1; // Initialize the fellow count
let maxFellowCount = 6;

addFellowBtn.addEventListener("click", function (e) {
  if (fellowCount >= maxFellowCount) {
    errMsg.style.visibility = "visible";
    errMsg.innerHTML = "You can only add " + maxFellowCount + " fellows.";
  } else {
    const clone = inputBox.cloneNode(true);

    // Update label
    fellowCount++;
    const label = clone.querySelector("label");
    label.textContent = "Fellow " + fellowCount + " (firstname + lastname)";

    // Generate a unique id for the input field
    const input = clone.querySelector("input");
    const inputId = "fellowname" + fellowCount;
    input.id = inputId;
    input.value = "";

    // Update the "for" attribute of the label to match the new input id
    label.setAttribute("for", inputId);

    // Insert the cloned input box after the last one
    fellowsContainer.insertAdjacentHTML("beforeend", clone.outerHTML);

    fellowInputs = document.querySelectorAll(".fellow-name");
  }
});

// ===========================================================================

// startBtn.addEventListener("click", function (btnEvent) {
//   var reValid = /^(?!.*\s\s)[A-Za-z-]+( [A-Za-z-]+)*$/;
//   let isValid = true;

//   console.log("startBtn click event triggered");
//   console.log("Number of fellowInputs: " + fellowInputs.length);

//   fellowInputs.forEach(function (e) {
//     if (e.value === "") {
//       errMsg.style.visibility = "visible";
//       errMsg.innerHTML = "Name cannot be empty";

//       e.style.borderColor = "red";

//       isValid = false;

//       //   btnEvent.preventDefault();
//     } else if (!reValid.test(e.value)) {
//       errMsg.style.visibility = "visible";
//       errMsg.innerHTML =
//         "Choose a valid name. (Letters, spaces and '-' allowed)";

//       e.style.borderColor = "red";

//       isValid = false;

//       //   btnEvent.preventDefault();
//     } else {
//       e.style.borderColor = "#fafafa";
//     }

//     if (isValid === false) {
//       btnEvent.preventDefault();
//     } else {
//       errMsg.style.visibility = "hidden";
//     }
//   });
// });
