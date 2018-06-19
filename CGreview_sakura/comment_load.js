
//作品表示？
function comment_create(part_date,part_review,student_number,work_id){
    var id = document.getElementById("comment_target");
    var div2 = document.createElement("div");
    var a1 = document.createElement("a");
    var b1 = document.createElement("a");
    var c1 = document.createElement("a");
    var d1 = document.createElement("a");
    var list_date = part_date;
    var list_review = part_review;
    var list_number = student_number;
    var list_work = work_id;
    //文字表示
    a1.innerHTML = list_date;
    b1.innerHTML = list_review;
    c1.innerHTML = list_number;
    d1.href = 'index.php?sample1='+list_work;
    d1.innerHTML = list_work;
    id.appendChild(div2); 
    //コメント表示
    div2.appendChild(a1);
    div2.appendChild(b1); 
    div2.appendChild(c1); 
    div2.appendChild(d1); 

    console.log(div2);
    console.log(a1);
    console.log(c1);
    console.log(b1);
}