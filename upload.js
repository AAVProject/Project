window.onload = () => {

    const uploadFile = document.getElementById("upload_window");
    const uploadBtn = document.getElementById("upload_btn");

    uploadBtn.addEventListener("click", function () {
        uploadFile.click();
    });
}