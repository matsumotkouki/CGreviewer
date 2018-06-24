
//作品表示？
function comment_create2(part_date,part_review,contributor,work_name,student_number){
    var id = document.getElementById("cache_comment");
    var div2 = document.createElement("div");
    var a1 = document.createElement("a");
    var b1 = document.createElement("a");
    var c1 = document.createElement("a");
    var d1 = document.createElement("a");
    var e1 = document.createElement("a");

    var list_date = part_date;
    var list_review = part_review;
    var list_number = contributor;
    var list_work = work_name;
    var list_stu = student_number;


    //文字表示
    a1.innerHTML = list_date;
    b1.innerHTML = list_review;
    c1.innerHTML = list_number;
    d1.href = 'index.php?sample1='+list_work;
    d1.innerHTML = list_work;
    e1.innerHTML = list_stu;
    id.appendChild(div2); 
    //コメント表示
    div2.appendChild(a1);
    div2.appendChild(b1); 
    div2.appendChild(c1); 
    div2.appendChild(d1); 
    div2.appendChild(e1); 

}