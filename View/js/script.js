
    function follow_unfollow(user_id_follow){

      let follow = document.getElementById("follow");

      let form = document.getElementById("form-follow-" + user_id_follow);
      let form_data = new FormData(form);

      fetch("follow-unfollow-user", {
      method: "post",
      body: form_data

  }).then(
      result => result.text()
  ).then(result => {
      console.log(result);
      if (result == 1) {
          
          follow.style.background = "white";
          follow.style.color = "black";
          follow.innerHTML = "Unfollow";

      } else if (result == 0) {
         

          follow.style.background = "#2374E1";
          follow.style.color = "white";
          follow.innerHTML = "Follow";
      }
  }).catch(error => {
      console.log(error)
  });
} 
  


 function send_like(post_id) {

  let form = document.getElementById("form-like-" + post_id);
  let form_data = new FormData(form);

  let btn = document.getElementById("btn-likes-" + post_id);
  let count_number_tag = document.getElementById("count-like-" + post_id);

  fetch("send_like",{
      method:"post",
      body:form_data
  }).then(
      result => result.text()
  ).then(result => {
      if (result == 1) {
          // color
          btn.style.color = "#DC143C";
          btn.classList.remove("far");
          btn.classList.add("fas");

          // number likes
          let number = count_number_tag.innerHTML;
          number++;
          count_number_tag.innerHTML = number;
      } else if (result == 0) {
          // color
          btn.style.color = "white";
          btn.classList.remove("fas");
          btn.classList.add("far");

          // number of likes
          let number = count_number_tag.innerHTML;
          number--;
          count_number_tag.innerHTML = number;
      }
  }).catch(error => {
      console.log(error)
  });

}






  //Fetch API instead of XMLHttpRequest for AJAX
  function send_comment(post_id , username) {
      
      let form = document.getElementById("form-comment-" + post_id);
      let form_data = new FormData(form);


  fetch("send_comment",{
      method:"post",
      body:form_data
  }).then(result => {
  

 
      let list_comments = document.getElementById("list_comments_"+post_id);

      let li = document.createElement("LI");
      li.classList.add("list-group-item");
      li.classList.add("list-group-item-action");
      li.classList.add("mt-1");
      li.classList.add("lisss");

      // let img = document.createElement("IMG");
      // img.classList.add("mt-1");
      // img.innerHTML = img;

      let p = document.createElement("P");
      p.classList.add("mb-1");
      p.classList.add("p_li");
      p.innerHTML = form_data.get("text");

      let h5 = document.createElement("H5");
      h5.classList.add("mb-1");
      h5.classList.add("h5-cm");
      h5.innerHTML = username;
 
      let small = document.createElement("SMALL");
      small.classList.add("text-end");
      small.classList.add("small_lis");
      small.innerHTML = "just now".fontsize(2);


      // let small = document.createElementById("SMALL");
      // small.classList.add("text-end");
      // small.innerHTML = form_data.get("time");


      // let div = document.createElementById("DIV");
      // div.classList.add(" d-flex w-100 ");

      // let img = document.createElementById("IMG");
      // img.classList.add("mt-1");

      // let h5 = document.createElementById("H5");
      // h5.classList.add("mb-1");
      // h5.innerHTML = form_data.get("username");

      // h5.appendChild(div); 
      // img.appendChild(div);  
      // div.appendChild(li);  
      // li.appendChild(small);
      // li.appendChild(img);  
      li.appendChild(h5); 
      li.appendChild(small); 
      li.appendChild(p);   
      list_comments.appendChild(li);
 
  }).catch(error => {
      alert(error);
  })
}

 

async function remove_post(post_id){

  let form = document.getElementById("form-post-" + post_id);
  let form_data = new FormData(form);

  let x = await fetch("remove_post",{
      method:"post",
      body:form_data
  });
  let y = await x.text();

  }   
