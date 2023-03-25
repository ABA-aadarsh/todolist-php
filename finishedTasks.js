const checkBox=[...document.querySelectorAll(".checkbox")]
const modalContainer=document.querySelector(".modalContainer")
const exitModal=document.querySelector(".exitModal")
const toggleDescriptions=[...document.querySelectorAll(".toggleDescription")]
const toggleButtons=[...document.querySelectorAll(".toggleDetail")]
const taskRecord=[...document.querySelectorAll(".taskRecord")]
const actions=[...document.querySelectorAll(".actions")]
const editBtn=[...document.querySelectorAll(".edit")]
checkBox.forEach(btn=>{
    btn.addEventListener("click",()=>{
        const id=parseInt(btn.id.slice(8))
        window.location=`./uncheck.php?id=${id}`
    })
})
exitModal.addEventListener("click",()=>{
    modalContainer.classList.add("hidden")
})
toggleButtons.forEach((btn)=>{
    btn.addEventListener("click",()=>{
        const id=parseInt(btn.id.slice(3))
        const tgdesc=document.querySelector(`#desc${id}`)
        if(tgdesc.classList.contains("hidden")){
            toggleDescriptions.forEach((e)=>{
                e.classList.add("hidden")
            })
            tgdesc.classList.remove("hidden")
        }else{
            tgdesc.classList.add("hidden")
        }
    })
})
taskRecord.forEach((div,i)=>{
    div.addEventListener("mouseover",()=>{
        actions[i].classList.remove("hide")
        actions[i].classList.add("show")
    })
    div.addEventListener("mouseout",()=>{
        actions[i].classList.remove("show")
        actions[i].classList.add("hide")
    })
})

editBtn.forEach((btn,i)=>{
btn.addEventListener("click",()=>{
modalContainer.querySelector(".center form").action=`edit.php?id=${parseInt(btn.id.slice(4))}&pl=0`
modalContainer.querySelector(".titlePart h2").innerHTML="Edit Task"
modalContainer.querySelector("#taskTitle").value=taskRecord[i].querySelector(".taskRecordEntryDetail .taskTitle").innerHTML
modalContainer.querySelector("#textArea").value=taskRecord[i].querySelector(".toggleDescription p").innerHTML
modalContainer.querySelector("#importance").value=taskRecord[i].querySelector(".taskRecordEntryDetail .imp").classList[1]
modalContainer.querySelector("#urgency").value=taskRecord[i].querySelector(".taskRecordEntryDetail .urg").classList[1]
modalContainer.classList.remove("hidden")
})
})