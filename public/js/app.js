var i = 0;
$(document).ready(function () {
  $(".num-order").change(function(){
   var id = $(this).attr('data-id');
   var qty = $(this).val();
   var data = {
       id: id,
       qty: qty,
   };
   $.ajax({
       url: '?mod=products&controller=cart&action=update',
       method: 'POST',
       data: data,
       dataType: 'json', 
       success: function (data) {
           $("#sub-total-"+id).text(data.sub_total);
           $("#total-price span").text(data.total);
           console.log(data);
       },
       error: function (xhr, ajaxOptions, throwError) {
          alert(xhr.status);
          alert(throwError);
       },
   });
  });
});

var imgArr = new Array();

for (let j = 0; j < 7; j++) {
  imgArr[j] = "public/img/slideShow/00" + j + ".jpeg";
}

var changeImg = () => {
  document.getElementById("slide-show-auto__img").src = imgArr[i];
  i < imgArr.length - 1 ? i++ : (i = 0);
};

setInterval("changeImg()", 3000);

