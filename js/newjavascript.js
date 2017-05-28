if (document.querySelector('.add_course_button')) {
    document.querySelector('.add_course_button').addEventListener("click", function(){
        window.location='http://localhost/theschool/main/index.php?subject=school&add=course';
    });
}

if (document.querySelector('.add_student_button')) {
    document.querySelector('.add_student_button').addEventListener("click", function(){
        window.location='http://localhost/theschool/main/index.php?subject=school&add=student';
    });
}

if (document.querySelector('.new_admins_button')) {
    document.querySelector('.new_admins_button').addEventListener("click", function(){
        window.location='http://localhost/theschool/main/index.php?subject=admin&add=admin';
    });
}

if (document.querySelector('.course_edit_button')) {
    document.querySelector('.course_edit_button').addEventListener("click", function(){
        window.location='http://localhost/theschool/main/index.php?subject=school&add=edit_course';
    });
}

if (document.querySelector('.student_edit_button')) {
    document.querySelector('.student_edit_button').addEventListener("click", function(){
        window.location='http://localhost/theschool/main/index.php?subject=school&add=edit_student';
    });
}

if (document.querySelector('.admin_edit_button')) {
    document.querySelector('.admin_edit_button').addEventListener("click", function(){
        window.location='http://localhost/theschool/main/index.php?subject=admin&add=edit_admin';
    });
}

if (document.querySelector('.delete_course')) {
    document.querySelector('.delete_course').addEventListener("submit", function(event){
        var result = confirm("Want to delete this course?");
        if (!result) {
            event.preventDefault();
            return false;
        }
    });
}

if (document.querySelector('.delete_student')) {
    document.querySelector('.delete_student').addEventListener("submit", function(event){
        var result = confirm("Want to delete this student?");
        if (!result) {
            event.preventDefault();
            return false;
        }
    });
}

if (document.querySelector('.delete_admin')) {
    document.querySelector('.delete_admin').addEventListener("submit", function(event){
        var result = confirm("Want to delete this admin?");
        if (!result) {
            event.preventDefault();
            return false;
        }
    });
}

if (document.querySelector('.pic')){
    document.querySelector('.pic').addEventListener('change', function(event){
    var reader = new FileReader();
    reader.addEventListener('load', function(e){
        document.getElementById("output").src = e.target.result;
        document.getElementById("output").style.display = "block";
        document.getElementById("output").style.width = "90px";
        document.getElementById("output").style.marginLeft = "5rem";
    });
    reader.readAsDataURL(this.files[0]); 
 });
 }



