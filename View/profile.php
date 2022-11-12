<?php


    include "Model/database.php";
    include "View/header.php";
    include "View/navbar.php";
  
   // $user = $db->query("SELECT * FROM users WHERE id = $user_id")->fetch_assoc();
  

?>


<div class="container ">
    <div class="text-center justify-content-center" style="background-color:black;width:940px;height:340px;margin-left: 13%;border-radius: 10px;"></div>
        <div>
            <img src="<?php 

                        if($user["image"] != "")
                        {
                            echo $user["image"];
                        }
                        else
                        {
                            if($user["gender"] == F)
                            {
                                echo "Images/users/__woman_person_user-256.webp";
                            }
                            elseif($user["gender"] == M)
                            {
                                echo "Images/users/__man_user_person-256.webp";
                            }
                            else
                            {
                                echo "Images/users/_lgbt_rainbow_emoji_face-512.webp";
                            }

                        }

            ?>" alt="" height="168px" width="168px" style="border-radius:50%;position: absolute;left: 285px;top: 300px;">
        </div>
        <div style="margin-left: 420px;margin-top: 15px;color: white;">
            <h1 style="display: inline-block;"><?php echo $_SESSION["username"];?></h1>
        </div>
        <div class="row justify-content-center " style="margin-top:107px;width:700px;text-align: center;margin-left: 300px;">
            <div class="col-lg-4">
                <h3><?php echo $number_posts_user; ?> posts</h3>
            </div>
            <div class="col-lg-4">
                <h3><?php echo $post["follower"]["count"]; ?></h3>
            </div>
            <div class="col-lg-4 mb-4">
                <h3><?php echo $post["following"]["count"]; ?></h3>
            </div>
            <hr>
        </div>
        <div class="row justify-content-center " style="width:700px;text-align: center;margin-left: 300px;">
            <div class="col-lg-10">
                <div class="row justify-content-center ">
                    <div class="col-lg-4">
                        <h7 class="text-primary">POSTS</h7>
                    </div>
                </div>
            </div>
        </div>
              
        <?php foreach ($posts_array as $post) : ?>
            <?php if($_SESSION["user_id"] == $post["user_id"]):?>
                <div class="row justify-content-center mt-5" style="padding: 0px;">
                    <div class="col-lg-5  shadow-sm col_others_post">
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

                                    ?>" class="mt-1 username_post" alt="" height="40px" width="40px" style="border-radius:50%;" loading="lazy">
                                </div>
                                <div class="col-lg-10 col_username_post">
                                    <p class="text-white p_username">
                                        <?php echo $post["username"];?>
                                    </p>
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
                            <img src="<?php echo $post["media"]; ?>" class="card-img-top"  alt="..." height="500px" width="500px" loading="lazy" >
                        </div>
                        <div>
                            <h6 class="mt-4 text-light">
                                <?php echo $post["caption"]; ?>
                            </h6>
                        </div>
                        <hr>
            
                        <div class="footer text-end mb-3">
                            <div class="row">
                                <!-- Button trigger modal -->
                                    <div class="col-lg-5">
                                        <button type="button" class="btn mb-2 text-light ms-5 me-5"   style="background-color: #008CBA;width: 200px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fas fa-edit text-light"></i>   
                                            <span style="font-weight: 600;">Edit Post</span>
                                        </button >
                                    </div>
                                    <div class="col-lg-5">
                                        <form id="form-post-<?php echo $post["id_post"]; ?>">
                                        <input type="hidden" name="post_id" value="<?php echo $post["id"]; ?>">
                                            <button type="button" class="btn ms-5 me-5" onclick="remove_post(<?php echo $post['id_post']; ?>)" style="color: #fff;background-color: #dc3545;width: 200px;" >
                                                <i class="fas fa-trash"></i>
                                                <span style="font-weight: 600;">Remove Post</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background: #18191A;">
                                        <div class="modal-dialog mt-5" style="background-color: #282828;border-radius:10px;">
                                        <div class="card-header text-light">
                                    <div class="text-light text-center fs-2 fw-semibold mt-2 header__center">
                                        Edit Post 
                                    </div>
                                </div>
                                <div class="card-body text-light ">
                                    <form method="post" action="login_process">
                                        <div class="input-group mt-3">
                                            <label class="form-check-label  mb-3 fs-5" >caption</label>
                                            <input class=" mt-1 text-dark input_caption " name="caption" type="text" placeholder="what's on your mind ?" >
                                        </div>
                                        <div class="col-lg-12 text-start">
                                            <label class="form-check-label mt-4 mb-3 fs-5 text-start" >Photo / Video / Music</label>
                                            <input type="file" class="form-control input_file_add_post" name="media"  aria-label="Username" aria-describedby="basic-addon1" >
                                        </div>
                                        </div>
                                        <div class="justify-content-center text-center">
                                            <button type="submit" class="btn btn-dark btn-login mt-3 button_login mb-3">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;?>
        <?php endforeach; ?>
    </div>
</div>


<?php include "View/footer.php"; ?>
