
//作品表示？
function list_create(model,img,name){
    var id1 = document.getElementById("list_target");
    var id2 = document.getElementById("work_name");

    var div1 = document.createElement("div");
    var div2 = document.createElement("div");

    var img1 = document.createElement("img"); 
    var a1 = document.createElement("a");
    var b1 = document.createElement("a");
    var list_model = model;
    var list_user = name;
    id1.appendChild(div1); 
    id2.appendChild(div2); 

    img1.src='./assets/work_files/'+img;
    img1.style.width="300px";
    img1.style.height="200px";
    img1.style.border="medium double black"
    //aタグにリンクを追加
    a1.href = 'index.php?sample1='+list_model;
    //文字表示
    a1.innerHTML = list_model;
    b1.href = 'user_data.php?sample1='+list_user;
    b1.innerHTML = list_user;
    //サムネイル表示
    div1.appendChild(img1); 
    //作品名表示
    div2.appendChild(a1);
    div2.appendChild(b1); 

}
function thumbnail_create(thumbnail){
    console.log(thumbnail);
}