<?php if ($search_done == true) { ?>
    <?php if ($req_posts_results -> rowCount() > 0) { ?>
        <?php while($posts_results = $req_posts_results->fetch()) { ?>
            <div class="card border-0 my-3">
                <div class="card-body">
                    <div class=" d-flex align-items-center row">
                        <div class="col-6">
                            <a class=" text-decoration-none text-secondary" href="comment.php?topic_id=<?php echo $data['topic_id'];?>">
                                <?= $posts_results['post_content'];?>
                            </a>
                        </div>
                        <div class="col-2 text-secondary"></div>
                        <div class="col-2 text-center text-secondary"></div>
                        <div class="col-2">
                            <div class="row ">                       
                                <div class="font-italic pr-1">by</div>
                                <?php $req_user = $db->query("SELECT user_id, user_name FROM users WHERE user_id =" .  $posts_results['post_by']); 
                                while($user = $req_user->fetch()) { ?>
                                <strong class="text-info"> 
                                    <?php
                                        echo $user['user_name'];
                                        }
                                        $req_user->closeCursor();
                                    ?>
                                </strong>                    
                            </div>
                            <div class="row text-secondary">
                                <small>
                                    <?php
                                        $topicDate = new DateTime($posts_results['post_date']);
                                        echo $topicDate->format('D M d, H:i');
                                    ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
        }else{ ?>
            <div class="card border-0 my-3">
                <div class="card-body">
                    <div class="result-card card-body d-flex align-items-center">
                        <p>No results...</p>
                    </div>
                </div>
            </div>
        <?php } ?>
<?php } ?>
