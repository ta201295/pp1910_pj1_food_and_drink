$("div.flash-alert").delay(5000).slideUp();

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').val()
    }
});

$("a.confirm-delete").click(function (e) {
    e.preventDefault();
    href = $(this).attr('href');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            window.location.href = href;
        }
    })
});

$("div.flash-alert").delay(5000).slideUp();

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').val()
    }
});

$("a.confirm-delete").click(function (e) {
    e.preventDefault();
    href = $(this).attr('href');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            window.location.href = href;
        }
    })
});

window.onload = function(){
    //Check File API support
    if(window.File && window.FileList && window.FileReader)
    {
        $('.image_file').on("change", function(event) {
            var files = event.target.files; 
            var output = document.getElementById("result");
            var file = files[0];
            if (file.type.match('image.*')) {
                if (file.size <= 2097152) {
                    $("#label_album_image").text(file.name);
                    $("div.a").remove();
                    var picReader = new FileReader();
                        picReader.addEventListener("load",function(event){
                            var picFile = event.target;
                            var div = document.createElement("div");
                            div.className = "a";
                            div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" + "title='preview image' onclick='openModal(this)'/>";
                            output.insertBefore(div,null);
                        });
                    $('#result').show();
                    picReader.readAsDataURL(file);
                } else {
                    Swal.fire({
                        title: "Kích thước ảnh không hợp lệ!",
                        text:"Kích thước ảnh không thể vượt quá 2MB.",
                        type: "error"
                    });
                }
                console.log(file);
            } else {
                Swal.fire({
                    title: "Ảnh không hợp lệ!",
                    text:"Xin mời chọn file đúng định dạng.",
                    type: "error"
                });
            }
        });
    }
    else
    {
        console.log("Your browser does not support File API");
    }
}