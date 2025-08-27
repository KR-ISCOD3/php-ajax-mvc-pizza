$(document).ready(function () {
    $('#image').on('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                $('#previewimage').html(`
                    <img src="${e.target.result}" 
                    style="height: 100%; width: auto;" 
                    class="w-100 h-100 object-fit-cover">`
                );
            };

            reader.readAsDataURL(file);
        } else {
            $('#previewimage').empty(); // Clear if no file selected
        }
    });

});