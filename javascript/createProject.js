function addSmallTask(){
    const task = document.getElementById("smallTask");
    const taskText = task.value;
    if(taskText === ""){
        return;
    }

    const smallTaskUl = document.getElementById("listOfTasks")

    const smallTaskEl = document.createElement('li');
    const taskCheckBox = document.createElement('input')
    const textNode = document.createTextNode(taskText);

    taskCheckBox.setAttribute('type','checkbox');

    smallTaskEl.appendChild(taskCheckBox);
    smallTaskEl.appendChild(textNode);

    smallTaskUl.appendChild(smallTaskEl);

    task.value = "";

  taskCheckBox.addEventListener('change', ()=>{
      smallTaskEl.classList.toggle('completed')
      progressBarCalculate();
  })

  progressBarCalculate();

}

function progressBarCalculate(){
  const taskUl = document.getElementById("listOfTasks");
  const nbLi = taskUl.getElementsByTagName('li').length;
  const nbcomplited = taskUl.getElementsByClassName('completed').length;

  if(nbLi === 0){
    return;
  }

  const progress = (nbcomplited/nbLi)*100;

  const progressBar = document.getElementById('progressBar');

  progressBar.setAttribute('style', `width:${progress}%`);

}

function changeDescription(){
    const descButton = document.getElementById("descButton");
    const description = document.getElementById("descriptionBox")

    if(descButton.textContent === "Change description"){

        description.removeAttribute('readonly');

        descButton.textContent = "save";
    }
    else if(descButton.textContent === "save"){

        description.setAttribute('readonly', 'readonly');

        descButton.textContent = "Change description";
    }
}

function addComment(){
  const comText = document.getElementById("commentMessage");

  if(comText.value === ""){
    return
  }
  else{
    addUserComment("text", comText.value);
    comText.value = "";
  }

}

function addUserComment(v, content){

  const commentDiv = document.createElement('div');
  const commentContentDiv = document.createElement('div');

  const comments = document.getElementById("comments-container");

  commentDiv.setAttribute('class', 'comment');
  commentContentDiv.setAttribute('class', 'comment-content');

  const userProfileEl = document.createElement('img');
  const userName = "said";
  const userNameEl = document.createElement('h5');

  let commentEl;

  if(v === "text"){
    commentEl = document.createElement('p');
    commentEl.textContent = content;
  }
  else{
    commentEl = document.createElement('a');
    commentEl.textContent = content.name;
    commentEl.setAttribute('href', URL.createObjectURL(content));
    commentEl.setAttribute('target', '_blank')
  }

  userProfileEl.setAttribute('src', 'profile.jpg');
  userProfileEl.setAttribute('class', 'profile-pic');
  userNameEl.textContent = userName;

  commentContentDiv.appendChild(userNameEl);
  commentContentDiv.appendChild(commentEl);
  commentDiv.appendChild(userProfileEl);
  commentDiv.appendChild(commentContentDiv);

  comments.appendChild(commentDiv);

}

function sendFile(){
  const fileInput = document.getElementById("fileinput")
  const file = fileInput.files[0];
  if(file){
    addUserComment("link", file);
  };
  return;
}

function addMember(){




}

