// select the file input element
// add an event listener for the change event
// inside the listener: 
//      check if a file is selected
//      if yes, show the filename in the empty p
//      if no, show another message

const fileInput = document.querySelector("#myFile");
const selectedFile = document.querySelector('#selectedFile');

fileInput.addEventListener("change", () => {
    if(fileInput.files.length > 0){
        const fileName = fileInput.files[0].name;
        selectedFile.textContent = `Selected file: ${fileName}`;
    }else{
        selectedFile.textContent = "No file selected";
    }
})
