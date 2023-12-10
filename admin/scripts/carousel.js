
let carousel_s_form = document.getElementById('carousel_s_form');
let carousel_picture_inp = document.getElementById('carousel_picture_inp');


carousel_s_form.addEventListener('submit',function(e)
{
    e.preventDefault();
    add_image();
});

function add_image()
{
    let data = new FormData();
    data.append('picture',carousel_picture_inp.files[0]);
    data.append('add_image','');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/carousel_crud.php", true);

    xhr.onload = function()
    { 
        var myModal = document.getElementById('carousel-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if(this.responseText == 'inv_img')
        {
            alert('error','Chỉ cho phép JPG và PNG!');
        }
        else if(this.responseText == 'inv_size')
        {
            alert('error','Hình ảnh cần có kích thước nhỏ hơn 2MB!');
        }
        else if(this.responseText == 'upd_failed')
        {
            alert('error','Hình ảnh tải lên thất bại. Máy chủ đang gặp sự cố hoặc không hoạt động!');
        }
        else
        {
            alert('success','Hình ảnh mới đã được thêm!');
            carousel_picture_inp.value='';
            get_carousel();
        }
    }
    
    xhr.send(data);
}

function get_carousel()
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/carousel_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function()
    { 
        document.getElementById('carousel-data').innerHTML = this.responseText;
    }
    
    xhr.send('get_carousel')
}

function rem_image(val)
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/carousel_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function()
    { 
       if(this.responseText==1)
       {
        alert('success','Hình ảnh đã được xóa!');
        get_carousel();
       }
       else
       {
        alert('error','Máy chủ đang gặp sự cố hoặc không hoạt động!')
       }
    }
    
    xhr.send('rem_image='+val);
}

window.onload = function()
{
    get_carousel();
}
