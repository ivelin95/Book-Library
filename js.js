//selector
const addBtn=document.querySelector(".addNewBook")
const form=document.querySelector(".form")
const saveBtn=document.querySelector('#right-btn')
const editBtn=document.querySelector('.edit')
const bookList=document.querySelector(".book-list")
const editList=document.querySelector(".list-edit")
//markup
const markup=`
<div class="list">
    
<br>
<input type="text" readonly placeholder="id" name="id" class="rows"> 
<input type="text" placeholder="Title" name="title" class="rows">  
<input type="text" placeholder="Author" name="author" class="rows" >
<input type="number" placeholder="Pages" name="pages" class="rows"> 

</div>   
 <br>  
    

`



    
saveBtn.disabled=true

function generateTbl(){
   form.insertAdjacentHTML("afterbegin" , markup);
   addBtn.disabled=true
   saveBtn.disabled=false
}
function enableBtn(){
    addBtn.disabled=false
}
function display(e){
    editList.style.display="block"
    
}
//event listener

saveBtn.addEventListener("click" , enableBtn)
addBtn.addEventListener('click' , generateTbl)
 //bookList.addEventListener('click' , display)