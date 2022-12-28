function previewImage(obj,preview_elem){
	var fileReader = new FileReader();
	fileReader.onload = (function() {
		preview_elem.src = fileReader.result;
	});
	fileReader.readAsDataURL(obj.files[0]);
}

function img_input_clone(target){
	if(document.getElementsByClassName("item_img_input").length > 10){
		return false;
	}
	let id = target.getAttribute("id");
	let start = 9;
	let id_num = Number(id.substr(start));
	//対応する要素に画像を挿入
	//previeを追加
	let preview_img = document.createElement("img");
	preview_img.setAttribute("id","item_img_prev_" + id_num);
	let del_btn = document.createElement("div");
	del_btn.setAttribute("id",id_num);
	del_btn.setAttribute("class","del_btn");
	del_btn.innerHTML = "<span class='material-icons-outlined'>clear</span>";
	del_btn.addEventListener("click",(e)=>{
		let id = e.currentTarget.getAttribute("id");
		document.getElementById("item_img_" + id).parentNode.parentNode.remove();
		e.currentTarget.parentNode.remove();
	});
	let preview_div = document.createElement("div");
	preview_div.setAttribute("class","item_img");
	preview_div.appendChild(preview_img);
	preview_div.appendChild(del_btn);
	document.getElementById("preview_box").appendChild(preview_div);
	let prev = document.getElementById("item_img_prev_" + id_num);
	//既存のinputを非表示
	document.getElementById("item_img_" + id_num).parentElement.parentElement.classList.add("invisible");
	//inputを複製
	let copy_input = document.getElementById("item_img_" + id_num).parentNode.parentNode.cloneNode(true);
	id_num ++;
	let offset = 1;
	if(id_num > 10){
		offset = 2;
	}
	let next_id = id.substr(0,id.length - offset) + id_num;
	copy_input.children[0].children[3].id = next_id;
	copy_input.children[0].children[3].name = next_id;
	copy_input.children[0].children[3].value = "";
	document.getElementById("img_input_wrapper").appendChild(copy_input);
	document.getElementById("item_img_" + id_num).parentElement.parentElement.classList.remove("invisible");
	//preview
    previewImage(target,prev);
	document.getElementById("item_img_" + id_num).addEventListener("input",(e)=>{
		img_input_clone(e.target);
	});
}

document.getElementById("item_img_1").addEventListener("input",(e)=>{
	img_input_clone(e.target);
});

//selectbox の色を変更する
let selects = document.querySelectorAll("select");
for(let i = 0; i < selects.length; i ++){
	selects[i].addEventListener("input",(e)=>{
		e.target.classList.add("selected");
	});
}

//文字数カウンタ
function str_counter(target,count){
	count.textContent = target.value.length;
}

document.getElementById("item_name").addEventListener("input",(e)=>{
	str_counter(e.target,item_len);
})
document.getElementById("discription").addEventListener("input",(e)=>{
	str_counter(e.target,desc_len);
})

document.getElementById("price").addEventListener("input",(e)=>{
	let price = e.target.value;
	price = parseInt(price);
	let charge = Math.floor(price * 0.1);
	document.getElementById("charge").textContent = "￥" + charge;
	document.getElementById("profit").textContent = "￥" + (price - charge);
});

$(function(){
  $('#form').validate({
    rules:{
      //name属性
      category_id: {
        required : true
      },
      item_condition_id: {
        required : true
      },
      name: {
        required : true
      },
      who_pays_fee: {
        required : true
      },
      pickup_id: {
        required : true
      },
      inspection_id: {
        required : true
      },
      price: {
        required : true,
		number : true,
		min : 300,
		max : 10000000
      },
    }
    ,
    messages: {
      //name属性
      category_id: {
        required : "必須項目です"
      },
      item_condition_id: {
        required : "必須項目です"
      },
      name: {
        required : "必須項目です"
      },
      who_pays_fee: {
        required : "必須項目です"
      },
      pickup_id: {
        required : "必須項目です"
      },
      inspection_id: {
        required : "必須項目です"
      },
      price: {
        required : "必須項目です",
		number : "半角数字で入力して下さい",
		min : "￥300 ~ ￥10,00,000で入力して下さい",
		max : "￥300 ~ ￥10,00,000で入力して下さい"
      },
    }
    ,
    errorPlacement: function(error, element){
      let parent = element.closest('.input');
      error.appendTo(parent);
    },
    errorElement: "span",
    errorClass  : "is-error",
  });
});