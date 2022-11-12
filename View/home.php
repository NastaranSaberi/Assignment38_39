<?php


    include "Model/database.php";
    include "View/header.php";
    include "View/navbar.php";
    
 

$user = $db->query("SELECT * FROM users WHERE id = $user_id")->fetch_assoc();

?>


<?php if(isset($_SESSION["message"])): ?>
            <div class="row justify-content-center mt-3">
                <div class="col-lg-8">
                        <div class="alert alert-warning " role="alert">
                            <?php echo $_SESSION["message"]; ?>
                        </div>
                </div>
            </div>
     <?php unset($_SESSION["message"]); ?>
<?php endif; ?>


<div class="container-fluid mt-3">
    <div class="row row_home justify-content-center">
        

        <!-- Add post -->
        <div class="col-lg-5 shadow-sm col_add_post ">
            <form method="post" action="post_process" id="form_new_post" enctype="multipart/form-data">
                <div class="row row_add_post"   >
                    <div class="text-light text-center fs-2 fw-semibold mt-2 header__center">
                        Create post 
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-lg-12">
                        <div class="input-group mt-3">
                            <label class="form-check-label mt-3 mb-3 fs-5" >caption</label>
                                <input class=" mt-1 text-dark input_caption " name="caption" type="text" placeholder="what's on your mind ?" >
                            </div>
                        </div>
                    
                        <p>
                            <label class="form-check-label mt-4 mb-3 fs-5" >Media</label>
                            <div style=" margin-top: -22px;">
                                <a class="btn btn-light  m-1" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <i class='fa fa-image' style="color:#45BD62;"></i>
                                    Image
                                </a>
                                <a class="btn btn-light  m-1" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <i class='fas fa-video' style="color:#FA383E;"></i>
                                    Video
                                </a>
                                <a class="btn btn-light m-1" data-bs-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <i class='fa fa-music' style="color:#F7B928;" ></i>
                                    Audio
                                </a>
                            </div>
                           
                        </p>


                        <div class="collapse" id="collapseExample1">
                            <input type="file" name="image" class="form-control input_file_add_post" name="media"  aria-label="Username" aria-describedby="basic-addon1" >
                        </div>
                        <div class="collapse" id="collapseExample2">
                            <input type="file" name="video" class="form-control input_file_add_post" name="media"  aria-label="Username" aria-describedby="basic-addon1" >
                        </div>
                        <div class="collapse" id="collapseExample3">
                            <input type="file" name="audio" class="form-control input_file_add_post" name="media"  aria-label="Username" aria-describedby="basic-addon1" >
                        </div> 

                        <div class="btn_center text-center">
                            <button form="form_new_post" class="mt-4 mb-3 btn_submit_add_post text-light" type="submit" class="btn btn-primary" >submit</button>
                        </div>
                </div>
            </form>
         
        </div>
      
        
        <!-- Post others -->
        <?php foreach ($posts_array as $post) : ?>
        <div class="row justify-content-center mt-5" style="padding: 0px;">
        
            <div class="col-lg-5 col-sm-12  shadow-sm col_others_post">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-2">
                            <img src="<?php 

                                if($post["image"] != "")
                                {
                                    echo $post["image"];
                                }
                                else
                                {
                                    if($post["gender"] == F)
                                    {
                                        echo "Images/users/__woman_person_user-256.webp";
                                    }
                                    elseif($post["gender"] == M)
                                    {
                                        echo "Images/users/__man_user_person-256.webp";
                                    }
                                    else
                                    {
                                        echo "Images/users/_lgbt_rainbow_emoji_face-512.webp";
                                    }

                                }

                            ?>" class=" username_post" alt="" height="40px" width="40px" style="border-radius:50%;" loading="lazy">
                        </div>
                        <div class="col-lg-10 col_username_post">
                            
                                <p class="text-white p_username">
                                        <?php echo $post["username"];?>
                                </p>
                                  
                                
                                <form id="form-follow-<?php echo $user_id_follow; ?>">
                                <button class="btn" type="button" style="margin-left:75px;border-radius: 15px;width:88px;height:31px;border: none; background-color:#2374E1;color:white;font-weight:500;padding: 1px;margin-top: -3pc;" onclick= 'follow_unfollow(<?php echo $user_id_follow; ?>)' id="follow-<?php echo $user_follow; ?>" >
                                follow
                                   
                                </button>
                                
                                <input type="hidden" name="followers_id" value="<?php echo $user_id_follow; ?>">
                             
                                </form>

                            
                           
                            <p>
                            <?php echo time2str($post["time"]); ?>
                                <svg fill="currentColor" viewBox="0 0 16 16" width="1em" height="1em" class="a8c37x1j ms05siws l3qrxjdp b7h9ocf4 py1f6qlh cyypbtt7 fwizqjfa" title="Shared with Public">
                                    <title>Shared with Public</title>
                                    <g fill-rule="evenodd" transform="translate(-448 -544)"><g>
                                        <path d="M109.5 408.5c0 3.23-2.04 5.983-4.903 7.036l.07-.036c1.167-1 1.814-2.967 2-3.834.214-1 .303-1.3-.5-1.96-.31-.253-.677-.196-1.04-.476-.246-.19-.356-.59-.606-.73-.594-.337-1.107.11-1.954.223a2.666 2.666 0 0 1-1.15-.123c-.007 0-.007 0-.013-.004l-.083-.03c-.164-.082-.077-.206.006-.36h-.006c.086-.17.086-.376-.05-.529-.19-.214-.54-.214-.804-.224-.106-.003-.21 0-.313.004l-.003-.004c-.04 0-.084.004-.124.004h-.037c-.323.007-.666-.034-.893-.314-.263-.353-.29-.733.097-1.09.28-.26.863-.8 1.807-.22.603.37 1.166.667 1.666.5.33-.11.48-.303.094-.87a1.128 1.128 0 0 1-.214-.73c.067-.776.687-.84 1.164-1.2.466-.356.68-.943.546-1.457-.106-.413-.51-.873-1.28-1.01a7.49 7.49 0 0 1 6.524 7.434" transform="translate(354 143.5)"></path>
                                        <path d="M104.107 415.696A7.498 7.498 0 0 1 94.5 408.5a7.48 7.48 0 0 1 3.407-6.283 5.474 5.474 0 0 0-1.653 2.334c-.753 2.217-.217 4.075 2.29 4.075.833 0 1.4.561 1.333 2.375-.013.403.52 1.78 2.45 1.89.7.04 1.184 1.053 1.33 1.74.06.29.127.65.257.97a.174.174 0 0 0 .193.096" transform="translate(354 143.5)"></path><path fill-rule="nonzero" d="M110 408.5a8 8 0 1 1-16 0 8 8 0 0 1 16 0zm-1 0a7 7 0 1 0-14 0 7 7 0 0 0 14 0z" transform="translate(354 143.5)"></path>
                                    </g>
                                </svg>
                            </p>

                        </div>
                        
                    </div>  
                </div>
                

                <div>
                    <img src="<?php echo $post["media"]; ?>" class="card-img-top "  alt="..."  loading="lazy" style="height: 431px;">
                </div>


                <div>
                    <h6 class="mt-4 text-light">
                        <?php echo $post["caption"]; ?>
                    </h6>
                </div>
                <hr>
                <div class="footer">
                    <div class="row mt-3 mb-3" style="text-center">
                        <div class="col text-center ">
                        <form  id="form-like-<?php echo $post["id_post"]; ?>" >
                            <input type="hidden" name="post_id" value="<?php echo $post["id_post"]; ?>">
                            <button class="like" style="border: none;background-color: #282828;color: white;" type="button" onclick='send_like(<?php echo $post["id_post"]; ?>)'  >
                                <span id="count-like-<?php echo $post["id_post"]; ?>">
                                    <?php echo $post["likes"]["count"]; ?>
                                </span>
                                <i id="btn-likes-<?php echo $post["id_post"]; ?>" class="<?php echo $post["like"] == 1 ? "fas" : "far"; ?> fa-heart fa-lg" style="color: <?php echo $post["like"]==1 ? "#DC143C;" :  "white;"; ?>"></i>
                                <span style="font-weight: 700;">Like</span>   
                            </button>
                        </form>
                            
                        </div>
                        <div class="col text-center">
                            <p>
                                <a class="btn text-light" data-bs-toggle="collapse" href="#collapseExample<?php echo $post["id_post"];?>" role="button" aria-expanded="false" aria-controls="collapseExample" style="margin-top: -7px;">
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                    <span style="font-weight: 700;">Cm</span>
                                </a>
                            </p>
                           
                          
                        </div>
                        <div class="col text-center text-light">
                            <i class="fa fa-share-alt" aria-hidden="true"></i>
                            <span style="font-weight: 700;">Share</span>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="collapse" id="collapseExample<?php echo $post["id_post"];?>">
                                <div class="card card-body mb-3" style="background-color: #3A3B3C;">
                                    
                                    <?php foreach ($post["comments"] as $comment) : ?>
                                        <?php if($comment["post_id"] == $post["id"]):?>
                                            <ul class="list-group mt-1" id="list_comments_<?php echo $post["id_post"];?>" >
                                                <li class="list-group-item list-group-item-action lisss" aria-current="true" style="background:#212529;border: none;border-radius: 10px;">
                                                    <img src="<?php 

                                                        if($comment["image"] != "")
                                                        {
                                                            echo $comment["image"];
                                                        }
                                                        else
                                                        {
                                                            if($comment["gender"] == F)
                                                            {
                                                                echo "Images/users/__woman_person_user-256.webp";
                                                            }
                                                            elseif($comment["gender"] == M)
                                                            {
                                                                echo "Images/users/__man_user_person-256.webp";
                                                            }
                                                            else
                                                            {
                                                                echo "Images/users/_lgbt_rainbow_emoji_face-512.webp";
                                                            }

                                                        }

                                                        ?>" class="mt-1 " alt="" height="40px" width="40px" style="border-radius:50%;" loading="lazy">
                                                        <h5 class="mb-1 h5-cm" style="margin-top: -34px;margin-left: 59px;">
                                                            <?php echo $comment["username"]; ?>
                                                        </h5>
                                                        <a href="user_page?user-id=<?php echo $comment["user_id"]; ?>" class="text-decoration-none">
                                                            <b class="text-dark">:<?php echo $post["username"]; ?></b>
                                                        </a>
                                                        <!-- <div class="text-end " > -->
                                                        <small class="text-end small_lis" style="float: right;margin-top: -27px;"><?php echo time2str($comment["time"]); ?></small>
                                                        <!-- </div> -->
                                                       
                                                   
                                                    <p class="mb-1" style="margin-left: 58px;margin-top: -10px;">
                                                        <?php echo $comment["text"]; ?>
                                                    </p>
                                                </li>
                                            </ul>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                
                                    <form class="row g-3 mt-3" id="form-comment-<?php echo $post["id_post"]; ?>" >
                                        <div class="col-auto">
                                            <input type="text" name="text" class="form-control comment_input" id="inputPassword2" placeholder="Add a comments ..." >
                                            <input type="hidden" name="post_id" value="<?php echo $post["id_post"]; ?>">
                                        </div>
                                        <div class="col-auto">
                                            <button class="btn btn-dark mb-3 btn_comment" type="button" onclick='send_comment(<?php echo $post["id_post"]; ?>)' >submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>



<?php include "View/footer.php"; ?>
